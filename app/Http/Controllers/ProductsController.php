<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductQuantityRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Products;
use App\Models\Units;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        Products::create([
            'name' => $request->name,
        ]);
        return redirect()->route('products.index')
            ->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Products $product)
    {
        $product->update([
            'name' => $request->name,
        ]);
        return redirect()->route('products.index')
            ->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product Deleted Successfully');
    }


    public function addQuantity(Products $product)
    {
        $units = Units::units()->with('subUnits')->get();

        return view('products.addQuantity', compact('product','units'));


    }

    public function addQuantityStore(AddProductQuantityRequest $request,Products $product)
    {

        $unit = Units::where('id',$request->get('unit_id'))->first();
        $product->quantities()->attach($unit, ['quantity' => $request->get('quantity')]);

        return redirect()->route('products.index')
            ->with('success', 'Product Quantity Added Successfully');


    }
}
