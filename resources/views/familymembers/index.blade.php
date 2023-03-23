
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('nameid').value = "";
    document.getElementById('emailid').value = "";
    document.getElementById('contactid').value = "";
    document.getElementById('locationid').value = "";
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
     <h5>Members</h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        @if(Auth::user()->role->add_familymember )
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Member</i></button>
       @endif

     <a href="{{ route('exportfamilymember')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Member</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('members.store')}}" method='post'>
                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                          <label for="recipient-name" class="coll">Names</label>
                          <input type="text" class="form-control"  name="family_name" id="nameid" required>
                        </div>

                        <div class="form-group">
                         <label for="recipient-name" class="coll">Email</label>
                         <input type="text" class="form-control"  name="email" id="emailid" required>
                       </div>


                       <div class="form-group">
                         <label for="recipient-name" class="coll"> Contact</label>
                         <input type="text" class="form-control"  name="contact" id="contactid" required>
                       </div>

                       <div class="form-group">
                         <label for="recipient-name" class="coll">Address</label>
                         <input type="text" class="form-control"  name="location" id="locationid" required>
                       </div>


                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearText()">Close</button>
                      <button type="submit" class="btn btn-primary">Add member</button>
                    </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
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
                                <th>Names</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member as $members)
                            <tr>
                                <td>{{$members->family_name}}</td>
                                <td>{{$members->email}}</td>
                                <td>{{$members->contact}}</td>
                                <td>{{$members->location}}</td>
                                </td>


                                <td>
                                    <div style="display:flex">
                                        <a href="{{url('members/'.$members->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color: #fff;"></i></button></a>


                                        @if(Auth::user()->role->update_familymember )
                                        <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $members->id }}" style="margin-left: 5px;"><i class='fa fa-edit'>
                                           </i>
                                           </button>
                                           @endif


                                           <div class="modal fade" id="exampleModal{{ $members->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Edit {{ $members->family_name }}</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body">
                                                     <form action="{{ route('members.update', [$members->id])}}" method='post'>

                                                       @method('PUT')
                                                                <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                       <div class="form-group">
                                                         <label for="recipient-name" class="col-form-label">Names</label>
                                                         <input type="text" class="form-control"  name="family_name" required value="{{$members->family_name}}">
                                                       </div>

                                                       <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Email</label>
                                                        <input type="text" class="form-control"  name="email" required value="{{$members->email}}">
                                                      </div>


                                                      <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label"> Contact</label>
                                                        <input type="text" class="form-control"  name="contact" required value="{{$members->contact}}">
                                                      </div>

                                                      <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Address</label>
                                                        <input type="text" class="form-control"  name="location" required value="{{$members->location}}">
                                                      </div>


                                                       <div class="modal-footer">
                                                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-primary">Update Member</button>
                                                   </div>
                                                     </form>

                                                   </div>

                                                 </div>

                                               </div>
                                             </div>



                                          <form action="{{route('members.destroy', $members->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            @if(Auth::user()->role->delete_familymember )
                                            <button class="btn btn-danger"  onclick="return confirm('Are you sure?')" style="margin-left: 5px;"><i class="fa fa-trash"></i></button>
                                           @endif
                                        </form>
                                    </div>

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
