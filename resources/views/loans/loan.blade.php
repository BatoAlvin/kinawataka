

   @extends('layouts.navigation')

   @section('content')

   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <p class="mb-0">{{ $loan->family_name}}</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Loans</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="profile-statistics">
                    <div class="text-center mt-4 border-bottom-1 pb-3">
                        <div class="row">
                            <div class="col">
                                @if($loan->staff_avatar)
                                    <img width="160" height="160" src="{{ asset('uploads/'.$loan->staff_avatar)}}" alt="" class="rounded-circle" alt="#">
                                    @else
                                    <img width="160" height="160" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                    @endif


                            </div>

                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="media pt-3">
                        <h5 class="mr-3"> Names :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $loan->memberloan->family_name}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Amount :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ number_format($loan->loan_amount) }}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Return Amount :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ number_format($loan->return_amount) }}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Description :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $loan['loan_description']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Date:</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $loan['loan_date']}}</h5>
                        </div>
                    </div>
                    <a class="btn btn-primary mt-4" href="/loans">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

