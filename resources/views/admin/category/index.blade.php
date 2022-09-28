@extends('layouts.app')

@section('title', 'Category')

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
            <a href="{{route('category.create')}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;{{__('Create')}}</a>
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($category_index as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit',$category->id)}}" title="Edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            {{-- <a href="{{route('category.edit',$category->id)}}" title="Edit" data-bs-toggle="modal" id="editcategory" name="category_id "><i class="fa-solid fa-pen-to-square"></i></a> --}}
                            <a href="{{route('category.destroy',$category->id)}}" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- create modal --}}
    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('Create Category')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" required>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    {{-- end create modal --}}

    {{-- edit modal --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('Edit Category')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" required>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    {{-- end edit modal --}}
</div>
<script>
    $(document).ready(function () {
        $('body, #close-btn').click(function () {
        $('#alert').hide();
        event.stopPropagation();
    });

    $('#dataTable').DataTable();

});

    $('#editcategory ').click(function () {
        var category_id=$('#editcategory').val();
        console.log(category_id);
                $('#editModal').modal('show');
        });

</script>

@endsection
