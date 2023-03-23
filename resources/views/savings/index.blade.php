
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
     <h5>Savings </h5>


        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        @if(Auth::user()->role->add_saving )
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Saving</i></button>
        @endif
        <a href="{{ route('exportsaving')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a>

        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Saving</i></button> --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Savings</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('savings.store')}}" method='post'>
                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                 <div class="form-group">
                                  <label for="recipient-name" class="coll">Name</label>
                                  <select class="form-control" name="name" required>
                                    <option selected disabled value=''>Choose Name</option>
                                        @foreach($consignee as $consignees)
                                        <option value="{{ $consignees->id}}">{{ $consignees->family_name}}</option>
                                        <div id="editor-container" class="mb-1"></div>
                                        @endforeach
                                   </select>
                                </div>

                        <div class="form-group">
                         <label for="recipient-name" class="coll">Savings Amount</label>
                         <input type="number" class="form-control"  name="amount" id="amountid" required>
                       </div>


                       <div class="form-group">
                         <label for="recipient-name" class="coll"> Description</label>
                         <textarea type="text" class="form-control"  name="description" id="descriptionid" required></textarea>
                       </div>

                       <div class="form-group">
                         <label for="recipient-name" class="coll">Date</label>
                         <input type="date" class="form-control"  name="date" id="dateid" required>
                       </div>


                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearTexts()">Close</button>
                      <button type="submit" class="btn btn-primary">Add Saving</button>
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
                                <th>No</th>
                                <th>Names</th>
                                <th>Savings Amount(shs)</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saving as $savings)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                                <td>{{$savings->member?$savings->member->family_name:'-'}}</td>
                                <td>{{ number_format($savings->amount)}}</td>
                                <td>{{$savings->description}}</td>
                                <td>{{$savings->date}}</td>
                                </td>


                                <td>
                                    <div style="display: flex;">
                                    <a href="{{url('savings/'.$savings->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    @if(Auth::user()->role->update_saving )
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $savings->id }}" style="margin-left: 5px;"><i class='fa fa-edit'>
                                       </i>
                                       </button>
                                        @endif

                                       <div class="modal fade" id="exampleModal{{ $savings->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit {{ $savings->member->family_name }}</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('savings.update', [$savings->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                                                   <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Savings Amount</label>
                                                    <input type="number" class="form-control"  name="amount" required value="{{$savings->amount}}">
                                                  </div>


                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label"> Description</label>
                                                    <input type="text" class="form-control"  name="description" required value="{{$savings->description}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date</label>
                                                    <input type="date" class="form-control"  name="date" required value="{{$savings->date}}">
                                                  </div>


                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update Savings</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>



                                      <form action="{{route('savings.destroy', $savings->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        @if(Auth::user()->role->delete_saving )
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
