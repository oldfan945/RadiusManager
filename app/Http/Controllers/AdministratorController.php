<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DataTables;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrators = Admin::all();
        return view('Admin.Register.view',compact('administrators'));
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
            'email' => 'required|string|email|unique:admins',
        ]);

        Admin::create($request->all());
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
        //
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response('Success');
    }

    public function getDataTable()
    {
        $admins = Admin::all();

        return DataTables::of($admins)
            ->addColumn('edit', function ($admins) {
                return '<button type="button" class="edit btn btn-sm btn-primary" data-name="' . $admins->name . '" data-email="' . $admins->email . '"  data-id="' . $admins->id . '">Edit</button>';
            })
            ->addColumn('delete', function ($admins) {
                return '<button type="button" class="delete btn btn-sm btn-danger" data-delete-id="' . $admins->id . '" data-token="' . csrf_token() . '" >Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}
