<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isAdmin){
            $orders = Order::paginate(10);
        }
        else{
            $orders = Order::where('user_id',$user->id)->paginate(10);
        }
        $totalRevenue = Order::sum('total');
        
        //rendelések napokra csoportositva
        $dailyOrders = Order::select(DB::raw('DATE(created_at) as order_date'), DB::raw('count(*) as total_orders'))
        ->groupBy('order_date')
        ->get();

        // Összes rendelés szám
        $totalOrders = $dailyOrders->sum('total_orders');

        // Napok számának meghatározása
        $totalDays = $dailyOrders->count();

        // Átlagos rendelés szám
        $averageOrders = $totalDays > 0 ? $totalOrders / $totalDays : 0;


        $orders->load('user');
        return view('Orders.index',['orders'=>$orders,'totalRevenue'=>$totalRevenue,'avgOrders'=>$averageOrders,'user'=>$user]);
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
            'status'=>'required|string',
            'user_id'=>'required'
        ]);
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
