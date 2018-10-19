<?php

namespace App\Http\Controllers;

use App\Apartment;
use DataTables;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Apartment.view');
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vlan_id' => 'required|string',
        ]);

        Apartment::create($request->all());

        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vlan_id' => 'required|string',
        ]);

        $apartment = Apartment::findOrFail($id);
        $apartment->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Apartment::destroy($request->id);
        return response('Success');
    }

    public function getDataTable()
    {
        $apartments = Apartment::all();

        return DataTables::of($apartments)
            ->addColumn('edit', function ($apartment) {
                return '<button type="button" class="edit btn btn-sm btn-primary" data-name="' . $apartment->name . '" data-vlan-id="' . $apartment->vlan_id . '" data-id="' . $apartment->id . '">Edit</button>';
            })
            ->addColumn('delete', function ($apartment) {
                return '<button type="button" class="delete btn btn-sm btn-danger" data-delete-id="' . $apartment->id . '" data-token="' . csrf_token() . '" >Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}
