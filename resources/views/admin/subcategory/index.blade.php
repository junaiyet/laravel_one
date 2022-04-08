@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Sub Category List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>SubCategory Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $kay => $subcategory)
                                    <tr>
                                        <td>{{ $kay + 1 }}</td>
                                        <td>{{ $subcategory->rel_to_category->category_name }}</td>
                                        <td>{{ $subcategory->subcategory_name }}</td>
                                        <td> <img width="50" src="{{asset('/uploads/subcategory/')}}/{{$subcategory->subcategory_image}}" > </td>

                                        <td>{{ $subcategory->created_at->diffForHumans() }}</td>

                                        <td>
                                            {{-- <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                class="btn btn-success">Edit</a></td> --}}
                                        <td>
                                   
                                            <a href="{{route('subcategory.forced.delete',$subcategory->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Subcategory</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-4">
                                <select name="category_id" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="" class="">Sub Category Nmae</label>
                                <input type="text" class="form-control" name="subcategory_name">
                                @error('subcategory_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="" class="form-label"> Sub Category Image</label>
                                <input type="file" class="form-control" name="subcategory_image">
                                @error('subcategory_image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary" {{ route('subcategory.forced.delete', $category->id) }}>Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
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
@endsection
