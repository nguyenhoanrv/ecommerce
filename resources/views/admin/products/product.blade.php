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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table head</h4>
                    <p class="card-title-desc">Use one of two modifier classes to make <code>&lt;thead&gt;</code>s appear
                        light or dark gray.</p>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Details</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Hide/Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr id="{{ $product->id }}">
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>{{ $product->brand->brand_name }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        <td>{!! $product->product_details !!}</td>
                                        <td style="color: green">{{ $product->product_color }}</td>
                                        <td style="color: red">{{ $product->product_size }}</td>
                                        <td>${{ $product->selling_price }}</td>

                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm"
                                                href="{{ URL::to('/admin/product/edit/' . $product->id) }}">
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
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm" data-title="delete-button"
                                                style="font-size: 13px" data-status="{{ $product->status }}"
                                                data-id="{{ $product->id }}"> <i class=" bx @if ($product->status) bx-show @else bx-hide @endif"></i>
                                            </a>
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
@endsection
@section('script')
    <script src="{{ URL::asset('backend/libs/table-edits/build/table-edits.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/table-editable.int.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/sweet-alerts.init.js') }}"></script>
    <script type="text/javascript">
        $("[data-title=delete-button]").click(function(e) {
            e.preventDefault();
            let status = $(this).attr('data-status');
            const id = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                url: '/admin/product/status',
                type: "post",
                dataType: "JSON",
                data: {
                    status: status,
                    id: id
                },
                success: (res) => {
                    toastr[res.type](res.message);
                    if (status == 1) {
                        $(this).children().removeClass('bx-show');
                        $(this).children().addClass('bx-hide');
                        $(this).attr('data-status', 0)
                    } else {
                        $(this).children().removeClass('bx-hide');
                        $(this).children().addClass('bx-show');
                        $(this).attr('data-status', 1)
                    }
                },
                error: function(xhr) {
                    toastr['error']('Error change!');
                }
            });
        });

    </script>
@endsection
