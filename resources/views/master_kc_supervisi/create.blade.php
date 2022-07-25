@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterKcSupervisi.post') }}" id="form-tambah-data-master-kc-supervisi" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Master Kc Supervisi</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="branchcode_kc_supervisi" class="col-sm-2 col-form-label text-black">Branchcode Kc Supervisi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('branchcode_kc_supervisi') is-invalid @enderror" name="branchcode_kc_supervisi" id="branchcode_kc_supervisi" maxlength="4"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="kode kc supervisi, contoh 0146" value="{{ old('branchcode_kc_supervisi') }}">
                            @if ($errors->has('branchcode_kc_supervisi'))
                            <span class="text-danger">{{ $errors->first('branchcode_kc_supervisi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="kc_supervisi" class="col-sm-2 col-form-label text-black">Kc Supervisi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('kc_supervisi') is-invalid @enderror" name="kc_supervisi" id="kc_supervisi" placeholder="nama kc supervisi, contoh: surabaya"
                                value="{{ old('kc_supervisi') }}">
                            @if ($errors->has('kc_supervisi'))
                            <span class="text-danger">{{ $errors->first('kc_supervisi') }}</span>
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
                        <a class="btn btn-warning" href="{{ route('masterKcSupervisi.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-kc-supervisi" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
