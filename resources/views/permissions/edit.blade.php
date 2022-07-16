@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('admin.permissions.update',[$permissions_edit->id]) }}" id="form-tambah-data-permissions" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Edit Data Permission</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="name" class="col-sm-2 col-form-label text-black">Nama Permission <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Permission" value="{{ old('name') ? old('name') : $permissions_edit->name }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="form-group text-right mb-4">
                        <a class="btn btn-warning" href="{{ route('admin.permissions.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-permissions" value="Simpan">
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
                <h4 class="text-primary mb-4">Menambahkan Role ke Permission</h4>
                <hr class="mb-4">
                <div class="form-group row mb-4">
                    <label for="name" class="col-sm-2 col-form-label text-black">Roles saat ini <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        @if ($permissions_edit->roles)
                        @foreach ($permissions_edit->roles as $permission_role)
                        <a href="{{ route('admin.permissions.removeRoles', [$permissions_edit->id, $permission_role->id]) }}" onclick=" return confirm('Yakin ingin menghapus data role: {{ $permission_role->name }} ??')"><span
                                class="badge badge-info">{{ $permission_role->name }}</span></a>

                        @endforeach
                        @endif
                    </div>
                </div>

                <form action="{{ route('admin.permissions.assignRoles',[$permissions_edit->id]) }}" id="form-tambah-data-permissions" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="role" class="col-sm-2 col-form-label text-black">Pilih Roles <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="role" id="admin_ambilDataRoles">
                                <option value=""></option>
                            </select>
                            @if ($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-right mb-4">
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-permissions" value="Tambahkan Roles">
                    </div>
                </form>
                <hr class="mb-4">

            </div>

        </div>
    </div>

</div>

@endsection
