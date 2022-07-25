@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('admin.roles.update',[$roles_edit->id]) }}" id="form-tambah-data-roles" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Edit Data Role</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="name" class="col-sm-2 col-form-label text-black">Nama Role <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Permission" value="{{ old('name') ? old('name') : $roles_edit->name }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="form-group text-right mb-4">
                        <a class="btn btn-warning" href="{{ route('admin.roles.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-roles" value="Simpan">
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
                <h4 class="text-primary mb-4">Menambahkan Permission ke Role</h4>
                <hr class="mb-4">
                <div class="form-group row mb-4">
                    <label for="name" class="col-sm-2 col-form-label text-black">Permissions saat ini <span style="color: red;">*</span></label>
                    <div id="role-permissions-tag" class="col-sm-10">
                        @if ($roles_edit->permissions)
                        @foreach ($roles_edit->Permissions as $role_permission)
                        <a href="{{ route('admin.roles.revokePermission', [$roles_edit->id, $role_permission->id]) }}" onclick=" return confirm('Yakin ingin menghapus data permission: {{ $role_permission->name }} ??')"><span
                                class="badge badge-info" style="margin-bottom: 10px">{{ $role_permission->name }}</span></a>

                        @endforeach
                        @endif
                    </div>
                </div>

                <form action="{{ route('admin.roles.assignPermissions',[$roles_edit->id]) }}" id="form-tambah-data-permission-role" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="permissions" class="col-sm-2 col-form-label text-black">Pilih Permissions <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="permissions" id="admin_ambilDataPermissions">
                                <option value=""></option>
                            </select>
                            @if ($errors->has('permissions'))
                            <span class="text-danger">{{ $errors->first('permissions') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-right mb-4">
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-permission-role" value="Tambahkan Permissions">
                    </div>
                </form>
                <hr class="mb-4">

            </div>

        </div>
    </div>
</div>

@endsection
