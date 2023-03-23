

   @extends('layouts.navigation')

   @section('content')


   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Savings for {{ $member->family_name }}</h4>
            {{-- <p class="mb-0">{{ $savingsummary->name}}</p> --}}
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Savings Summary</a></li>
        </ol>
    </div>
</div>

<div class="row">


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="table-responsive">
<table id="example2" class="display" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($savingsummary as $item)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ number_format($item->amount) }}</td>
    <td>{{ $item->date }}</td>
    <td>{{ $item->description }}</td>
</tr>
        @endforeach
    </tbody>
</table>
                    <a class="btn btn-primary mt-4" href="/savingsummary">Back</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

        @endsection

