
@extends('layouts.navigation')

@section('content')


<script>

function clearText()
{
    document.getElementById('role').value = "";

}


    $(document).ready(function() {
   const roleValidation = document.querySelector('#role');
   roleValidation.addEventListener('blur', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validaterole',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': roleValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){
      document.getElementById('role_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('role_res_message').style.display = 'none'
        document.getElementById('btn').disabled = false
      }
      },
      error: function(error) {
        console.log(error);
      }
      });
      }
      );
      }
      );


</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Roles Table</h4>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Roles</b></h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th style="color:#222;">Roles</th>

                                <th style="text-align:center; color:#222;">Action</th>
                            </tr>
                        </thead>
                        @foreach ($userpermissions as $userpermission)
                        <tr>
                            <td style="color:#222;">{{ Illuminate\Support\Str::of($userpermission->role_name)->words(6)}}</td>
                            <td>
                                <div class="center">

                        <a href="{{url('userpermission/'.$userpermission->id )}}">
                            <button class="btn btn-success"> View permission </button>
                        </a>
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
