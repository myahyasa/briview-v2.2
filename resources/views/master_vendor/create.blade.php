@extends('layouts.app')
@section('content')
<?php 
// $max_id = $max_id[0]->max_id;
$max_id = $max_id_vendor->max_id;
$vendor_id = (int) substr($max_id, 3, 3);
$vendor_id++;

$huruf = "V";
$kode_vendor_id = $huruf . sprintf("%04s", $vendor_id);
?>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterVendor.post') }}" id="form-tambah-data-master-vendor" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Vendor</h4>
                    <hr class="mb-4">
                    <div class="form-group row mb-4">
                        <label for="vendor_id" class="col-sm-2 col-form-label text-black">Vendor Id <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('vendor_id') is-invalid @enderror" name="vendor_id" id="vendor_id" placeholder="Nama Vendor" value="<?php echo $kode_vendor_id ?>" readonly>
                            @if ($errors->has('vendor_id'))
                            <span class="text-danger">{{ $errors->first('vendor_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="vendor_name" class="col-sm-2 col-form-label text-black">Nama Vendor <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('vendor_name') is-invalid @enderror" name="vendor_name" id="vendor_name" placeholder="Nama Vendor" value="{{ old('vendor_name') }}">
                            @if ($errors->has('vendor_name'))
                            <span class="text-danger">{{ $errors->first('vendor_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="service" class="col-sm-2 col-form-label text-black">Service <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('service') is-invalid @enderror" name="service" id="service" placeholder="Nama Vendor" value="{{ old('service') }}">
                            @if ($errors->has('service'))
                            <span class="text-danger">{{ $errors->first('service') }}</span>
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
                        <a class="btn btn-warning" href="{{ route('masterVendor.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-vendor" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
