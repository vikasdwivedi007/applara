@extends('layouts.app')

@section('content')

<div class="container">
   <div class="data-table-area mg-tb-15">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="sparkline13-list">
                  <div class="sparkline13-hd">
                     <div class="main-sparkline13-hd">
                        <h1>Products <span class="table-project-n">Data</span> Table</h1>
                     </div>
                  </div>
                  <div class="sparkline13-graph">
                     <div class="datatable-dashv1-list custom-datatable-overright">
                        <div class="bootstrap-table">
                           <div class="fixed-table-toolbar">
                              <div class="bs-bars pull-left">
                                 <div id="toolbar">
                                    <select class="form-control">
                                       <option value="">Export Basic</option>
                                       <option value="all">Export All</option>
                                       <option value="selected">Export Selected</option>
                                    </select>
                                 </div>
                              </div>
                             @if(session('message'))
                                <button class="alert alert-success ">{{session('message')}}</button>
                           @endif 
                              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table table-hover JColResizer">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>FirstName</th>
                                       <th>LastName</th>
                                       <th>Email</th>
                                       <th>Mobile No</th>
                                       <th>Gender</th>
                                       <th>Status</th>
                                       <th>User Type</th>
                                       <th>Created At</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($getAdmin as $row)
                                 <tbody>
                                    <tr>
                                       <td>{{$row->id}}</td>
                                       <td>{{$row->firstName}}</td>
                                       <td>{{$row->lastName}}</td>
                                       <td>{{$row->email }}</td>
                                       <td>{{$row->phoneNumber}}</td>

                             <td>
                                    @if($row->gender == 1)
                                        <button type="button" title="male" class="btn btn-custon-rounded-three btn-primary btn-xs"> male</button>
                                  @else 
                                    <button type="button" title="female" class="btn btn-custon-rounded-three btn-info btn-xs">female </button>
                                      
                                   @endif
                             </td>

                             <td>
                                    @if($row->status == 1)
                                      <!-- <button type="button"  title="active" onclick="return changeStatus('{{$row->id}}','{{$row->status}}')" class="btn btn-custon-rounded-three btn-success btn-xs"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></button> -->
                                      <a href="{{ route('spr-admin/changeStatus') }}"  title="active" class="btn btn-custon-rounded-three btn-success btn-xs"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                  @else 
                                     <a href="{{ route('spr-admin/changeStatus') }}" title="dislike"  class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-thumbs-down" aria-hidden="true"></i> </a>

                                     <!-- <button type="button" title="dislike" onclick="return changeStatus('{{$row->id}}','{{$row->status}}')" class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-thumbs-down" aria-hidden="true"></i> </button> -->
                                      
                                   @endif
                             </td>

                              <td>
                                    @if($row->roll_id == 2)
                                        <button type="button" title="Admin" class="btn btn-custon-rounded-three btn-success btn-xs"> </i>Admin</button>
                                   @endif
                             </td>
                                       
                                       <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                                       <td>
                                        <button type="button" title="Edit" class="btn btn-custon-rounded-three btn-primary btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i> </button>

                                         <button type="button" title="Delete" class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-times adminpro-danger-error" aria-hidden="true"></i></button>
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
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
  // function changeStatus(id,status)
  // { 
    //  $.ajax({
    //         url: '{{url("spr-admin/changeStatus")}}',
    //         type: 'post',
    //         dataType: 'json',
    //         data: {"_token": "{{ csrf_token() }}", id : id, 'status':status},
    //         success:function(response){
    //         console.log(response); return false;
 
    //         }
          
    //  });
    // return  false; 
  // } 

</script>
@endsection