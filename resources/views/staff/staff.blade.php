

   @extends('layouts.navigation')

   @section('content')



 <script>

    function enableBrand(answer){
console.log(answer.value);
if(answer.value == 'doctor') {

    document.getElementById('carbrand').style.display = 'block';
}
else {

    document.getElementById('carbrand').style.display = 'none';

}
    };
   </script>



   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <p class="mb-0">{{ $staffs['staff_name']}}</p>
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
                                @if($staffs->staff_avatar)
                                    <img width="160" height="160" src="{{ asset('uploads/'.$staffs->staff_avatar)}}" alt="" class="rounded-circle" alt="#">
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

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3">Staff Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_name']}}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3">Staff Contact :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_contact']}}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3">Staff Email :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_email']}}</h5>

                        </div>

                    </div>

                    <div class="media pt-3">

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3">Date of Birth :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_dob']}}</h5>

                        </div>

                    </div>

                    <div class="media pt-3">

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3">Gender :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['gender']}}</h5>

                        </div>

                    </div>

                    <div class="media pt-3">

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3">Staff Address :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_address']}}</h5>

                        </div>

                    </div>

                    <a class="btn btn-primary mt-4" href="/staff">Back</a>

                    @if ($staffs['enroll'] == 0)
                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">Enroll</button>
                    @else


                    <button  class="btn btn-light mt-4" disabled>Enrolled</button>
                    @endif


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Enroll</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('enroll',$staffs['id'])}}" method='post'>
                                  <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Role</label>
                                  <select class="form-control" name="role" onchange="enableBrand(this)" required>
                                      <option selected disabled value=''>Choose Role</option>
                                      <option value='administrator'>Administrator</option>
                                      <option value='secretary'>Secretary</option>
                                      <option value='doctor'>Doctor</option>

                                    <div id="editor-container" class="mb-1"></div>
                                      </select>
                                </div>



                                <div class="form-group" style='display:none;' id="carbrand">
                                    <label>Speciality</label>
                                    <select class="form-control" name="speciality_id" required>
                                        <option selected disabled value=''>Choose Speciality</option>
                                        @foreach($speciality as $specialities)
                                        <option value="{{ $specialities->id}}">{{ $specialities->speciality_name}}</option>
                                        <div id="editor-container" class="mb-1"></div>
                                        @endforeach
                                      <div id="editor-container" class="mb-1"></div>
                                        </select>
                                </div>



                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input class="form-control" type="password" name="password" id="password" required>
                              </div>


                                <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Enroll</button>






                          </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

