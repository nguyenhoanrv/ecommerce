@extends('admin.layouts.app') @section('title', 'Subcategory | Admin')
@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection @section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Subcategory</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Category</a>
                        </li>
                        <li class="breadcrumb-item active">Subcategory</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create new subcategory</h5>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".bs-example-modal-center">
                            Create subcategory
                        </button>

                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true"
                            id="modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">New subcategory</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="form-subcategory"
                                            action="{{ URL::to('admin/subcategory/create') }}">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="subcategory-name" class="form-label">Subcategory Name</label>
                                                <input type="text"
                                                    class="form-control @error('subcategory_name') is-invalid @enderror"
                                                    name="subcategory_name" id="subcategory-name" />
                                                @error('subcategory_name')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="category-name" class="form-label">Subcategory Name</label>
                                                <select class="form-select @error('subcategory_name') is-invalid @enderror"
                                                    name="category_id" id="category-name">
                                                    <option>Select category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
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
                        <h4 class="card-title">Table Edits</h4>
                        <p class="card-title-desc">
                            Table Edits is a lightweight jQuery plugin for making
                            table rows editable.
                        </p>

                        <div class="table-responsive table-bordered">
                            <table class="table table-editable table-nowrap align-middle table-edits stable-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Subcategory Name</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($subcategories as $subcategory)
                                        <tr id="{{ $subcategory->id }}">
                                            <td hidden data-field="id">
                                                {{ $subcategory->id }}
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td data-field="subcategory_name">

                                                {{ $subcategory->subcategory_name }}
                                            </td>
                                            <td data-field="category_name">
                                                {{ $subcategory->category->category_name }}

                                            </td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a class=" btn btn-outline-secondary btn-sm" title="Delete-subcategory"
                                                        data-id="{{ $subcategory->id }}">
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
    <script src="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/sweet-alerts.init.js') }}"></script>
    <script>
        var categories = @json($categories);
        var categories_name = [];
        categories.map(e => {
            categories_name.push(e.category_name);
        })
        console.log(categories_name);
        $("*[data-field]").each(function(i, el) {
            $(el).html($(el).html().trim());
        });

        $(function() {
            var e = {};
            $(".table-edits tr").editable({
                dropdowns: {
                    category_name: categories_name
                },
                edit: function(t) {
                    $(".edit i", this)
                        .removeClass("fa-pencil-alt")
                        .addClass("fa-save")
                        .attr("title", "Save");
                },
                save: function(t) {
                    console.log(t);

                    $(".edit i", this)
                        .removeClass("fa-save")
                        .addClass("fa-pencil-alt")
                        .attr("title", "Edit"),
                        this in e && (e[this].destroy(), delete e[this]);
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "subcategory/update/" + t.id,
                        cache: "false",
                        dataType: "json",
                        data: {
                            _method: "PUT",
                            category_name: t.category_name,
                            subcategory_name: t.subcategory_name
                        },

                        success: function(res) {
                            if (res.check) toastr[res.type](res.message);
                        },
                        error: function() {
                            console.log("err");
                        }
                    });
                },
                cancel: function(t) {
                    $(".edit i", this)
                        .removeClass("fa-save")
                        .addClass("fa-pencil-alt")
                        .attr("title", "Edit"),
                        this in e && (e[this].destroy(), delete e[this]);
                },
            });
        });

    </script>
@endsection
