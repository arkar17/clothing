@extends('layouts.app')

@section('title', 'Home')

@section('content')
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="row my-3">
                    <div class="col-md-4 col-6 mb-2">
                        <a href="{{ route('user.index') }}" class="btn btn-info rounded-sm text-decoration-none text-white py-4 d-flex justify-content-between">
                            <div class="align-self-center">
                                <i class="fa-solid fa-users fa-2xl"></i>
                            </div>
                            <div>
                                <p class="mb-0">Users</p>
                                <p class="mb-0">{{ count($users) }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-6 mb-2">
                        <a href="" class="btn btn-warning rounded-sm text-decoration-none text-white py-4 d-flex justify-content-between">
                            <div class="align-self-center">
                                <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                            </div>
                            <div>
                                <p class="mb-0">Orders</p>
                                <p class="mb-0">1,234</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4  mb-2">
                        <a href="" class="btn btn-success rounded-sm text-decoration-none text-white py-4 d-flex justify-content-between">
                            <div class="align-self-center">
                                <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                            </div>
                            <div>
                                <p class="mb-0">Orders</p>
                                <p class="mb-0">1,234</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

@endsection
