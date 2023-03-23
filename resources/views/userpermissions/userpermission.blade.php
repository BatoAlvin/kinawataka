@extends('layouts.navigation')
@section('content')
<form action="">
 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

<script>
function changePermission(column){
let role_id = document.getElementById('role_id').value
var token = document.getElementById('token').value
let status = null
if(document.getElementById(column).checked == true){
status = 1
}else{
status = 0
}

// Let the backend do all the validation magic on blur

 $.ajax({
type: 'put',
url: `/userpermission/${role_id}`,
_token: token,
data: {
 "_token": "{{ csrf_token() }}",
 'status': status,
 'column': column,
 'role_id': role_id,
},
success: function(data) {
 console.log(data);
},
error: function(error) {
 console.log(error);
}
});
}
</script>



<style>
 .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
 }

 .switch input {
   opacity: 0;
   width: 0;
   height: 0;
 }

 .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
 }

 .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
 }

 input:checked + .slider {
   background-color: #2196F3;
 }

 input:focus + .slider {
   box-shadow: 0 0 1px #2196F3;
 }

 input:checked + .slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
 }

 /* Rounded sliders */
 .slider.round {
   border-radius: 34px;
 }

 .slider.round:before {
   border-radius: 50%;
 }
 </style>

<input type="text" id="role_id" value="{{$userpermission->id}}" style="visibility: hidden"/>
<div class="container-fluid">
 <div class="row">
     <div class="col-12">
         <div class="page-title-box">
             <h4 class="page-title">Userpermissions Table</h4>

             <div class="clearfix"></div>
         </div>
     </div>
 </div>


 <div class="row">
     <div class="col-12">

         <div class="card">
             <div class="card-body table-responsive">

                 <h4 class="m-t-0 header-title mb-4"><b>Userpermissions for {{($userpermission->role_name)}}</b></h4>
                 <nav>
                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                       <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="color:#222;">Members</button>
                       <button class="nav-link" id="nav-save-tab" data-toggle="tab" data-target="#nav-save" type="button" role="tab" aria-controls="nav-save" aria-selected="false">Savings</button>
                       <button class="nav-link" id="nav-summary-tab" data-toggle="tab" data-target="#nav-summary" type="button" role="tab" aria-controls="nav-summary" aria-selected="false">Savings Summary</button>
                       <button class="nav-link" id="nav-audit-tab" data-toggle="tab" data-target="#nav-audit" type="button" role="tab" aria-controls="nav-audit" aria-selected="false">Audits</button>
                       <button class="nav-link" id="nav-loans-tab" data-toggle="tab" data-target="#nav-loans" type="button" role="tab" aria-controls="nav-loans" aria-selected="false">Loans</button>
                     <button class="nav-link" id="nav-permission-tab" data-toggle="tab" data-target="#nav-permission" type="button" role="tab" aria-controls="nav-permission" aria-selected="false">Permissions</button>

                     </div>
                   </nav>
                   <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permissions</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>
                             <tr>
                                 <td style="color:#222;"> View Members</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_familymember')" id="view_familymember" type="checkbox"
                                         @if ($userpermission->view_familymember == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Add Member</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('add_familymember')" id="add_familymember" type="checkbox"
                                         @if ($userpermission->add_familymember == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Delete Member</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('delete_familymember')" id="delete_familymember" type="checkbox"
                                         @if ($userpermission->delete_familymember == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Update Member</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('update_familymember')" id="update_familymember" type="checkbox"
                                         @if ($userpermission->update_familymember == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>



                     <div class="tab-pane fade" id="nav-save" role="tabpanel" aria-labelledby="nav-save-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;">  View Savings</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_saving')" id="view_saving" type="checkbox"
                                        @if ($userpermission->view_saving == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Add Savings</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('add_saving')" id="add_saving" type="checkbox"
                                        @if ($userpermission->add_saving == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Delete Savings</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('delete_saving')" id="delete_saving" type="checkbox"
                                        @if ($userpermission->delete_saving == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Update Savings</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('update_saving')" id="update_saving" type="checkbox"
                                        @if ($userpermission->update_saving == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>




                     <div class="tab-pane fade" id="nav-loans" role="tabpanel" aria-labelledby="nav-loans-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permission</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>
                             <tr>
                                 <td style="color:#222;">  View Loans</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_loan')" id="view_loan" type="checkbox"
                                         @if ($userpermission->view_loan == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;">  Create Loan</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('add_loan')" id="add_loan" type="checkbox"
                                         @if ($userpermission->add_loan == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;">  Delete Loan</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('delete_loan')" id="delete_loan" type="checkbox"
                                         @if ($userpermission->delete_loan == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;">  Update Loan</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('update_loan')" id="update_loan" type="checkbox"
                                         @if ($userpermission->update_loan == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>




                     <div class="tab-pane fade" id="nav-summary" role="tabpanel" aria-labelledby="nav-summary-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Savings Summary</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_savingsummary')" id="view_savingsummary" type="checkbox"
                                        @if ($userpermission->view_savingsummary == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>




                    <div class="tab-pane fade" id="nav-audit" role="tabpanel" aria-labelledby="nav-audit-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Audits</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_audit')" id="view_audit" type="checkbox"
                                        @if ($userpermission->view_audit == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                     <div class="tab-pane fade" id="nav-permission" role="tabpanel" aria-labelledby="nav-permission-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permission</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>

                             <tr>
                                 <td style="color:#222;"> View Permissions</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_permission')" id="view_permission" type="checkbox"
                                         @if ($userpermission->view_permission == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                             </tbody>
                         </table>
                     </div>
                   </div>
             </div>
         </div>
     </div>
 </div>
</div>


     @endsection

