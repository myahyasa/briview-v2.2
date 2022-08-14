@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">

                <h4 class="text-primary mb-4">Detail Tiket</h4>
                <hr class="mb-4">

                {{-- problem --}}
                <p id="problem_hasBeenMapping" hidden>{{ $problem }}</p>

                <div class="table-responsive">
                    <table class="table table-striped mb-4" id="detail-dsk-index-table">
                        <thead>
                            <tr>
                                <th>Tid<span style="color: white;">space|space|space</span></th>
                                <th>Kanwil<span style="color: white;">space|space|space</span></th>
                                <th>Kanca<span style="color: white;">space|space|space</span></th>
                                <th>Uker Pengelola<span style="color: white;">space|space|space</span></th>
                                <th>Status<span style="color: white;">space|space|space</span></th>
                                <th>Problem<span style="color: white;">space|space|space</span></th>
                                <th>Atm Status<span style="color: white;">space|space|space</span></th>
                                <th>No Tiket<span style="color: white;">space|space|space</span></th>
                                <th>Open Tiket<span style="color: white;">space|space|space</span></th>
                                <th>Downtime Aging<span style="color: white;">space|space|space</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailTiketIndex as $item)
                            <tr>
                                <td>{{ $item->master_tid }}</td>
                                <td>{{ $item->kanwil }}</td>
                                <td>{{ $item->kc_supervisi }}</td>
                                <td>{{ $item->uker }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->problem_hasBeenMapping }}</td>
                                <td>{{ $item->atm_status }}</td>
                                <td>{{ $item->so }}</td>
                                <td>{{ $item->opendate }}</td>
                                <td>{{ $item->aging }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tid</th>
                                <th>Kanwil</th>
                                <th>Kanca</th>
                                <th>Uker Pengelola</th>
                                <th>Status</th>
                                <th>Problem</th>
                                <th>Atm Status</th>
                                <th>No Tiket</th>
                                <th>Open Tiket</th>
                                <th>Downtime Aging</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
