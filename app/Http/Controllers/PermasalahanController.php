<?php

namespace App\Http\Controllers;

use App\Models\permasalahan;
use Illuminate\Http\Request;

class PermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sign.login');
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
    public function show(permasalahan $permasalahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permasalahan $permasalahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permasalahan $permasalahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permasalahan $permasalahan)
    {
        //
    }
}
