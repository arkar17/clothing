@extends('layouts.app')
@section('title', 'All Users')

@section('css')
    <style>
        .Datatable tr{
            vertical-align: middle;
        }

    </style>
@endsection
@section('content')
    <div class="col-md-9 mx-auto">
        <div class="card p-3">
            <table class="table table-striped Datatable" style="width:100%" id="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@endsection


@push('script')
    <script>
        $(function() {
            $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                mark: true,
                ajax: 'user/datatable/ssd',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $(document).on('click', '.info-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    method: "GET",
                    url: `/admin/user/${id}`
                }).done(function(res) {
                    Swal.fire({
                        'html': `
                                <div class="text-start">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-5">
                                            <p class="mb-0">
                                                <i class="fa-regular fa-address-card me-2"></i>
                                                <span>Name</span>
                                                <p class="ms-4 ps-2 text-muted">
                                                    <small class="text-muted">${res.user.name}</small>
                                                </p>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-0">
                                                <i class="fa-solid fa-location-arrow me-2"></i>
                                                <span>Division</span>
                                                <p class="ms-4 ps-2 text-muted">
                                                    <small class="text-muted">${res.user.division ?? '?'}</small>
                                                </p>
                                            </p>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-5">
                                            <p class="mb-0">
                                                <i class="fa-regular fa-envelope me-2"></i>
                                                <span>Email</span>
                                                <p class="ms-4 ps-2 text-muted">
                                                    <small class="text-muted">${res.user.email}</small>
                                                </p>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-0">
                                                <i class="fa-solid fa-city me-2"></i>
                                                <span>City</span>
                                                <p class="ms-4 ps-2 text-muted">
                                                    <small class="text-muted">${res.user.city ?? '?'}</small>
                                                </p>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-5">
                                            <p class="mb-0">
                                                <i class="fa-solid fa-phone me-2"></i>
                                                <span>Phone</span>
                                                <p class="ms-4 ps-2 text-muted">
                                                    <small class="text-muted">${res.user.phone}</small>
                                                </p>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-0">
                                                <i class="fa-solid fa-location-dot me-2"></i>
                                                <span>Address</span>
                                                <p class="ms-4 ps-2 text-muted">
                                                    <small class="text-muted">${res.user.address ?? '?'}</small>
                                                </p>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                `
                    })
                });
            });

        });
    </script>
@endpush
