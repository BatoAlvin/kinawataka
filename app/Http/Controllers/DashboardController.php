<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familymembers;
use App\Models\User;
use App\Models\Saving;
use App\Models\Loans;
use App\Models\Audit;

class DashboardController extends Controller
{

    public function index()
    {
            return view('dashboard');
    }


    public function fetchaudits()
    {
        $audits = Audit::with('user')->get();
        return view('audits.index',['audits'=>$audits]);
    }


   public function dashboard()
    {
       $staff = Familymembers::where("status",1)->count();
       $loan = Loans::where("status",1)->sum('return_amount');
    $savings = Saving::where('status',1)->sum('amount');
    $membersavings = [];
    $members = Familymembers::where('status',1)->whereNot('id', '=', 10)->get();
    foreach ($members as $member) {
        $msavings = Saving::where(['name'=>$member->id, 'status'=>1])->sum('amount');
        array_push($membersavings,['name'=>$member->family_name,'amount'=>$msavings]);
    }
        return view('dashboard',['staff'=>$staff,'savings'=>$savings,'loan'=>$loan,'membersavings'=>$membersavings]);
    }

    public function myprofile()
    {
         return view('profile');
    }

    public function createuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|confirmed|min:3',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $user->attachRole('administrator');


        return redirect('/user')->with('message', "User saved");

    }

    public function search(Request $request){
        $audits = Audit::whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
        return view('audits.index',['audits'=>$audits]);
       }
}
