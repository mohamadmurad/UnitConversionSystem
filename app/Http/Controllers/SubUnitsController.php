<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubUnitRequest;
use App\Http\Requests\UpdateSubUnitRequest;
use App\Models\Units;
use Illuminate\Http\Request;

class SubUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Units $unit)
    {
        $unit->load('subUnits');


        return view('subUnits.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Units $unit)
    {
        return view('subUnits.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubUnitRequest $request, Units $unit)
    {
        $unit->subUnits()->create([
            'name' => $request->get('name'),
            'value' => $request->get('value'),
        ]);
        return redirect()->route('subunits.index', $unit)
            ->with('success', 'SubUnit Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show( Units $unit,Units $subunit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Units $unit ,Units $subunit)
    {
        return view('subUnits.edit', compact('unit','subunit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubUnitRequest $request,  Units $unit,Units $subunit)
    {
        $subunit->update([
            'name' => $request->get('name'),
            'value' => $request->get('value'),
        ]);
        return redirect()->route('subunits.index', $unit)
            ->with('success', 'Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Units $unit,Units $subunit)
    {

        $subunit->delete();
        return redirect()->route('subunits.index', $unit)
            ->with('success', 'SubUnit Deleted Successfully');
    }
}
