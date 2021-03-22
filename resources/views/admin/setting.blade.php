@extends('admin.layouts.app')
@section('title', 'Setting | Admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Setting</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-6">
                        <h4 class="card-title mb-4">Change Password</h4>
                        <span>{{ session('message') }}</span>
                        <form method="POST" action="{{ route('admin.update.password') }}">
                            @csrf
                            <div class="row mb-4">
                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Old
                                    Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="horizontal-password-input" name="password">

                                        <button class="btn btn-light " type="button" id="password-addon">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </button>

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-npassword-input" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('npassword') is-invalid @enderror"
                                            id="horizontal-npassword-input" name="npassword">
                                        @error('npassword')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-rppassword-input" class="col-sm-3 col-form-label">Comfirm New
                                    Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('npassword') is-invalid @enderror"
                                            id="horizontal-rppassword-input" name="npassword_confirmation">
                                        @error('npassword')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
