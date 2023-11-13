<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class rolController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
     {
         $this->middleware('auth');
     }

     
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registrerRol = User::find($id);
        $registrerRol-> name =$request->name;
        $registrerRol-> email =$request->email;
        $registrerRol-> role =$request->role;
       

        $registrerRol->save();
        return redirect('panel');
    }

    
    public function destroy(string $id)
    {
       
    }
}

