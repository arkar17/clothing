@extends('layouts.app')

@section('title', 'Cloth')

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

        </div>
        <div class="col-md-12">
            <a href="{{route('cloth.create')}}" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;{{__('Create')}}</a>
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cloth Name</th>
                        <th>Category</th>
                        <th>Cloth Type</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Quantity</th>
                        <th>Color</th>
                        <th>Photos</th>
                        <th>Favourite Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($cloth_index as $cloth)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$cloth->cloth_name}}</td>
                        <td>{{$cloth->category->name}}</td>
                        <td>{{$cloth->cloth_type}}</td>
                        <td>{{$cloth->size}}</td>
                        <td class="text-success">{{$cloth->price}}Ks</td>
                        <td>{{$cloth->discount_price}}</td>
                        <td>{{$cloth->quantity}}</td>
                        <td>{{$cloth->color}}</td>
                        <td>{{$cloth->photos}}</td>
                        <td>{{$cloth->favourite_status}}</td>
                        <td>{{$cloth->description}}</td>
                        <td>
                            <a href="{{route('cloth.edit',$cloth->id)}}" title="Edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('cloth.destroy',$cloth->id)}}" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
