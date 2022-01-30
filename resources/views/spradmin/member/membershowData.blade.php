@foreach($getMember as $row) 
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
      <button type="button"  title="active" onclick="return memberStatusChange('{{$row->id}}','{{$row->status}}')" class="btn btn-custon-rounded-three btn-success btn-xs"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
      @else 
      <button type="button" title="inactive" onclick="return memberStatusChange('{{$row->id}}','{{$row->status}}')" class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-thumbs-down" aria-hidden="true"></i> </button>
      @endif
   </td>
   <td>
      @if($row->roll_id == 4)
      <button type="button" title="usereditform" class="btn btn-custon-rounded-three btn-warning btn-xs"> </i>Member</button>
      @endif
   </td>
  <!--  <td>{{date('d-m-Y', strtotime($row->created_at))}}</td> -->
   <td>
      <button type="button" onclick="return membereditform('{{$row->id}}')" title="Edit" class="btn btn-custon-rounded-three btn-primary btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i> </button>
      <button type="button"onclick="return memberDelete('{{$row->id}}')"  title="Delete" class="btn btn-custon-rounded-three btn-danger btn-xs"><i class="fa fa-times adminpro-danger-error" aria-hidden="true"></i></button>

        <a style="color: white;" href="{{ route('spr-admin/viewMembersDetails',$row->id) }}"    title="view" class="btn btn-custon-rounded-three btn-info btn-xs"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
   </td>
</tr>
@endforeach