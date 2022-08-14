@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterKodePos.update',[$masterKodePos_edit->id]) }}" id="form-tambah-data-master-kode-pos" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Master Kode Pos</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="kode_pos" class="col-sm-2 col-form-label text-black">Kode Pos <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('kode_pos') is-invalid @enderror" name="kode_pos" id="kode_pos" maxlength="5"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Kode pos"
                                value="{{ old('kode_pos') ? old('kode_pos') : $masterKodePos_edit->kode_pos }}">
                            @if ($errors->has('kode_pos'))
                            <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="provinsi" class="col-sm-2 col-form-label text-black">Provinsi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi_master_lokasi" placeholder="Provinsi"
                                value="{{ old('provinsi') ? old('provinsi') : $masterKodePos_edit->provinsi }}">
                            @if ($errors->has('provinsi'))
                            <span class="text-danger">{{ $errors->first('provinsi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="kota" class="col-sm-2 col-form-label text-black">Kota <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('kota') is-invalid @enderror" name="kota" id="kota" placeholder="Kota" value="{{ old('kota') ? old('kota') : $masterKodePos_edit->kota }}">
                            @if ($errors->has('kota'))
                            <span class="text-danger">{{ $errors->first('kota') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="kecamatan" class="col-sm-2 col-form-label text-black">Kecamatan <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" placeholder="Kecamatan"
                                value="{{ old('kecamatan') ? old('kecamatan') : $masterKodePos_edit->kecamatan }}">
                            @if ($errors->has('kecamatan'))
                            <span class="text-danger">{{ $errors->first('kecamatan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="remarks" class="col-sm-2 col-form-label text-black">Remarks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('remarks') is-invalid @enderror" name="remarks" id="remarks" placeholder="Remarks" value="{{old('remarks') ? old('remarks') : $masterKodePos_edit->remarks}}">
                            @if ($errors->has('remarks'))
                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
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
                        <a class="btn btn-warning" href="{{ route('masterKodePos.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-kode-pos" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
