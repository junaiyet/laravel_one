@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Update Subcategory</h3>
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
