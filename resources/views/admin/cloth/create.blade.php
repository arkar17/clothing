@extends('layouts.app')

@section('title', 'Add New Cloth')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success" role="alert" id="alert">
                    <button type="button" class="btn-close" aria-label="Close" id="close-btn"></button>&nbsp;&nbsp;{{ session('success') }}
                </div>
            @endif
            <form action="{{route('cloth.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                <div class="mb-3">
                    <label for="cloth_name" class="form-label">Cloth Name</label>
                    <input type="name" class="form-control @error('cloth_name') is-invalid @enderror" id="cloth_name" name="cloth_name" value="{{ old('cloth_name') }}">
                    @error('cloth_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-select form-select-md mb-3 @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($cloth_create_category as $category)
                        <option value="{{$category->id}}" {{ old("category_id") == $category->id ? "selected":"" }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cloth_type" class="form-label">Cloth Type</label>
                    <select name="cloth_type" class="form-select form-select-md mb-3 @error('cloth_type') is-invalid @enderror">
                        <option value="">Select Cloth Type</option>
                        <option value="WOMEN" {{ old("cloth_type")== "WOMEN" ? "selected":""}}>WOMEN</option>
                        <option value="MEN" {{ old("cloth_type")== "MEN" ? "selected":"" }}>MEN</option>
                        <option value="KID" {{ old("cloth_type")== "KID" ? "selected":"" }}>KID</option>
                        {{-- <option value="{{$category->id}} {{ old("cloth_type") == $cloth_type ? "selected":"" }}">{{$category->name}}</option> --}}
                    </select>

                    {{-- <input type="name" class="form-control @error('cloth_type') is-invalid @enderror" id="cloth_type" name="cloth_type" value="{{ old('cloth_type') }}"> --}}
                    @error('cloth_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Size : </label>
                    {{-- <input type="name" class="form-control @error('size') is-invalid @enderror" id="size" name="size" value="{{ old('size') }}"> --}}
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="XXS" name="size[]" value="XXS"/>
                        <label class="form-check-label" for="XXS">XXS</label>
                    </div>
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
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="number" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price" name="discount_price" value="{{ old('discount_price') }}">
                    @error('discount_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color : </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="BLACK" name="color[]" value="BLACK"/>
                        <label class="form-check-label" for="BLACK">Black</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="WHITE" name="color[]" value="WHITE"/>
                        <label class="form-check-label" for="WHITE">White</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="RED" name="color[]" value="RED"/>
                        <label class="form-check-label" for="RED">Red</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="GREEN" name="color[]" value="GREEN"/>
                        <label class="form-check-label" for="GREEN">Green</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="BLUE" name="color[]" value="BLUE"/>
                        <label class="form-check-label" for="BLUE">Blue</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="YELLOW" name="color[]" value="YELLOW"/>
                        <label class="form-check-label" for="YELLOW">Yellow</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="PURPLE" name="color[]" value="PURPLE"/>
                        <label class="form-check-label" for="PURPLE">Purple</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="ORANGE" name="color[]" value="ORANGE"/>
                        <label class="form-check-label" for="ORANGE">Orange</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="PINK" name="color[]" value="PINK"/>
                        <label class="form-check-label" for="PINK">Pink</label>
                    </div>

                    @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photos" class="form-label">Photos</label>
                    <div class="gallery"></div>
                    <input type="file" class="form-control @error('photos') is-invalid @enderror" id="photos" name="photos[]" value="{{ old('photos.*') }}" multiple >
                    @error('photos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @error('photos.*')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="favourite_status" class="form-label">Favourite Status</label>
                    <input type="number" class="form-control @error('favourite_status') is-invalid @enderror" id="favourite_status"  value="0" name="favourite_status" value="{{ old('favourite_status') }}">
                    @error('favourite_status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"></textarea>
                    {{-- <input type="name" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}"> --}}
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="reset" class="btn btn-secondary" >Reset</button>
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

    $('.summernote').summernote({
        height: 300,
        });

});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img  style="width: 8%;height:8%">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }

        }

    };

    $('#photos').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});



</script>

@endsection
