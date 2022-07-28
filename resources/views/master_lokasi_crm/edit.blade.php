@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <form action="{{ route('masterLokasiCrm.update',[$masterLokasiCrm_edit->master_lokasi_crm_id]) }}" id="form-tambah-data-master-lokasi-crm" method="POST">
                @csrf
                <div class="widget-content widget-content-area">
                    <h4 class="text-primary mb-4">Edit Data Master Lokasi Crm</h4>
                    <hr class="mb-4">

                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                        <span style="font-size: 15px; padding: 0 10px;">
                            Detail Lokasi Uker
                        </span>
                    </div>
                    <br>

                    <div class="form-group row mb-4">
                        <label for="kanwil" class="col-sm-2 col-form-label text-black">Kanwil <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="kanwil" id="masterLokasiCrm_ambilDataKanwil">
                                <option value="{{ old('kanwil') ? old('kanwil') : $masterLokasiCrm_edit->kanwil }}">{{ explode('|', old('kanwil'))[1] ?? $masterLokasiCrm_edit->kanwil }}
                                </option>
                            </select>
                            @if ($errors->has('kanwil'))
                            <span class="text-danger">{{ $errors->first('kanwil') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="kc_supervisi" class="col-sm-2 col-form-label text-black">KC Supervisi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="kc_supervisi" id="masterLokasiCrm_ambilDataKcSupervisi">
                                <option value="{{ old('kc_supervisi') ? old('kc_supervisi') : $masterLokasiCrm_edit->kc_supervisi }}">
                                    {{ explode('|', old('kc_supervisi'))[1] ?? $masterLokasiCrm_edit->kc_supervisi }}
                                </option>
                            </select>
                            @if ($errors->has('kc_supervisi'))
                            <span class="text-danger">{{ $errors->first('kc_supervisi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="uker" class="col-sm-2 col-form-label text-black">Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="uker" id="masterLokasiCrm_ambilDataUker">
                                <option value="{{ old('uker') ? old('uker') : $masterLokasiCrm_edit->uker }}">{{ explode('|', old('uker'))[1] ?? $masterLokasiCrm_edit->uker }}</option>
                            </select>
                            @if ($errors->has('uker'))
                            <span class="text-danger">{{ $errors->first('uker') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="alamat" class="col-sm-2 col-form-label text-black">Alamat <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control input1" id="alamat" name="alamat" id="alamat" rows="3" placeholder="alamat unit kerja">{{old('alamat') ? old('alamat') : $masterLokasiCrm_edit->alamat}}</textarea>
                            @if ($errors->has('alamat'))
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="longitude" class="col-sm-2 col-form-label text-black">Longitude Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1" name="longitude" id="longitude" placeholder="Longitude unit kerja" value="{{ old('longitude') ? old('longitude') : $masterLokasiCrm_edit->longitude }}">
                            @if ($errors->has('longitude'))
                            <span class="text-danger">{{ $errors->first('longitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="latitude" class="col-sm-2 col-form-label text-black">Latitude Uker <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1" name="latitude" id="latitude" placeholder="Latitude unit kerja" value="{{ old('latitude') ? old('latitude') : $masterLokasiCrm_edit->latitude }}">
                            @if ($errors->has('latitude'))
                            <span class="text-danger">{{ $errors->first('latitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="kode_pos" class="col-sm-2 col-form-label text-black">Kode Pos <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="kode_pos" id="masterLokasiCrm_ambilDataKodePos">
                                <option value="{{ old('kode_pos') ? old('kode_pos') : $masterLokasiCrm_edit->kode_pos }}">{{ old('kode_pos') ? old('kode_pos') : $masterLokasiCrm_edit->kode_pos }}</option>
                            </select>
                            @if ($errors->has('kode_pos'))
                            <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="location_category" class="col-sm-2 col-form-label text-black">Location Category <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="location_category" id="masterLokasiCrm_ambilDataCategory">
                                <option selected disabled value="">--Pilih Location Category--</option>
                                <option value="ALFAMART" {{$masterLokasiCrm_edit->location_category =='ALFAMART' ? 'selected' : ''}}>ALFAMART</option>
                                <option value="ALFAMIDI" {{$masterLokasiCrm_edit->location_category =='ALFAMIDI' ? 'selected' : ''}}>ALFAMIDI</option>
                                <option value="APARTEMEN" {{$masterLokasiCrm_edit->location_category =='APARTEMEN' ? 'selected' : ''}}>APARTEMEN</option>
                                <option value="APOTEK" {{$masterLokasiCrm_edit->location_category =='APOTEK' ? 'selected' : ''}}>APOTEK</option>
                                <option value="BANDARA" {{$masterLokasiCrm_edit->location_category =='BANDARA' ? 'selected' : ''}}>BANDARA</option>
                                <option value="BIKE THRU" {{$masterLokasiCrm_edit->location_category =='BIKE THRU' ? 'selected' : ''}}>BIKE THRU</option>
                                <option value="BRI AGRO" {{$masterLokasiCrm_edit->location_category =='BRI AGRO' ? 'selected' : ''}}>BRI AGRO</option>
                                <option value="BRI SYARIAH" {{$masterLokasiCrm_edit->location_category =='BRI SYARIAH' ? 'selected' : ''}}>BRI SYARIAH</option>
                                <option value="CORPU" {{$masterLokasiCrm_edit->location_category =='CORPU' ? 'selected' : ''}}>CORPU</option>
                                <option value="DRIVE THRU" {{$masterLokasiCrm_edit->location_category =='DRIVE THRU' ? 'selected' : ''}}>DRIVE THRU</option>
                                <option value="FEE BASED" {{$masterLokasiCrm_edit->location_category =='FEE BASED' ? 'selected' : ''}}>FEE BASED</option>
                                <option value="GTI" {{$masterLokasiCrm_edit->location_category =='GTI' ? 'selected' : ''}}>GTI</option>
                                <option value="HOTEL" {{$masterLokasiCrm_edit->location_category =='HOTEL' ? 'selected' : ''}}>HOTEL</option>
                                <option value="INDOMARET" {{$masterLokasiCrm_edit->location_category =='INDOMARET' ? 'selected' : ''}}>INDOMARET</option>
                                <option value="INSTANSI BUMN/BUMD" {{$masterLokasiCrm_edit->location_category =='INSTANSI BUMN/BUMD' ? 'selected' : ''}}>INSTANSI BUMN/BUMD</option>
                                <option value="INSTANSI MILITER" {{$masterLokasiCrm_edit->location_category =='INSTANSI MILITER' ? 'selected' : ''}}>INSTANSI MILITER</option>
                                <option value="INSTANSI PEMERINTAHAN" {{$masterLokasiCrm_edit->location_category =='INSTANSI PEMERINTAHAN' ? 'selected' : ''}}>INSTANSI PEMERINTAHAN</option>
                                <option value="KANINS" {{$masterLokasiCrm_edit->location_category =='KANINS' ? 'selected' : ''}}>KANINS</option>
                                <option value="KANTOR PUSAT" {{$masterLokasiCrm_edit->location_category =='KANTOR PUSAT' ? 'selected' : ''}}>KANTOR PUSAT</option>
                                <option value="KANWIL" {{$masterLokasiCrm_edit->location_category =='KANWIL' ? 'selected' : ''}}>KANWIL</option>
                                <option value="KC" {{$masterLokasiCrm_edit->location_category =='KC' ? 'selected' : ''}}>KC</option>
                                <option value="KCP" {{$masterLokasiCrm_edit->location_category =='KCP' ? 'selected' : ''}}>KCP</option>
                                <option value="KEPOLISIAN" {{$masterLokasiCrm_edit->location_category =='KEPOLISIAN' ? 'selected' : ''}}>KEPOLISIAN</option>
                                <option value="KK" {{$masterLokasiCrm_edit->location_category =='KK' ? 'selected' : ''}}>KK</option>
                                <option value="KLINIK" {{$masterLokasiCrm_edit->location_category =='KLINIK' ? 'selected' : ''}}>KLINIK</option>
                                <option value="MALL" {{$masterLokasiCrm_edit->location_category =='MALL' ? 'selected' : ''}}>MALL</option>
                                <option value="MINIMARKET" {{$masterLokasiCrm_edit->location_category =='MINIMARKET' ? 'selected' : ''}}>MINIMARKET</option>
                                <option value="PANGKALAN MILITER" {{$masterLokasiCrm_edit->location_category =='PANGKALAN MILITER' ? 'selected' : ''}}>PANGKALAN MILITER</option>
                                <option value="PASAR" {{$masterLokasiCrm_edit->location_category =='PASAR' ? 'selected' : ''}}>PASAR</option>
                                <option value="PELABUHAN" {{$masterLokasiCrm_edit->location_category =='PELABUHAN' ? 'selected' : ''}}>PELABUHAN</option>
                                <option value="PERKANTORAN" {{$masterLokasiCrm_edit->location_category =='PERKANTORAN' ? 'selected' : ''}}>PERKANTORAN</option>
                                <option value="PERTAMBANGAN" {{$masterLokasiCrm_edit->location_category =='PERTAMBANGAN' ? 'selected' : ''}}>PERTAMBANGAN</option>
                                <option value="PERTOKOAN" {{$masterLokasiCrm_edit->location_category =='PERTOKOAN' ? 'selected' : ''}}>PERTOKOAN</option>
                                <option value="PERUMAHAN" {{$masterLokasiCrm_edit->location_category =='PERUMAHAN' ? 'selected' : ''}}>PERUMAHAN</option>
                                <option value="PLAZA" {{$masterLokasiCrm_edit->location_category =='PLAZA' ? 'selected' : ''}}>PLAZA</option>
                                <option value="RUMAH MAKAN" {{$masterLokasiCrm_edit->location_category =='RUMAH MAKAN' ? 'selected' : ''}}>RUMAH MAKAN</option>
                                <option value="RUMAH SAKIT" {{$masterLokasiCrm_edit->location_category =='RUMAH SAKIT' ? 'selected' : ''}}>RUMAH SAKIT</option>
                                <option value="SPBU" {{$masterLokasiCrm_edit->location_category =='SPBU' ? 'selected' : ''}}>SPBU</option>
                                <option value="STASIUN" {{$masterLokasiCrm_edit->location_category =='STASIUN' ? 'selected' : ''}}>STASIUN</option>
                                <option value="SUPERMARKET" {{$masterLokasiCrm_edit->location_category =='SUPERMARKET' ? 'selected' : ''}}>SUPERMARKET</option>
                                <option value="SWALAYAN" {{$masterLokasiCrm_edit->location_category =='SWALAYAN' ? 'selected' : ''}}>SWALAYAN</option>
                                <option value="TEMPAT HIBURAN" {{$masterLokasiCrm_edit->location_category =='TEMPAT HIBURAN' ? 'selected' : ''}}>TEMPAT HIBURAN</option>
                                <option value="TEMPAT IBADAH" {{$masterLokasiCrm_edit->location_category =='TEMPAT IBADAH' ? 'selected' : ''}}>TEMPAT IBADAH</option>
                                <option value="TEMPAT OLAHRAGA" {{$masterLokasiCrm_edit->location_category =='TEMPAT OLAHRAGA' ? 'selected' : ''}}>TEMPAT OLAHRAGA</option>
                                <option value="TEMPAT PENDIDIKAN" {{$masterLokasiCrm_edit->location_category =='TEMPAT PENDIDIKAN' ? 'selected' : ''}}>TEMPAT PENDIDIKAN</option>
                                <option value="TEMPAT WISATA" {{$masterLokasiCrm_edit->location_category =='TEMPAT WISATA' ? 'selected' : ''}}>TEMPAT WISATA</option>
                                <option value="TERAS BRI" {{$masterLokasiCrm_edit->location_category =='TERAS BRI' ? 'selected' : ''}}>TERAS BRI</option>
                                <option value="TERAS KAPAL" {{$masterLokasiCrm_edit->location_category =='TERAS KAPAL' ? 'selected' : ''}}>TERAS KAPAL</option>
                                <option value="TERMINAL" {{$masterLokasiCrm_edit->location_category =='TERMINAL' ? 'selected' : ''}}>TERMINAL</option>
                                <option value="UNIT BRI" {{$masterLokasiCrm_edit->location_category =='UNIT BRI' ? 'selected' : ''}}>UNIT BRI</option>
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
                            <select class="form-control font-weight-bold" name="status_kepemilikan" id="masterLokasiCrm_ambilDataStatusKepemilikan">
                                <option selected disabled value="">--status kepemilikan--</option>
                                <option value="Sewa" {{$masterLokasiCrm_edit->status_kepemilikan =='Sewa' ? 'selected' : ''}}>Sewa</option>
                                <option value="Milik Sendiri" {{$masterLokasiCrm_edit->status_kepemilikan =='Milik Sendiri' ? 'selected' : ''}}>Milik Sendiri</option>
                            </select>
                            @if ($errors->has('status_kepemilikan'))
                            <span class="text-danger">{{ $errors->first('status_kepemilikan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="location_category_group" class="col-sm-2 col-form-label text-black">Location Category Group <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1" name="location_category_group" id="location_category_group" placeholder="Location Category Group, contoh: UNIT KERJA"
                                value="{{ old('location_category_group') ? old('location_category_group') : $masterLokasiCrm_edit->location_category_group }}">
                            @if ($errors->has('location_category_group'))
                            <span class="text-danger">{{ $errors->first('location_category_group') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_location_group" class="col-sm-2 col-form-label text-black">Detail Location Group <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="detail_location_group" id="masterLokasiCrm_ambilDataDetailLocationGroup">
                                <option selected disabled value="">--detail location group--</option>
                                <option value="Branding" {{$masterLokasiCrm_edit->detail_location_group =='Branding' ? 'selected' : ''}}>Branding</option>
                                <option value="Kerjasama" {{$masterLokasiCrm_edit->detail_location_group =='Kerjasama' ? 'selected' : ''}}>Kerjasama</option>
                                <option value="Fee Based Income" {{$masterLokasiCrm_edit->detail_location_group =='Fee Based Income' ? 'selected' : ''}}>Fee Based Income</option>
                            </select>
                            @if ($errors->has('detail_location_group'))
                            <span class="text-danger">{{ $errors->first('detail_location_group') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_lokasi" class="col-sm-2 col-form-label text-black">Detail Lokasi Mesin <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1" name="detail_lokasi" id="detail_lokasi" placeholder="Detail lokasi, merupakan lokasi mesin"
                                value="{{ old('detail_lokasi') ? old('detail_lokasi') : $masterLokasiCrm_edit->detail_lokasi }}">
                            @if ($errors->has('detail_lokasi'))
                            <span class="text-danger">{{ $errors->first('detail_lokasi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jenis_detail_lokasi" class="col-sm-2 col-form-label text-black">Jenis Lokasi <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="jenis_detail_lokasi" id="masterLokasiCrm_ambilDataJenisDetailLokasi">
                                <option selected disabled value="">--jenis lokasi--</option>
                                <option value="Onsite" {{$masterLokasiCrm_edit->jenis_detail_lokasi =='Onsite' ? 'selected' : ''}}>Onsite</option>
                                <option value="Offsite" {{$masterLokasiCrm_edit->jenis_detail_lokasi =='Offsite' ? 'selected' : ''}}>Offsite</option>
                            </select>
                            @if ($errors->has('jenis_detail_lokasi'))
                            <span class="text-danger">{{ $errors->first('jenis_detail_lokasi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_lokasi_longitude" class="col-sm-2 col-form-label text-black">Longitude Lokasi Mesin <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1" name="detail_lokasi_longitude" id="detail_lokasi_longitude" placeholder="Longitude lokasi mesin"
                                value="{{ old('detail_lokasi_longitude') ? old('detail_lokasi_longitude') : $masterLokasiCrm_edit->detail_lokasi_longitude }}">
                            @if ($errors->has('detail_lokasi_longitude'))
                            <span class="text-danger">{{ $errors->first('detail_lokasi_longitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="detail_lokasi_latitude" class="col-sm-2 col-form-label text-black">Latitude Lokasi Mesin <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control input1" name="detail_lokasi_latitude" id="detail_lokasi_latitude" placeholder="latitude lokasi mesin"
                                value="{{ old('detail_lokasi_latitude') ? old('detail_lokasi_latitude') : $masterLokasiCrm_edit->detail_lokasi_latitude }}">
                            @if ($errors->has('detail_lokasi_latitude'))
                            <span class="text-danger">{{ $errors->first('detail_lokasi_latitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="jam_operasional" class="col-sm-2 col-form-label text-black">Jam Operasional <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control font-weight-bold" name="jam_operasional" id="masterLokasiCrm_ambilDataJamOperasional">
                                <option selected disabled value="">--jam operasional--</option>
                                <option value="00:00 - 23:59" {{$masterLokasiCrm_edit->jam_operasional =='00:00 - 23:59' ? 'selected' : ''}}>00:00 - 23:59</option>
                                <option value="06:00 - 15:00" {{$masterLokasiCrm_edit->jam_operasional =='06:00 - 15:00' ? 'selected' : ''}}>06:00 - 15:00</option>
                                <option value="06:00 - 18:00" {{$masterLokasiCrm_edit->jam_operasional =='06:00 - 18:00' ? 'selected' : ''}}>06:00 - 18:00</option>
                                <option value="06:00 - 21:00" {{$masterLokasiCrm_edit->jam_operasional =='06:00 - 21:00' ? 'selected' : ''}}>06:00 - 21:00</option>
                                <option value="09:00 - 15:00" {{$masterLokasiCrm_edit->jam_operasional =='09:00 - 15:00' ? 'selected' : ''}}>09:00 - 15:00</option>
                                <option value="09:00 - 18:00" {{$masterLokasiCrm_edit->jam_operasional =='09:00 - 18:00' ? 'selected' : ''}}>09:00 - 18:00</option>
                                <option value="09:00 - 21:00" {{$masterLokasiCrm_edit->jam_operasional =='09:00 - 21:00' ? 'selected' : ''}}>09:00 - 21:00</option>

                            </select>
                            @if ($errors->has('jam_operasional'))
                            <span class="text-danger">{{ $errors->first('jam_operasional') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="namepic_nohp" class="col-sm-2 col-form-label text-black">Nama PIC & No. HP <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1" name="namepic_nohp" id="namepic_nohp" placeholder="nama pic berserta nomor handphone"
                                value="{{ old('namepic_nohp') ? old('namepic_nohp') : $masterLokasiCrm_edit->namepic_nohp }}">
                            @if ($errors->has('namepic_nohp'))
                            <span class="text-danger">{{ $errors->first('namepic_nohp') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="remarks" class="col-sm-2 col-form-label text-black">Remarks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input1 @error('remarks') is-invalid @enderror" name="remarks" id="remarks" placeholder="Remarks"
                                value="{{old('remarks') ? old('remarks') : $masterLokasiCrm_edit->remarks}}">
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
                        <a class="btn btn-warning" href="{{ route('masterLokasiCrm.index') }}">Batal</a>
                        <input class="btn btn-success" type="submit" id="submit-tambah-data-master-lokasi-crm" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
