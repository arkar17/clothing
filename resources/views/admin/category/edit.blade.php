@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success" role="alert" id="alert">
                    <button type="button" class="btn-close" aria-label="Close" id="close-btn"></button>&nbsp;&nbsp;{{ session('success') }}
                </div>
            @endif
            <form action="{{route('category.update',$category_edit->id)}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="name"  value="{{$category_edit->name}}" class="form-control @error('category_name') is-invalid @enderror" name="category_name" name="category_name" required>
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('category.index')}}" class="btn btn-secondary" >Cancel</a>
            </form>
        </div>
    </div>


</div>
<script>
    $(document).ready(function () {
        $('body, #close-btn').click(function () {
        $('#alert').hide();
        event.stopPropagation();
    });

});


</script>

@endsection
