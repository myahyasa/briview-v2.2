@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('admin.permissions.update',[$permissions_edit->id]) }}" id="form-tambah-data-permissions" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Edit Data Permissions</h4>
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
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <a class="btn btn-warning" href="{{ route('admin.permissions.index') }}">Batal</a>
                            <input class="btn btn-success" type="submit" id="submit-tambah-data-permissions" value="Simpan">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
