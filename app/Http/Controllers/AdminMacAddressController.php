<?php

namespace App\Http\Controllers;

use App\MacAddress;
use Auth;
use Illuminate\Http\Request;
use DataTables;
use App\User;

class AdminMacAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::pluck('name', 'id');
        return view('Admin.MacAddress.view', compact('users'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'macaddress' => 'required|string|unique:mac_addresses|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
        ]);

        MacAddress::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return MacAddress::destroy($id);
    }

    public function destroyAll()
    {
        MacAddress::where('is_permanent', '=', 0)
            ->delete();

        return response('Success');
    }

    public function getDataTable()
    {
        $macAddresses = MacAddress::with('user')->select('mac_addresses.*');
        return DataTables::of($macAddresses)
            ->addColumn('is_permanent', function ($macAddress) {
                if ($macAddress->is_permanent == 1)
                    return '<button type="button" class="btn btn-sm btn-success">Yes</button>';
                else
                    return '<button type="button" class="btn btn-sm btn-danger">No</button>';
            })
            ->addColumn('delete', function ($macAddress) {
                return '<button type="button" class="delete btn btn-sm btn-danger" data-delete-id="' . $macAddress->id . '" data-token="' . csrf_token() . '" >Delete</button>';
            })
            ->rawColumns(['is_permanent', 'delete'])
            ->make(true);
    }
}
