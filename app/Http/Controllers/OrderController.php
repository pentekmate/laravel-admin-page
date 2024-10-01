<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return view('Orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product'=>'required|string',
            'quantity'=>'required|integer',
            'total'=>'required|integer',
            'status'=>'required|string'
        ]);

        $validatedData['user_id']=1;
        try{
            Order::create($validatedData);
            return redirect()->back()->with('success', 'Rendelés sikeresen létrehozva!');
          }
          catch(\Exception $e){
            return redirect()->back()->with('error', 'Hiba történt a rendelés létrehozása során: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order = $order->load('user');
        return view('Orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'product'=>'string',
            // 'quantity'=>'integer',
            // 'created_at'=>'date',
            // 'status'=>'string'
        ]);

      try{
        $order->update($validatedData);
        return redirect()->back()->with('success', 'Rendelés sikeresen frissítve!');
      }
      catch(\Exception $e){
        return redirect()->back()->with('error', 'Hiba történt a rendelés frissítése során: ' . $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try{
            $order->delete();
            return redirect()->back()->with('success', 'Rendelés sikeresen törölve!');
        }
       catch(\Exception $e){
            return redirect()->back()->with('error', 'Hiba történt a rendelés törlése során: ' . $e->getMessage());
        }
    }
}
