@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterUker.update',[$masterUker_edit->id]) }}" id="form-tambah-data-master-uker" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Master Uker</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="branchcode_uker" class="col-sm-2 col-form-label text-black">Branchcode Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('branchcode_uker') is-invalid @enderror" name="branchcode_uker" id="branchcode_uker" maxlength="4"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="kode uker, contoh 0046"
                                value="{{ old('branchcode_uker') ? old('branchcode_uker') : $masterUker_edit->branchcode_uker }}">
                            @if ($errors->has('branchcode_uker'))
                            <span class="text-danger">{{ $errors->first('branchcode_uker') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="uker" class="col-sm-2 col-form-label text-black">Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('uker') is-invalid @enderror" name="uker" id="uker" placeholder="nama uker, contoh: majalengka"
                                value="{{ old('uker') ? old('uker') : $masterUker_edit->uker }}">
                            @if ($errors->has('uker'))
                            <span class="text-danger">{{ $errors->first('uker') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jenis_uker" class="col-sm-2 col-form-label text-black">Jenis Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('jenis_uker') is-invalid @enderror" name="jenis_uker" id="jenis_uker" placeholder="jenis uker, contoh: KANCA"
                                value="{{ old('jenis_uker') ? old('jenis_uker') : $masterUker_edit->jenis_uker }}">
                            @if ($errors->has('jenis_uker'))
                            <span class="text-danger">{{ $errors->first('jenis_uker') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="remarks" class="col-sm-2 col-form-label text-black">Remarks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('remarks') is-invalid @enderror" name="remarks" id="remarks" placeholder="Remarks" value="{{old('remarks') ? old('remarks') : $masterUker_edit->remarks}}">
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
                        <a class="btn btn-warning" href="{{ route('masterUker.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-uker" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
