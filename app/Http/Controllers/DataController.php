<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Data::all();
        return view('dashboard.data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'address' => 'required',
        ]);

        $data = Data::create($validatedData);
        return redirect()->route('dashboard.data.index')->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Data::findOrFail($id);
        return view('dashboard.data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Data::findOrFail($id);
        return view('dashboard.data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'address' => 'required',
        ]);
        $data->update($validatedData);
        return redirect()->route('dashboard.data.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        $data->delete();
        return redirect()->route('dashboard.data.index')->with('success', 'Data deleted successfully');
    }
}
