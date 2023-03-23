<?php

namespace App\Http\Controllers;

use App\Models\Userpermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserpermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userpermissions = Userpermission::where('id','!=',Auth::user()->role_id)->where('id','!=',1)->get();
        return view('userpermissions.index')->with('userpermissions',$userpermissions);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $userpermission = Userpermission::find($id);
        return view('userpermissions.userpermission')->with(['userpermission'=>$userpermission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function edit(Userpermission $userpermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $perm = Userpermission::where('id',$id)->update([
            $request->column => $request->status,
        ]);
        if($perm){
            return "updated";
        }else{
            return "Failed";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userpermission  $userpermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userpermission $userpermission)
    {
        //
    }
}
