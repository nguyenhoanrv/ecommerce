@extends('admin.layouts.app') @section('title', 'Coupon | Admin')
@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Coupon</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Coupon</a>
                        </li>
                        <li class="breadcrumb-item active">Coupon</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create new coupon</h5>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".bs-example-modal-center">
                            Create coupon
                        </button>

                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true"
                            id="modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">New coupon</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="form-coupon"
                                            action="{{ URL::to('admin/coupon/create') }}">
                                            @csrf
                                            <div class="mb-2">
                                                <label for="coupon-name" class="form-label">Coupon Name</label>
                                                <input type="text"
                                                    class="form-control @error('coupon_name') is-invalid @enderror"
                                                    name="coupon_name" id="coupon-name" />
                                                @error('coupon_name')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="coupon-discount" class="form-label">Discount</label>
                                                <input type="number"
                                                    class="form-control @error('discount') is-invalid @enderror"
                                                    name="discount" id="coupon-discount" min="0" max="100" />
                                                @error('discount')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Create
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List coupon</h4>
                        <p class="card-title-desc">
                            Table Edits is a lightweight jQuery plugin for making
                            table rows editable.
                        </p>
                        <div class="table-responsive table-bordered">
                            <table class="table table-editable table-nowrap align-middle table-edits stable-hover">
                                <thead class="table-light">
                                    <tr data-url="coupon">
                                        <th>ID</th>
                                        <th>Coupon Name</th>
                                        <th>Discount</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                        <tr id="{{ $coupon->id }}">
                                            <td hidden data-field="id">{{ $coupon->id }}</td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td data-field="coupon_name">{{ $coupon->coupon_name }}</td>
                                            <td data-field="discount">{{ $coupon->discount }}</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a class=" btn btn-outline-secondary btn-sm" title="Delete-coupon"
                                                        data-id="{{ $coupon->id }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend/libs/table-edits/build/table-edits.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/table-editable.int.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/sweet-alerts.init.js') }}"></script>
@endsection
