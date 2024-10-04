<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = User::query();
        $filter=$request->input('filter');

        $query =match($filter){
            'has_2_FA'=>$query->has2FA(),
            'is_Admin'=>$query->isAdmin(),
            default => $query->latest()
        };

        $users=$query->paginate(10);
        $currentDate = Carbon::now()->toDateString();
        $newUsers = User::whereDate('created_at', $currentDate)->count();

      

        return view('users.index',['users'=>$users,'date'=>$newUsers,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $userOrders = $user->orders;
        return view('Users.edit',['user'=>$user,'orders'=>$userOrders]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'=>'string',
            // 'email'=>'email',

        ]);
        try{
            $user->update($validatedData);
            return redirect()->back()->with('success', 'Felhasználó sikeresen frissítve!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Hiba történt a felhasználó frissítése során: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       try{
            $user->delete();
            return redirect()->back()->with('success', 'Felhasználó sikeresen törölve!');
        }
       catch(\Exception $e){
            return redirect()->back()->with('error', 'Hiba történt a felhasználó törlése során: ' . $e->getMessage());
        }
    }
}
