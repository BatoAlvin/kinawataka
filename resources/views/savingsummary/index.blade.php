
@extends('layouts.navigation')

@section('content')

<script>
    function clearTexts()
{
    document.getElementById('nameid').value = "";
    document.getElementById('amountid').value = "";
    document.getElementById('descriptionid').value = "";
    document.getElementById('dateid').value = "";
}

</script>

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
     <a href="{{ route('exportsavingsummary')}}" class="btn btn-success" style=""><i class="fa fa-download" style="color:#fff;">Excel</i></a>
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
                                <th>No</th>
                                <th>Names</th>
                                <th>Savings Amount(shs)</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($savingsummary as $savingsummaries)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                                <td>{{$savingsummaries['name']}}</td>
                                <td>{{ number_format($savingsummaries['amount'])}}</td>
                                {{-- <td>{{$savingsummaries->description}}</td>
                                <td>{{$savingsummaries->date}}</td>
                                </td> --}}


                                <td>
                                    <a href="{{url('savingsummary/'.$savingsummaries['id'] )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    </td>
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
