<?php

namespace App\Http\Controllers;

use App\MacAddress;
use Auth;
use Illuminate\Http\Request;
use DataTables;

class MacAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Client.MacAddress.view');
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
            'macaddress' => 'required|string|unique:mac_addresses',
        ]);

        Auth::user()->macAddresses()->create($request->all());

        return response('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'macaddress' => 'required|string|unique:mac_addresses',
        ]);

        $macAddress = Auth::user()->macAddresses()->findOrFail($id);
        $macAddress->update($request->all());
        return response('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MacAddress::destroy($id);

        return response('Success');
    }

    public function getDataTable()
    {
        $macAddresses = MacAddress::all();

        return DataTables::of($macAddresses)
            ->addColumn('delete',function ($macAddress){
                return '<button type="button" class="delete btn btn-sm btn-danger" data-delete-id="'.$macAddress->id.'" data-token="'.csrf_token().'" >Delete</button>';
            })
            ->rawColumns(['delete'])
            ->make(true);
    }
}
