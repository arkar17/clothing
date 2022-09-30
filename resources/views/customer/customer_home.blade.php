@extends('layouts.app_plain')
@section('content')

<div class="d-flex justify-content-between gap-3">
   <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Phone</label>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>

    </div>
   </div>

   <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone">Address</label>
                    <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                
                <div class="mb-3">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>

    </div>
   </div>


</div>


@endsection
