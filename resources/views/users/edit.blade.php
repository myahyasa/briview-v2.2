@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('admin.users.update',[$users_edit->id]) }}" id="form-tambah-data-users" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Edit Data User</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="name" class="col-sm-2 col-form-label text-black">Nama User <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama User" value="{{ old('name') ? old('name') : $users_edit->name }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="username" class="col-sm-2 col-form-label text-black">Username <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') ? old('username') : $users_edit->username }}">
                            @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="password" class="col-sm-2 col-form-label text-black">Password <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" value="{{ old('password') ? old('password') : '' }}">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="nik" class="col-sm-2 col-form-label text-black">NIK <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="NIK" value="{{ old('nik') ? old('nik') : $users_edit->nik }}">
                            @if ($errors->has('nik'))
                            <span class="text-danger">{{ $errors->first('nik') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="unit_kerja" class="col-sm-2 col-form-label text-black">Unit Kerja <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('unit_kerja') is-invalid @enderror" name="unit_kerja" id="unit_kerja" placeholder="Unit Kerja"
                                value="{{ old('unit_kerja') ? old('unit_kerja') : $users_edit->unit_kerja }}">
                            @if ($errors->has('unit_kerja'))
                            <span class="text-danger">{{ $errors->first('unit_kerja') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="project" class="col-sm-2 col-form-label text-black">Project <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('project') is-invalid @enderror" name="project" id="project" placeholder="Project" value="{{ old('project') ? old('project') : $users_edit->project }}">
                            @if ($errors->has('project'))
                            <span class="text-danger">{{ $errors->first('project') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jabatan" class="col-sm-2 col-form-label text-black">Jabatan <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="Jabatan" value="{{ old('jabatan') ? old('jabatan') : $users_edit->jabatan }}">
                            @if ($errors->has('jabatan'))
                            <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="no_telp" class="col-sm-2 col-form-label text-black">No Telepon <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" placeholder="No Telepon" value="{{ old('no_telp') ? old('no_telp') : $users_edit->no_telp }}">
                            @if ($errors->has('no_telp'))
                            <span class="text-danger">{{ $errors->first('no_telp') }}</span>
                            @endif
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="form-group text-right mb-4">
                        <a class="btn btn-warning" href="{{ route('admin.users.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-users" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                Session::forget('success');
                @endphp
            </div>
            @endif

            <div class="widget-content widget-content-area">
                <h4 class="text-primary mb-4">Menambahkan Role ke User</h4>
                <hr class="mb-4">
                <div class="form-group row mb-4">
                    <label for="name" class="col-sm-2 col-form-label text-black">Roles saat ini <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        @if ($users_edit->roles)
                        @foreach ($users_edit->roles as $user_role)
                        <a href="{{ route('admin.users.removeRoles', [$users_edit->id, $user_role->id]) }}" onclick=" return confirm('Yakin ingin menghapus data role: {{ $user_role->name }} ??')">
                            <span class="badge badge-info" style="margin-bottom: 10px">{{ $user_role->name }}</span>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>

                <form action="{{ route('admin.users.assignRoles',[$users_edit->id]) }}" id="form-tambah-data-users" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="roles" class="col-sm-2 col-form-label text-black">Pilih Roles <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="roles" id="admin_ambilDataRoles">
                                <option value=""></option>
                            </select>
                            @if ($errors->has('roles'))
                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-right mb-4">
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-users" value="Tambahkan Roles">
                    </div>
                </form>
                <hr class="mb-4">

            </div>

        </div>
    </div>
</div>

@endsection
