@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterKanwil.update',[$masterKanwil_edit->id]) }}" id="form-tambah-data-master-kanwil" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Master Kanwil</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="branchcode_kanwil" class="col-sm-2 col-form-label text-black">Branchcode Kanwil <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('branchcode_kanwil') is-invalid @enderror" name="branchcode_kanwil" id="branchcode_kanwil" maxlength="4"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="kode kanwil, contoh 1234"
                                value="{{ old('branchcode_kanwil') ? old('branchcode_kanwil') : $masterKanwil_edit->branchcode_kanwil }}">
                            @if ($errors->has('branchcode_kanwil'))
                            <span class="text-danger">{{ $errors->first('branchcode_kanwil') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="kanwil" class="col-sm-2 col-form-label text-black">Kanwil <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('kanwil') is-invalid @enderror" name="kanwil" id="kanwil" placeholder="nama kanwil, contoh: denpasar"
                                value="{{ old('kanwil') ? old('kanwil') : $masterKanwil_edit->kanwil }}">
                            @if ($errors->has('kanwil'))
                            <span class="text-danger">{{ $errors->first('kanwil') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="remarks" class="col-sm-2 col-form-label text-black">Remarks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('remarks') is-invalid @enderror" name="remarks" id="remarks" placeholder="Remarks" value="{{old('remarks') ? old('remarks') : $masterKanwil_edit->remarks}}">
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
                        <a class="btn btn-warning" href="{{ route('masterKanwil.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-kanwil" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
