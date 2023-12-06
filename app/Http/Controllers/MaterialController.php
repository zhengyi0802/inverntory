<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Vendor;
use App\Models\ProductModel;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::where('status', true)->OrderBy('model_id')->get();

        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = ProductModel::where('status', true)->get();

        return view('materials.create')
               ->with(compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $creator = auth()->user();
        $data['created_by'] = $creator->id;
        $model = ProductModel::find($data['model_id']);
        $data['supplier_id'] = $model->vendor_id;

        Material::create($data);

        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $models = ProductModel::where('status', true)->get();

        return view('materials.edit', compact('material'))
               ->with(compact('models'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $data = $request->all();
        $model = ProductModel::find($data['model_id']);
        $data['supplier_id'] = $model->vendor_id;
        $material->update($data);

        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        return redirect()->route('materials.index');
    }
}
