@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <h3>Category List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.marked') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-sttiped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll">Mark All</th>
                                            <th>Sl</th>
                                            <th>Category Nmae</th>
                                            <th>Added By</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $kay => $category)
                                            <tr>
                                                <td><input type="checkbox" name="mark[]" value="{{ $category->id }}"></td>
                                                <td>{{ $kay + 1 }}</td>
                                                <td>{{ $category->category_name }}</td>
                                                <td> <img width="50" src="{{asset('/uploads/category/')}}/{{$category->category_image}}" > </td>
                                                <td>{{ $category->created_at->diffForHumans() }}</td>

                                                <td>

                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('category.delete', $category->id) }}"
                                                        class="btn btn-danger delete">Delete</a>
                                                    {{-- <button delete_name="{{ route('category.delete',$category->id)}}" class="btn btn-danger delete">Delete</button> --}}
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                @error('mark')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                @if (App\Models\Category::count() > 0)

                                <button type="submit" class="btn btn-danger">Delete Marked</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class=" mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Trust Category List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sttiped">
                                <thead>
                                    <tr>
                                        <td>Sl</td>
                                        <td>Category Nmae</td>
                                        <td>Added By</td>
                                        <td>Image</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trust_category as $kay => $category)
                                        <tr>
                                            <td>{{ $kay + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->rel_to_user->name }}</td>
                                            <td> <img width="50" src="{{asset('/uploads/category/')}}/{{$category->category_image}}" > </td>
                                            <td>{{ $category->created_at->diffForHumans() }}</td>

                                            <td>

                                                <a href="{{ route('category.restore', $category->id) }}"
                                                    class="btn btn-success">Restore</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.forced.delete', $category->id) }}"
                                                    class="btn btn-danger delete">Delete</a>
                                                {{-- <button delete_name="{{ route('category.delete',$category->id)}}" class="btn btn-danger delete">Delete</button> --}}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Category</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                                @error('category_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Category Image</label>
                                <input type="file" class="form-control" name="category_image">
                                @error('category_image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class=" btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>
@endsection


@section('footer_script')
    {{-- <script>
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
</script> --}}
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif



    <script>
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endsection
