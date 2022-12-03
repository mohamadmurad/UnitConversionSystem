<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\units;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Units::units()->paginate();

        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRequest $request)
    {
        $unit = Units::create([
            'name' => $request->get('name'),
        ]);
        return redirect()->route('subunits.index', $unit)
            ->with('success', 'Unit Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\units $units
     * @return \Illuminate\Http\Response
     */
    public function show(units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\units $units
     * @return \Illuminate\Http\Response
     */
    public function edit(units $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\units $units
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitRequest $request, units $unit)
    {

        $unit->update([
            'name' => $request->get('name'),
        ]);
        return redirect()->route('units.index', $unit)
            ->with('success', 'Unit Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\units $units
     * @return \Illuminate\Http\Response
     */
    public function destroy(units $unit)
    {
        $unit->delete();
        return redirect()->route('units.index')
            ->with('success', 'Unit Deleted Successfully');
    }

    public function convert()
    {
        return view('convert.index');
    }
}
