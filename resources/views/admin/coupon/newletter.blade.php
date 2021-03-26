@extends('admin.layouts.app') @section('title', 'Newletter | Admin')
@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Newletter</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Coupon</a>
                        </li>
                        <li class="breadcrumb-item active">Newletter</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List newletter</h4>
                        <p class="card-title-desc">
                            Table Edits is a lightweight jQuery plugin for making
                            table rows editable.
                        </p>
                        <div class="table-responsive table-bordered">
                            <table class="table table-editable table-nowrap align-middle table-edits stable-hover">
                                <thead class="table-light">
                                    <tr data-url="newletter">
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newletters as $newletter)
                                        <tr id="{{ $newletter->id }}">
                                            <td hidden data-field="id">{{ $newletter->id }}</td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td data-field="newletter_name">{{ $newletter->email }}</td>
                                            <td>
                                                <form method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a class=" btn btn-outline-secondary btn-sm" title="Delete-newletter"
                                                        data-id="{{ $newletter->id }}">
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
    <script src="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/sweet-alerts.init.js') }}"></script>
@endsection
