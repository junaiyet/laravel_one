@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="hidden" class="form-control" name="category_id" value="{{$category_info->id}}">
                            <input type="text" class="form-control" name="category_name" value="{{$category_info->category_name}}">
                            @error('category_name')
                            <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Category Image</label> <br>
                            <img id="pic"  width="100" src="{{asset('uploads/category/')}}/{{$category_info->category_image}}" alt="">
                            <input type="file"  oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="category_image" value="">

                        </div>
                        <div class="mt-3">
                            <button type="submit" class=" btn btn-primary"> Update Category</button>
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
  title: '{{session('success')}}'
})
</script>
@endif
@endsection

