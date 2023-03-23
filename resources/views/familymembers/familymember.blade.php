

   @extends('layouts.navigation')

   @section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Member Details!</h4>
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
    {{-- <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="profile-statistics">
                    <div class="text-center mt-4 border-bottom-1 pb-3">
                        <div class="row">
                            <div class="col">
                                @if($member->staff_avatar)
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
    </div> --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">

                    <div class="media pt-3">
                        <h5 class="mr-3"> Names :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $member['family_name']}}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Contact :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $member['contact']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Email :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $member['email']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Address:</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $member['location']}}</h5>
                        </div>
                    </div>


                    <a class="btn btn-primary mt-4" href="/members">Back</a>

                    @if ($member['enroll'] == 0)
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
                              <form action="{{ route('enroll',$member['id'])}}" method='post'>
                                  <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Role</label>
                                  <select class="form-control" name="position_id" required>
                                      <option selected disabled value=''>Choose Role</option>
                                      <option value='1'>Administrator</option>
                                      <option value='2'>User</option>
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

