@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('users.post') }}" id="form-tambah-data-users" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Users</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="name" class="col-sm-2 col-form-label text-black">Nama <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('name') is-invalid @enderror" name="name" id="name_users" placeholder="Nama User" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="email" class="col-sm-2 col-form-label text-black">Email <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control input1 @error('email') is-invalid @enderror" name="email" id="email_users" placeholder="Email User" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="password" class="col-sm-2 col-form-label text-black">Password <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control input1 @error('password') is-invalid @enderror" name="password" id="password_users" placeholder="Password User">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="role_id" class="col-sm-2 col-form-label text-black">Roles <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('role_id') is-invalid @enderror" name="role_id" id="role_id_users" placeholder="Roles">
                            @if ($errors->has('role_id'))
                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <a class="btn btn-warning" href="{{ route('users.index') }}">Batal</a>
                            <input class="btn btn-success" type="submit" id="submit-tambah-data-users" value="Simpan">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
