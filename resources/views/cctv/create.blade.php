@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('cctv.post') }}" id="form-tambah-data-cctv" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Cctv</h4>
                    <hr class="mb-4">
                    <div class="form-group row">
                        <label for="vendor_name" class="col-sm-2 col-form-label text-black">Nama Vendor <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="vendor_name" id="cctv_ambilDataVendor">
                                <option value="{{ old('vendor_name') ? old('vendor_name') : '' }}">{{ explode('|', old('vendor_name'))[1] ?? '--nama vendor--' }}</option>
                            </select>
                            @if ($errors->has('vendor_name'))
                            <span class="text-danger">{{ $errors->first('vendor_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="brand" class="col-sm-2 col-form-label text-black">Brand <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('brand') is-invalid @enderror" name="brand" id="brand" placeholder="nama brand, contoh: UNV" value="{{ old('brand') }}">
                            @if ($errors->has('brand'))
                            <span class="text-danger">{{ $errors->first('brand') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="sn_cctv" class="col-sm-2 col-form-label text-black">Sn Cctv <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('sn_cctv') is-invalid @enderror" name="sn_cctv" id="sn_cctv" placeholder="serial number cctv, contoh: 210235TQV23217002278" value="{{ old('sn_cctv') }}">
                            @if ($errors->has('sn_cctv'))
                            <span class="text-danger">{{ $errors->first('sn_cctv') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="type" class="col-sm-2 col-form-label text-black">Type <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('type') is-invalid @enderror" name="type" id="type" placeholder="tipe, contoh: UNV IP Camera Fixed Dome Infra Red 2MP IPC399SB-28PI-CMX"
                                value="{{ old('type') }}">
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="no_spk" class="col-sm-2 col-form-label text-black">No Spk <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('no_spk') is-invalid @enderror" name="no_spk" id="no_spk" placeholder="no spk, contoh: B.1310.P-PLO/IGP/PTT/07/2021" value="{{ old('no_spk') }}">
                            @if ($errors->has('no_spk'))
                            <span class="text-danger">{{ $errors->first('no_spk') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="project_name" class="col-sm-2 col-form-label text-black">Project Name <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('project_name') is-invalid @enderror" name="project_name" id="project_name" placeholder="nama projek, contoh: CRM MS 1325" value="{{ old('project_name') }}">
                            @if ($errors->has('project_name'))
                            <span class="text-danger">{{ $errors->first('project_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="year" class="col-sm-2 col-form-label text-black">Tahun <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('year') is-invalid @enderror" name="year" id="year" maxlength="4"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="tahun, contoh: 2022" value="{{ old('year') }}">
                            @if ($errors->has('year'))
                            <span class="text-danger">{{ $errors->first('year') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="effective_date" class="col-sm-2 col-form-label text-black">Effective Date <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('effective_date') is-invalid @enderror" name="effective_date" id="effective_date" placeholder="effective date" value="<?php echo date('Y-m-d'); ?>" readonly>
                            @if ($errors->has('effective_date'))
                            <span class="text-danger">{{ $errors->first('effective_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="form-group text-right mb-4">
                        <a class="btn btn-warning" href="{{ route('cctv.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-cctv" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
