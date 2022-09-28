@extends('layouts.app')

@section('title', 'Edit Cloth')

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
            <form action="{{route('cloth.update',$cloth_edit->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{$cloth_edit->user_id}}" name="user_id">
                <div class="mb-3">
                    <label for="cloth_name" class="form-label">Cloth Name</label>
                    <input type="name" class="form-control @error('cloth_name') is-invalid @enderror" id="cloth_name" name="cloth_name" value="{{$cloth_edit->cloth_name}}">
                    @error('cloth_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-select form-select-md mb-3 @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($cloth_edit_category as $category)
                        <option value="{{ $category->id }}" {{ $cloth_edit->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cloth_type" class="form-label">Cloth Type</label>
                    <input type="name" class="form-control @error('cloth_type') is-invalid @enderror" id="cloth_type" name="cloth_type" value="{{$cloth_edit->cloth_type}}">
                    @error('cloth_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label">Size : </label>
                    @foreach(json_decode($cloth_edit->size, true) as $size)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="XXS" name="size[]" value="XXS"  @checked($cloth_edit->size == 'XXS')/>
                        <label class="form-check-label" for="XXS">XXS</label>
                    </div>
                    @endforeach

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="XS" name="size[]" value="XS"/>
                        <label class="form-check-label" for="XS">XS</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="S" name="size[]" value="S"/>
                        <label class="form-check-label" for="S">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="M" name="size[]" value="M"/>
                        <label class="form-check-label" for="M">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="L" name="size[]" value="L"/>
                        <label class="form-check-label" for="L">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="XL" name="size[]" value="XL"/>
                        <label class="form-check-label" for="XL">XL</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="XXL" name="size[]" value="XXL"/>
                        <label class="form-check-label" for="XXL">XXL</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="free" name="size[]" value="FREE"/>
                        <label class="form-check-label" for="free">Free</label>
                    </div>

                    @error('size')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="name" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{$cloth_edit->price}}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="name" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price" name="discount_price" value="{{$cloth_edit->discount_price}}">
                    @error('discount_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="name" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{$cloth_edit->quantity}}">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="name" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{$cloth_edit->color}}">
                    @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photos" class="form-label">Photos</label>
                    <input type="name" class="form-control @error('photos') is-invalid @enderror" id="photos" name="photos" value="{{$cloth_edit->photos}}">
                    @error('photos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="favourite_status" class="form-label">Favourite Status</label>
                    <input type="number" class="form-control @error('favourite_status') is-invalid @enderror" id="favourite_status"  value="{{$cloth_edit->favourite_status}}" name="favourite_status" value="{{ old('favourite_status') }}">
                    @error('favourite_status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="name" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$cloth_edit->description}}">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary" >Cancel</a>
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

    $('#dataTable').DataTable();

});

</script>

@endsection
