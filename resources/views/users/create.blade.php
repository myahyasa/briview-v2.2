@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('admin.users.post') }}" id="form-tambah-data-users" method="POST">
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
                        <label for="username" class="col-sm-2 col-form-label text-black">Username <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
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
                        <label for="nik" class="col-sm-2 col-form-label text-black">NIK <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="nik" value="{{ old('nik') }}">
                            @if ($errors->has('nik'))
                            <span class="text-danger">{{ $errors->first('nik') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="unit_kerja" class="col-sm-2 col-form-label text-black">Unit Kerja <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('unit_kerja') is-invalid @enderror" name="unit_kerja" id="unit_kerja" placeholder="unit kerja" value="{{ old('unit_kerja') }}">
                            @if ($errors->has('unit_kerja'))
                            <span class="text-danger">{{ $errors->first('unit_kerja') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="project" class="col-sm-2 col-form-label text-black">Project <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('project') is-invalid @enderror" name="project" id="project" placeholder="project" value="{{ old('project') }}">
                            @if ($errors->has('project'))
                            <span class="text-danger">{{ $errors->first('project') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jabatan" class="col-sm-2 col-form-label text-black">Jabatan <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="jabatan" value="{{ old('jabatan') }}">
                            @if ($errors->has('jabatan'))
                            <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="no_telp" class="col-sm-2 col-form-label text-black">No Telepon <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" placeholder="no telepon" value="{{ old('no_telp') }}">
                            @if ($errors->has('no_telp'))
                            <span class="text-danger">{{ $errors->first('no_telp') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="form-group row mb-4">
                        <label for="role_id" class="col-sm-2 col-form-label text-black">Roles <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('role_id') is-invalid @enderror" name="role_id" id="role_id_users" placeholder="Roles">
                            @if ($errors->has('role_id'))
                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                    @endif
                </div>
        </div> --}}
        <hr class="mb-4">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a class="btn btn-warning" href="{{ route('admin.users.index') }}">Batal</a>
                <input class="btn btn-success" type="submit" id="submit-tambah-data-users" value="Simpan">
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>

@endsection
