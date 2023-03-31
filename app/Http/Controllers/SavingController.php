<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\User;
use App\Notifications\SavingsAdded;
use Illuminate\Support\Facades\Notification;
use App\Models\Familymembers;
use Illuminate\Http\Request;
use App\Exports\SavingsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Audit;

class SavingController extends Controller
{

    public function export()
    {
        return Excel::download(new SavingsExport, 'saving.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role_id==1){
            $saving = Saving::with('member')->get();
        }else{
            $saving = Saving::with('member')->where('name',Auth::user()->id)->get();
        }
        // return $saving;
        $consignee = Familymembers::where('status',1)->get();
        return view('savings.index',['saving'=>$saving,'consignee'=>$consignee]);
    }



    // public function savingindex()
    // {

    //           $saving = Saving::where('status',1)->get();
    //         // return   $posts = Saving::where('name', $user->id)->orderBy('id','desc')->get();
    //     $consignee = Familymembers::where('status',1)->get();
    //     return view('savings.allsavings',['saving'=>$saving,'consignee'=>$consignee]);
    // }




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
        $post_service = Saving::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
          ]);

          $action = 'Savings added successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 2
          ]);


        //   $headers = "MIME-Version: 1.0" . "\r\n";
        //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //   $from = "info@schoolmonitor.com";
        //   $msg = "Your saving of $request->amount has been received successfully";
        //   mail("alvinbato112@gmail.com","Deposit received successfully",$msg,$headers);
        //   $request->user()->notify(new SavingsAdded($request->amount));
        // $member = Familymembers::find($request->name)->first();
        // $email = ['mail'=>$member->email,'name'=>$member->family_name];
        // Notification::route('mail', $member->email)->notify(new SavingsAdded($member));
          return redirect('/savings')->with('message', "Savings saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saving = Saving::with('member')->find($id);
        return view('savings.saving')->with('saving', $saving);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function edit(Saving $saving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = Saving::where('id',$id)->first();
        if ($check) {
            $service = Saving::where('id',$id)->update([
                // 'name' => $request->name,
                 'amount' => $request->amount,
                 'description' => $request->description,
                 'date' => $request->date,

            ]);

            $action = 'Savings updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 2
            ]);


        return redirect('/savings')->with('message', "Savings updated successfully");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $savings=Saving::find($id);
        $savings->update([
          'status'=>0,
        ]);

        $action = 'Savings removed successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 2
        ]);


      return redirect()->back();
    }
}
