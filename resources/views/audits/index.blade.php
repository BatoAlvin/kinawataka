
@extends('layouts.navigation')

@section('content')

<style>
    .coll{
color:#000;
    }

    .error{
    color:red;
    font-style:italic;
}
</style>
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
     <h5>Savings Summary </h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
     {{-- <a href="{{ route('exportsavingsummary')}}" class="btn btn-success" style=""><i class="fa fa-download" style="color:#fff;">Excel</i></a> --}}
    </div>
</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audits as $audit)
                            <tr>
                                <td>{{ Illuminate\Support\Str::of($audit->action)->words(6)}}</td>
                                <td>{{ Illuminate\Support\Str::of($audit->user->name)->words(6)}}</td>
                                @if($audit->category == 1)
                                <td>Loans</td>

                                @elseif($audit->category == 2)
                                <td>Savings</td>

                                @elseif($audit->category == 3)
                                <td>Members</td>

                                @endif
                                <td>{{ Illuminate\Support\Str::of($audit->created_at)->words(6)}}</td>
                                                    </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection
