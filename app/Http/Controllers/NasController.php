<?php

namespace App\Http\Controllers;

use App\Nas;
use Illuminate\Http\Request;
use DataTables;

class NasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.NAS.view');
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
            'secret' => 'required|string',
            'ipaddress' => 'required|string|unique:nas|ipv4',
            'description' => 'required|string',
        ]);

        Nas::create($request->all());

        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function show(Nas $nas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function edit(Nas $nas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'secret' => 'required|string',
            'ipaddress' => 'required|string|ipv4',
            'description' => 'required|string',
        ]);

        $nas = Nas::findOrFail($id);
        $nas->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Nas::destroy($request->id);
        return response('Success');
    }

    public function getDataTable()
    {
        $nases = Nas::all();

        return DataTables::of($nases)
            ->addColumn('edit', function ($nas) {
                return '<button type="button" class="edit btn btn-sm btn-primary" data-name="' . $nas->name . '" data-secret="' . $nas->secret . '" data-ipaddress="' . $nas->ipaddress . '" data-description="' . $nas->description . '" data-id="' . $nas->id . '">Edit</button>';
            })
            ->addColumn('delete', function ($apartment) {
                return '<button type="button" class="delete btn btn-sm btn-danger" data-delete-id="' . $apartment->id . '" data-token="' . csrf_token() . '" >Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}
