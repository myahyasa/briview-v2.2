@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterLokasiCrm.post') }}" id="form-tambah-data-master-lokasi-crm" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Tambah Data Master Lokasi Crm</h4>
                    <hr class="mb-4">

                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                        <span style="font-size: 15px; padding: 0 10px;">
                            Detail Lokasi Uker
                        </span>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label for="kanwil" class="col-sm-2 col-form-label text-black">Kanwil <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('kanwil') is-invalid @enderror" name="kanwil" id="masterLokasiCrm_ambilDataKanwil">
                                <option value="{{ old('kanwil') ? old('kanwil') : '' }}">{{ explode('|', old('kanwil'))[1] ?? '--kanwil--' }}</option>
                            </select>
                            @if ($errors->has('kanwil'))
                            <span class="text-danger">{{ $errors->first('kanwil') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kc_supervisi" class="col-sm-2 col-form-label text-black">Kc Supervisi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('kc_supervisi') is-invalid @enderror" name="kc_supervisi" id="masterLokasiCrm_ambilDataKcSupervisi">
                                <option value="{{ old('kc_supervisi') ? old('kc_supervisi') : '' }}">{{ explode('|', old('kc_supervisi'))[1] ?? '--kc supervisi--' }}</option>
                            </select>
                            @if ($errors->has('kc_supervisi'))
                            <span class="text-danger">{{ $errors->first('kc_supervisi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="uker" class="col-sm-2 col-form-label text-black">Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('uker') is-invalid @enderror" name="uker" id="masterLokasiCrm_ambilDataUker">
                                <option value="{{ old('uker') ? old('uker') : '' }}">{{ explode('|', old('uker'))[1] ?? '--uker--' }}</option>
                            </select>
                            @if ($errors->has('uker'))
                            <span class="text-danger">{{ $errors->first('uker') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="alamat" class="col-sm-2 col-form-label text-black">Alamat <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control input1 @error('alamat') is-invalid @enderror" rows="3" name="alamat" id="alamat" placeholder="alamat unit kerja" value="{{ old('alamat') }}"></textarea>
                            @if ($errors->has('alamat'))
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="longitude" class="col-sm-2 col-form-label text-black">Longitude Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('longitude') is-invalid @enderror" name="longitude" id="longitude" placeholder="Longitude unit kerja" value="{{ old('longitude') }}">
                            @if ($errors->has('longitude'))
                            <span class="text-danger">{{ $errors->first('longitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="latitude" class="col-sm-2 col-form-label text-black">Latitude Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('latitude') is-invalid @enderror" name="latitude" id="latitude" placeholder="Latitude unit kerja" value="{{ old('latitude') }}">
                            @if ($errors->has('latitude'))
                            <span class="text-danger">{{ $errors->first('latitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode_pos" class="col-sm-2 col-form-label text-black">Kode Pos <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('kode_pos') is-invalid @enderror" name="kode_pos" id="masterLokasiCrm_ambilDataKodePos">
                                <option value="{{ old('kode_pos') ? old('kode_pos') : '' }}">{{ explode('|', old('kode_pos'))[1] ?? '--kode pos--' }}</option>
                            </select>
                            @if ($errors->has('kode_pos'))
                            <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="location_category" class="col-sm-2 col-form-label text-black">Location Category <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('location_category') is-invalid @enderror" name="location_category" id="masterLokasiCrm_ambilDataCategory">
                                <option selected disabled value="">--location category--</option>
                                <option value="ALFAMART" {{old('location_category') == 'ALFAMART' ?  'selected' : ''}}>ALFAMART</option>
                                <option value="ALFAMIDI" {{old('location_category') == 'ALFAMIDI' ?  'selected' : ''}}>ALFAMIDI</option>
                                <option value="APARTEMEN" {{old('location_category') == 'APARTEMEN' ?  'selected' : ''}}>APARTEMEN</option>
                                <option value="APOTEK" {{old('location_category') == 'APOTEK' ?  'selected' : ''}}>APOTEK</option>
                                <option value="BANDARA" {{old('location_category') == 'BANDARA' ?  'selected' : ''}}>BANDARA</option>
                                <option value="BIKE THRU" {{old('location_category') == 'BIKE THRU' ?  'selected' : ''}}>BIKE THRU</option>
                                <option value="BRI AGRO" {{old('location_category') == 'BRI AGRO' ?  'selected' : ''}}>BRI AGRO</option>
                                <option value="BRI SYARIAH" {{old('location_category') == 'BRI SYARIAH' ?  'selected' : ''}}>BRI SYARIAH</option>
                                <option value="CORPU" {{old('location_category') == 'CORPU' ?  'selected' : ''}}>CORPU</option>
                                <option value="DRIVE THRU" {{old('location_category') == 'DRIVE THRU' ?  'selected' : ''}}>DRIVE THRU</option>
                                <option value="FEE BASED" {{old('location_category') == 'FEE BASED' ?  'selected' : ''}}>FEE BASED</option>
                                <option value="GTI" {{old('location_category') == 'GTI' ?  'selected' : ''}}>GTI</option>
                                <option value="HOTEL" {{old('location_category') == 'HOTEL' ?  'selected' : ''}}>HOTEL</option>
                                <option value="INDOMARET" {{old('location_category') == 'INDOMARET' ?  'selected' : ''}}>INDOMARET</option>
                                <option value="INSTANSI BUMN/BUMD" {{old('location_category') == 'INSTANSI BUMN/BUMD' ?  'selected' : ''}}>INSTANSI BUMN/BUMD</option>
                                <option value="INSTANSI MILITER" {{old('location_category') == 'INSTANSI MILITER' ?  'selected' : ''}}>INSTANSI MILITER</option>
                                <option value="INSTANSI PEMERINTAHAN" {{old('location_category') == 'INSTANSI PEMERINTAHAN' ?  'selected' : ''}}>INSTANSI PEMERINTAHAN</option>
                                <option value="KANINS" {{old('location_category') == 'KANINS' ?  'selected' : ''}}>KANINS</option>
                                <option value="KANTOR PUSAT" {{old('location_category') == 'KANTOR PUSAT' ?  'selected' : ''}}>KANTOR PUSAT</option>
                                <option value="KANWIL" {{old('location_category') == 'KANWIL' ?  'selected' : ''}}>KANWIL</option>
                                <option value="KC" {{old('location_category') == 'KC' ?  'selected' : ''}}>KC</option>
                                <option value="KCP" {{old('location_category') == 'KCP' ?  'selected' : ''}}>KCP</option>
                                <option value="KEPOLISIAN" {{old('location_category') == 'KEPOLISIAN' ?  'selected' : ''}}>KEPOLISIAN</option>
                                <option value="KK" {{old('location_category') == 'KK' ?  'selected' : ''}}>KK</option>
                                <option value="KLINIK" {{old('location_category') == 'KLINIK' ?  'selected' : ''}}>KLINIK</option>
                                <option value="MALL" {{old('location_category') == 'MALL' ?  'selected' : ''}}>MALL</option>
                                <option value="MINIMARKET" {{old('location_category') == 'MINIMARKET' ?  'selected' : ''}}>MINIMARKET</option>
                                <option value="PANGKALAN MILITER" {{old('location_category') == 'PANGKALAN MILITER' ?  'selected' : ''}}>PANGKALAN MILITER</option>
                                <option value="PASAR" {{old('location_category') == 'PASAR' ?  'selected' : ''}}>PASAR</option>
                                <option value="PELABUHAN" {{old('location_category') == 'PELABUHAN' ?  'selected' : ''}}>PELABUHAN</option>
                                <option value="PERKANTORAN" {{old('location_category') == 'PERKANTORAN' ?  'selected' : ''}}>PERKANTORAN</option>
                                <option value="PERTAMBANGAN" {{old('location_category') == 'PERTAMBANGAN' ?  'selected' : ''}}>PERTAMBANGAN</option>
                                <option value="PERTOKOAN" {{old('location_category') == 'PERTOKOAN' ?  'selected' : ''}}>PERTOKOAN</option>
                                <option value="PERUMAHAN" {{old('location_category') == 'PERUMAHAN' ?  'selected' : ''}}>PERUMAHAN</option>
                                <option value="PLAZA" {{old('location_category') == 'PLAZA' ?  'selected' : ''}}>PLAZA</option>
                                <option value="RUMAH MAKAN" {{old('location_category') == 'RUMAH MAKAN' ?  'selected' : ''}}>RUMAH MAKAN</option>
                                <option value="RUMAH SAKIT" {{old('location_category') == 'RUMAH SAKIT' ?  'selected' : ''}}>RUMAH SAKIT</option>
                                <option value="SPBU" {{old('location_category') == 'SPBU' ?  'selected' : ''}}>SPBU</option>
                                <option value="STASIUN" {{old('location_category') == 'STASIUN' ?  'selected' : ''}}>STASIUN</option>
                                <option value="SUPERMARKET" {{old('location_category') == 'SUPERMARKET' ?  'selected' : ''}}>SUPERMARKET</option>
                                <option value="SWALAYAN" {{old('location_category') == 'SWALAYAN' ?  'selected' : ''}}>SWALAYAN</option>
                                <option value="TEMPAT HIBURAN" {{old('location_category') == 'TEMPAT HIBURAN' ?  'selected' : ''}}>TEMPAT HIBURAN</option>
                                <option value="TEMPAT IBADAH" {{old('location_category') == 'TEMPAT IBADAH' ?  'selected' : ''}}>TEMPAT IBADAH</option>
                                <option value="TEMPAT OLAHRAGA" {{old('location_category') == 'TEMPAT OLAHRAGA' ?  'selected' : ''}}>TEMPAT OLAHRAGA</option>
                                <option value="TEMPAT PENDIDIKAN" {{old('location_category') == 'TEMPAT PENDIDIKAN' ?  'selected' : ''}}>TEMPAT PENDIDIKAN</option>
                                <option value="TEMPAT WISATA" {{old('location_category') == 'TEMPAT WISATA' ?  'selected' : ''}}>TEMPAT WISATA</option>
                                <option value="TERAS BRI" {{old('location_category') == 'TERAS BRI' ?  'selected' : ''}}>TERAS BRI</option>
                                <option value="TERAS KAPAL" {{old('location_category') == 'TERAS KAPAL' ?  'selected' : ''}}>TERAS KAPAL</option>
                                <option value="TERMINAL" {{old('location_category') == 'TERMINAL' ?  'selected' : ''}}>TERMINAL</option>
                                <option value="UNIT BRI" {{old('location_category') == 'UNIT BRI' ?  'selected' : ''}}>UNIT BRI</option>

                            </select>
                            @if ($errors->has('location_category'))
                            <span class="text-danger">{{ $errors->first('location_category') }}</span>
                            @endif
                        </div>
                    </div>

                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                        <span style="font-size: 15px; padding: 0 10px;">
                            Detail Lokasi Mesin
                        </span>
                    </div>
                    <br>

                    <div class="form-group row mb-4">
                        <label for="status_kepemilikan" class="col-sm-2 col-form-label text-black">Status Kepemilikan <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('status_kepemilikan') is-invalid @enderror" name="status_kepemilikan" id="masterLokasiCrm_ambilDataStatusKepemilikan">
                                <option selected disabled value="">--status kepemilikan--</option>
                                <option value="Sewa" {{old('status_kepemilikan') == 'Sewa' ?  'selected' : ''}}>Sewa</option>
                                <option value="Milik Sendiri" {{old('status_kepemilikan') == 'Milik Sendiri' ?  'selected' : ''}}>Milik Sendiri</option>
                            </select>
                            @if ($errors->has('status_kepemilikan'))
                            <span class="text-danger">{{ $errors->first('status_kepemilikan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="location_category_group" class="col-sm-2 col-form-label text-black">Location Category Group <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('location_category_group') is-invalid @enderror" name="location_category_group" id="location_category_group"
                                placeholder="Location Category Group, contoh: UNIT KERJA" value="{{ old('location_category_group') }}">
                            @if ($errors->has('location_category_group'))
                            <span class="text-danger">{{ $errors->first('location_category_group') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_location_group" class="col-sm-2 col-form-label text-black">Detail Location Group <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('detail_location_group') is-invalid @enderror" name="detail_location_group" id="masterLokasiCrm_ambilDataDetailLocationGroup">
                                <option selected disabled value="">--detail location group--</option>
                                <option value="Branding" {{old('detail_location_group') == 'Branding' ?  'selected' : ''}}>Branding</option>
                                <option value="Kerjasama" {{old('detail_location_group') == 'Kerjasama' ?  'selected' : ''}}>Kerjasama</option>
                                <option value="Fee Based Income" {{old('detail_location_group') == 'Fee Based Income' ?  'selected' : ''}}>Fee Based Income</option>
                            </select>
                            @if ($errors->has('detail_location_group'))
                            <span class="text-danger">{{ $errors->first('detail_location_group') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_lokasi" class="col-sm-2 col-form-label text-black">Detail Lokasi Mesin <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('detail_lokasi_mesin') is-invalid @enderror" name="detail_lokasi" id="detail_lokasi" placeholder="Detail lokasi, merupakan lokasi mesin"
                                value="{{ old('detail_lokasi') }}">
                            @if ($errors->has('detail_lokasi'))
                            <span class="text-danger">{{ $errors->first('detail_lokasi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jenis_detail_lokasi" class="col-sm-2 col-form-label text-black">Jenis Lokasi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('jenis_detail_lokasi') is-invalid @enderror" name="jenis_detail_lokasi" id="masterLokasiCrm_ambilDataJenisDetailLokasi">
                                <option selected disabled value="">--jenis lokasi--</option>
                                <option value="Onsite" {{old('jenis_detail_lokasi') == 'Onsite' ?  'selected' : ''}}>Onsite</option>
                                <option value="Offsite" {{old('jenis_detail_lokasi') == 'Offsite' ?  'selected' : ''}}>Offsite</option>
                            </select>
                            @if ($errors->has('jenis_detail_lokasi'))
                            <span class="text-danger">{{ $errors->first('jenis_detail_lokasi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_lokasi_longitude" class="col-sm-2 col-form-label text-black">Longitude Lokasi Mesin <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('detail_lokasi_longitude') is-invalid @enderror" name="detail_lokasi_longitude" id="detail_lokasi_longitude" placeholder="Longitude lokasi mesin"
                                value="{{ old('detail_lokasi_longitude') }}">
                            @if ($errors->has('detail_lokasi_longitude'))
                            <span class="text-danger">{{ $errors->first('detail_lokasi_longitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_lokasi_latitude" class="col-sm-2 col-form-label text-black">Latitude Lokasi Mesin <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1 @error('detail_lokasi_latitude') is-invalid @enderror" name="detail_lokasi_latitude" id="detail_lokasi_latitude" placeholder="latitude lokasi mesin"
                                value="{{ old('detail_lokasi_latitude') }}">
                            @if ($errors->has('detail_lokasi_latitude'))
                            <span class="text-danger">{{ $errors->first('detail_lokasi_latitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jam_operasional" class="col-sm-2 col-form-label text-black">Jam Operasional <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input1 @error('jam_operasional') is-invalid @enderror" name="jam_operasional" id="masterLokasiCrm_ambilDataJamOperasional">
                                <option selected disabled value="">--jam operasional--</option>
                                <option value="00:00 - 23:59" {{old('jam_operasional') == '00:00 - 23:59' ?  'selected' : ''}}>00:00 - 23:59</option>
                                <option value="06:00 - 15:00" {{old('jam_operasional') == '06:00 - 15:00' ?  'selected' : ''}}>06:00 - 15:00</option>
                                <option value="06:00 - 18:00" {{old('jam_operasional') == '06:00 - 18:00' ?  'selected' : ''}}>06:00 - 18:00</option>
                                <option value="06:00 - 21:00" {{old('jam_operasional') == '06:00 - 21:00' ?  'selected' : ''}}>06:00 - 21:00</option>
                                <option value="09:00 - 15:00" {{old('jam_operasional') == '09:00 - 15:00' ?  'selected' : ''}}>09:00 - 15:00</option>
                                <option value="09:00 - 18:00" {{old('jam_operasional') == '09:00 - 18:00' ?  'selected' : ''}}>09:00 - 18:00</option>
                                <option value="09:00 - 21:00" {{old('jam_operasional') == '09:00 - 21:00' ?  'selected' : ''}}>09:00 - 21:00</option>

                            </select>
                            @if ($errors->has('jam_operasional'))
                            <span class="text-danger">{{ $errors->first('jam_operasional') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="namepic_nohp" class="col-sm-2 col-form-label text-black">Nama PIC & No. HP <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('namepic_nohp') is-invalid @enderror" name="namepic_nohp" id="namepic_nohp" placeholder="nama pic berserta nomor handphone" value="{{ old('namepic_nohp') }}">
                            @if ($errors->has('namepic_nohp'))
                            <span class="text-danger">{{ $errors->first('namepic_nohp') }}</span>
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
                        <a class="btn btn-warning" href="{{ route('masterLokasiCrm.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-lokasi-crm" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
