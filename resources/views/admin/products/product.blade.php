@extends('admin.layouts.app') @section('title', 'Product | Admin')
@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create new product</h5>
                    <div>
                        <a href="{{ URL::to('/admin/product/create') }}" class="btn btn-primary waves-effect waves-light">
                            Create product
                        </a>
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
                        <h4 class="card-title">List product</h4>
                        <p class="card-title-desc">
                            Table Edits is a lightweight jQuery plugin for making
                            table rows editable.
                        </p>
                        <div class="table-responsive table-bordered">
                            <table class="table table-editable table-nowrap align-middle table-edits stable-hover">
                                <thead class="table-light">
                                    <tr data-url="product">
                                        <th>ID</th>
                                        <th>product Name</th>
                                        <th>Discount</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr id="{{ $product->id }}">
                                            <td hidden data-field="id">{{ $product->id }}</td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td data-field="product_name">{{ $product->product_name }}</td>
                                            <td data-field="discount">{{ $product->discount }}</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a class=" btn btn-outline-secondary btn-sm" title="Delete-product"
                                                        data-id="{{ $product->id }}">
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
