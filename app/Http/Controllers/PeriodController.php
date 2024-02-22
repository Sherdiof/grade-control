<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::all();

        return view('periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:50'],
            'year' => ['required', 'min:4', 'max:50'],
        ]);

        Period::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        return redirect()->route('periods.index')->with('status', 'Se ha creado el registro correctamente!');
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
    public function edit(Period $period)
    {
        return view('periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Period $period)
    {
        $this->validate($request, [
            'name' => ['min:2', 'max:50'],
            'year' => ['min:4', 'max:50'],
        ]);
        $period->name = $request->name;
        $period->year = $request->year;

        $period->update();
        return redirect()->route('periods.index')->with('status', 'Se ha actualizado el registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return back()->with('eliminar', 'ok');
    }
}
