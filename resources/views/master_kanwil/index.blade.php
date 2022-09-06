@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">

                <h4 class="text-primary mb-4">Data Master Kanwil</h4>
                <hr class="mb-4">

                <div class="row mb-4">
                    <div class="col mb-3">
                        <button type="button" class="btn btn-primary mt-2 mr-2"><a href="{{ route('masterKanwil.create') }}" style="color: white">Tambah Data Master Kanwil</a></button>
                        <button type="button" class="btn btn-primary mt-2 mr-2" data-toggle="modal" data-target="#masterKanwil-import">
                            Import
                        </button>
                        <button type="button" class="btn btn-primary mt-2 mr-2">Export</button>
                    </div>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                    Session::forget('success');
                    @endphp
                </div>
                @endif

                @if(Session::has('warning'))
                <div class="alert alert-warning">
                    {{ Session::get('warning') }}
                    @php
                    Session::forget('warning');
                    @endphp
                </div>
                @endif

                <table class="table table-striped mb-4" id="masterKanwil-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Branchcode Kanwil</th>
                            <th>Kanwil</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="masterKanwil-import" tabindex="-1" role="dialog" aria-labelledby="Import Data" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Import Data">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form action="" method="get" id="">
                @csrf
                <div class="modal-body">
                    <label class="custom-file-container__custom-file">
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
