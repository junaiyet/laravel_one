@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
       <div class="card">
           <div class="card-header">
               <h2>User List <strong class="float-end"> Total User:({{$total_user}}) </strong></h2>
           </div>
           <div class="card-body">
               <table class="table table-bordered">
                   <thead>
                       <tr>
                           <th>Sl</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Created At</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($all_users as $kay=>$user)

                            <tr>
                      <td>{{$all_users->firstitem()+$kay}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at}}</td>
                       <td>
                       <a href="{{ route('delete.user',$user->id)}}" class="btn btn-danger delete">Delete</a>
                       </td>
                    </tr>
                        @endforeach
                   </tbody>
               </table>
               {{ $all_users->links()}}
           </div>
       </div>
        </div>
    </div>
</div>

@endsection


@section('footer_script')




<script>
$('.delete').click(function(){
var url = $(this).attr('delete_name');

    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

  window.location=url;
  }
})
})
</script>


@endsection


