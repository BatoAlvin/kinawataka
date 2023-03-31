<?php

namespace App\Http\Controllers;

use App\Models\Familymembers;
use App\Models\User;
use App\Exports\FamilymembersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\Audit;


class FamilymembersController extends Controller
{
    public function export()
    {
        return Excel::download(new FamilymembersExport, 'member.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->view_familymember ){
            $member = Familymembers::where('status',1)->orderBy('id','desc')->get();
            return view('familymembers.index')->with('member',$member);
        }else{
            return redirect('/');
        }
    }


    public function enroll(Request $request, $id)
    {
     $staff = Familymembers::find($id);
     $position = User::find($id);
    $user = User::create([
        'name' => $staff->family_name,
        'email' => $staff->email,
        'contact' => $staff->contact,
        'location' => $staff->location,
        'role_id' => $request->position_id,
        'family_id' => $staff->id,
        'password' => bcrypt($request->password),
    ]);

    $staff->enroll=1;
    $staff->save();
          return redirect('/members')->with('message', "Staff $user->name enrolled successfully");
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
        $post_service = Familymembers::create([
            'family_name' => ucfirst(strtolower($request->family_name)),
            'email' => $request->email,
            'contact' => $request->contact,
            'location' => ucfirst(strtolower($request->location)),
          ]);

          $action = 'Member added successfully';
          $audit = Audit::create([
              'action' => $action,
              'user_id' => Auth::user()->id,
              'category' => 3
          ]);


          return redirect('/members')->with('message', "Member $post_service->family_name saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Familymembers  $familymembers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Familymembers::find($id);
        return view('familymembers.familymember')->with('member', $member);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Familymembers  $familymembers
     * @return \Illuminate\Http\Response
     */
    public function edit(Familymembers $familymembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Familymembers  $familymembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = Familymembers::where('id',$id)->first();
        if ($check) {
            $service = Familymembers::where('id',$id)->update([
                'family_name' => ucfirst(strtolower($request->family_name)),
                 'email' => $request->email,
                 'contact' => $request->contact,
                 'location' => $request->location,

            ]);

            $action = 'Member updated successfully';
            $audit = Audit::create([
                'action' => $action,
                'user_id' => Auth::user()->id,
                'category' => 3
            ]);


        return redirect('/members')->with('message', "Member updated successfully");
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Familymembers  $familymembers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members=Familymembers::find($id);
        $members->update([
          'status'=>0,
        ]);

        $action = 'Member removed successfully';
        $audit = Audit::create([
            'action' => $action,
            'user_id' => Auth::user()->id,
            'category' => 3
        ]);

        return redirect('/members')->with('message', "Member removed successfully");
    }
}
