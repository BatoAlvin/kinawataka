<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Familymembers;
use App\Exports\LoansExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Audit;


class LoansController extends Controller
{
    public function export()
    {
        return Excel::download(new LoansExport, 'loan.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_loan ){
        $loan = Loans::with('memberloan')->where('status',1)->get();
        $consignee = Familymembers::where('status',1)->get();
        return view('loans.index',['loan'=>$loan,'consignee'=>$consignee]);
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
        $post_service = Loans::create([

            'family_id' => $request->family_id,
            'loan_amount' => $request->loan_amount,
            'return_amount' => $request->return_amount,
            'loan_percentage' => $request->loan_percentage,
            'loan_description' => $request->loan_description,
            'loan_date' => $request->loan_date,
          ]);

          $action = 'Loan added successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 1
          ]);
          return redirect('/loans')->with('message', "Loan saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $loan = Loans::find($id);
        return view('loans.loan')->with('loan', $loan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function edit(Loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Loans::where('id',$id)->first();
        if ($check) {
            $return = (((100+$request->loan_percentage)/100)*$request->loan_amount);
            $service = Loans::where('id',$id)->update([
                'loan_amount' => $request->loan_amount,
                'return_amount' => $return,
                'loan_percentage' => $request->loan_percentage,
                'loan_description' => $request->loan_description,
                'loan_date' => $request->loan_date,
            ]);

            $action = 'Loan updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 1
            ]);

        return redirect('/loans')->with('message', "Updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan=Loans::find($id);
        $loan->update([
          'status'=>0,
        ]);

        $action = 'Loan removed successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 1
        ]);


        return redirect('/loans')->with('message', "Loan removed successfully");
    }
}
