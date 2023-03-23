

   @extends('layouts.navigation')

   @section('content')


   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <p class="mb-0">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
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


                                    <img width="160" height="160" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">



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

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3"> Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ Auth::user()->name }}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Email :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ Auth::user()->email }}</h5>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

