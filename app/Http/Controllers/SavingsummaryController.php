<?php

namespace App\Http\Controllers;

use App\Models\Savingsummary;
use App\Models\Familymembers;
use App\Models\Saving;
use App\Exports\SavingsummaryExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SavingsummaryController extends Controller
{
    public function export()
    {
        return Excel::download(new SavingsummaryExport, 'savingsummary.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_savingsummary ){
        $membersavings = [];
        $members = Familymembers::all();

        // $members = Familymembers::where('status',1)->get();
foreach ($members as $member) {
    $savings = Saving::where(['name'=>$member->id, 'status'=>1])->sum('amount');
    array_push($membersavings,['id'=>$member->id,'name'=>$member->family_name,'amount'=>$savings]);
}
        return view('savingsummary.index',['savingsummary'=>$membersavings]);
    }else{
        return redirect('/');
    }
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
     * @param  \App\Models\Savingsummary  $savingsummary
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $member = Familymembers::find($id);
        $savingsummary = Saving::where('name',$id)->get();
        return view('savingsummary.savingsummary')->with(['savingsummary' => $savingsummary,'member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Savingsummary  $savingsummary
     * @return \Illuminate\Http\Response
     */
    public function edit(Savingsummary $savingsummary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Savingsummary  $savingsummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Savingsummary $savingsummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Savingsummary  $savingsummary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Savingsummary $savingsummary)
    {
        //
    }
}
