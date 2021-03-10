@extends('admin.layouts.app') @section('title', 'Category | Admin')
@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Category</a>
                        </li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create new category</h5>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".bs-example-modal-center">
                            Create Category
                        </button>

                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true"
                            id="modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">New category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="form-category"
                                            action="{{ URL::to('admin/category/create') }}">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="category-name" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" name="category_name"
                                                    id="category-name" />
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
                        <h4 class="card-title">Table Edits</h4>
                        <p class="card-title-desc">
                            Table Edits is a lightweight jQuery plugin for making
                            table rows editable.
                        </p>

                        <div class="table-responsive table-bordered">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr id="{{ $category->id }}">
                                            <td hidden data-field="id">{{ $category->id }}</td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td data-field="category_name">{{ $category->category_name }}</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST"">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <a class=" btn btn-outline-secondary btn-sm"
                                                    title="Delete" data-id="{{ $category->id }}">
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
    @endsection @section('script')
    <script src="{{ URL::asset('backend/libs/table-edits/build/table-edits.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/table-editable.int.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/sweet-alerts.init.js') }}"></script>
    <script>
        // $('#form-category').on("submit", function(e) {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: "POST",
        //         url: "category/create",
        //         cache: "false",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "category_name": e.target[1].value
        //         },
        //         success: function(res) {
        //             $("#modal").modal('hide');
        //             e.target[1].value = ""
        //         },
        //         error: function() {
        //             console.log("eerr");
        //         }
        //     });


        // });

    </script>
@endsection
