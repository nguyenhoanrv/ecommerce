@extends('admin.layouts.app')
@section('title', 'Edit Brand | Admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Brand</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Brand</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-6">
                        <h4 class="card-title mb-4"> Edit brand</h4>
                        <span>{{ session('message') }}</span>
                        <form method="POST" id="form-brand" action="{{ URL::to('admin/brand/update/' . $brand->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                <label for="brand-name" class="form-label">Brand Name</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                                    name="brand_name" id="brand-name" value="{{ $brand->brand_name }}" />
                                @error('brand_name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                                <label for="formFile" class="form-label">Brand Logo</label>
                                <input type="file" accept=".png, .jpg, .jpeg"
                                    class=" form-control @error('brand_logo') is-invalid @enderror" name="brand_logo"
                                    id="formFile">
                                @error('brand_logo')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <label class="form-label mt-2">Old logo</label> <br>
                                <img src="{{ asset($brand->brand_logo) }}" alt="" width="200px">
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
