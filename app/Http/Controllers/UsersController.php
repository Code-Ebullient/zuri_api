<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required',
        ]);
    
        return User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'password2' => request('password'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     */
    

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required',
        ]);
    
        $success = $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'password2' => request('password2')
        ]);
    
        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $success = $user->delete();
        
        return [
            'success' => $success
        ];
    }
}
