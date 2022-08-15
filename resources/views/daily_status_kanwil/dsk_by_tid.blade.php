@extends('layouts.app')
@section('content')

<style>
    #tiket_style {
        text-align: center;
    }

</style>

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">

                <h4 class="text-primary mb-4">Daily Status Kanwil By Tid</h4>
                <hr class="mb-4">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dsk-index" style="width:100%">
                        <thead>
                            <tr style="border-color: black">
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">Tid</th>
                                <th rowspan="2" class="text-center">Kc Supervisi</th>
                                <th rowspan="2" class="text-center">Sisa Kas CRM (dlm Milyar)</th>
                                <th colspan="6" class="text-center table-primary">In CROFLM</th>
                                <th colspan="6" class="text-center">Out CROFLM</th>
                                <th colspan="9" class="text-center table-primary">In SLM</th>
                                <th colspan="9" class="text-center">Out SLM</th>
                            </tr>
                            <tr class="">
                                {{-- IN FLM --}}
                                <th class="text-center table-primary">No Trx</th>
                                <th class="text-center table-primary">Cash Out</th>
                                <th class="text-center table-primary">Cash Full</th>
                                <th class="text-center table-primary">Dispenser Failure</th>
                                <th class="text-center table-primary">Struk Empty</th>
                                <th class="text-center table-primary">Problem Part/Offline</th>
                                {{-- OUT FLM --}}
                                <th class="text-center">No Trx</th>
                                <th class="text-center">Cash Out</th>
                                <th class="text-center">Cash Full</th>
                                <th class="text-center">Dispenser Failure</th>
                                <th class="text-center">Struk Empty</th>
                                <th class="text-center">Problem Part/Offline</th>
                                {{-- IN SLM --}}
                                <th class="text-center table-primary">Replace Part</th>
                                <th class="text-center table-primary">Network</th>
                                <th class="text-center table-primary">Host</th>
                                <th class="text-center table-primary">Electricity</th>
                                <th class="text-center table-primary">Vandalism</th>
                                <th class="text-center table-primary">Force Majeur</th>
                                <th class="text-center table-primary">Implementation</th>
                                <th class="text-center table-primary">Location</th>
                                <th class="text-center table-primary">Non Tech</th>
                                {{-- OUT SLM --}}
                                <th class="text-center">Replace Part</th>
                                <th class="text-center">Network</th>
                                <th class="text-center">Host</th>
                                <th class="text-center">Electricity</th>
                                <th class="text-center">Vandalism</th>
                                <th class="text-center">Force Majeur</th>
                                <th class="text-center">Implementation</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Non Tech</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($dskByTid as $item)
                            <tr class="text-center" style="font-weight: bold; vertical-align: middle;">
                                <td>{{$i++}}</td>
                                {{-- <td>{{$item->master_tid}}</td> --}}
                                <?php if($item->in_flm_ntx != 0 || $item->in_flm_co != 0 || $item->in_flm_cf != 0 || $item->in_flm_df != 0 || $item->in_flm_receipt != 0 || $item->in_flm_part != 0 || $item->out_flm_ntx != 0 || $item->out_flm_co != 0 || $item->out_flm_cf != 0 || $item->out_flm_df != 0 || $item->out_flm_receipt != 0 || $item->out_flm_part != 0 || $item->in_slm_replace != 0 || $item->in_slm_network != 0 || $item->in_slm_host != 0 || $item->in_slm_electrical != 0 || $item->in_slm_vandalism != 0 || $item->in_slm_force != 0 || $item->in_slm_implement != 0 || $item->in_slm_location != 0 || $item->in_slm_nontech != 0 || $item->out_slm_replace != 0 || $item->out_slm_network != 0 || $item->out_slm_host != 0 || $item->out_slm_electrical != 0 || $item->out_slm_vandalism != 0 || $item->out_slm_force != 0 || $item->out_slm_implement != 0 || $item->out_slm_location != 0 || $item->out_slm_nontech != 0) { ?>
                                <td style="color: red">{{$item->master_tid}}</td>
                                <?php } else { ?>
                                <td>{{$item->master_tid}}</td>
                                <?php } ?>


                                <td>{{$item->kc_supervisi}}</td>

                                {{-- sisa kas crm --}}
                                <td><?php echo(number_format(($item->sisa_kas_crm/1000000000),2)); ?></td>

                                {{--7 No Trx In FLM --}}
                                <?php if($item->in_flm_ntx != 0) { ?>
                                <td class="text-danger">{{$item->in_flm_ntx}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_ntx}}</td>
                                <?php } ?>

                                {{--7 Cash Out In FLM --}}
                                <?php if($item->in_flm_co != 0) { ?>
                                <td class="text-danger">{{$item->in_flm_co}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_co}}</td>
                                <?php } ?>

                                {{--8 Cash Full In FLM --}}
                                <?php if($item->in_flm_cf != 0) { ?>
                                <td class="text-danger">{{$item->in_flm_cf}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_cf}}</td>
                                <?php } ?>

                                {{--9 DF (Dispenser Failure) In FLM --}}
                                <?php if($item->in_flm_df != 0) { ?>
                                <td class="text-danger">{{$item->in_flm_df}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_df}}</td>
                                <?php } ?>

                                {{--10 Receipt Printer/struk empty In FLM --}}
                                <?php if($item->in_flm_receipt != 0) { ?>
                                <td class="text-danger">{{$item->in_flm_receipt}}</td>

                                <?php } else { ?>
                                <td>{{$item->in_flm_receipt}}</td>
                                <?php } ?>


                                {{--12 Part In FLM --}}
                                <?php if($item->in_flm_part != 0) { ?>
                                <td class="text-danger">{{$item->in_flm_part}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_part}}</td>
                                <?php } ?>

                                {{--13 No Trx Out FLM --}}
                                <?php if($item->out_flm_ntx != 0) { ?>
                                <td class="text-danger">{{$item->out_flm_ntx}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_ntx}}</td>
                                <?php } ?>

                                {{--13 Cash Out Out FLM --}}
                                <?php if($item->out_flm_co != 0) { ?>
                                <td class="text-danger">{{$item->out_flm_co}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_co}}</td>
                                <?php } ?>

                                {{--14 Cash Full Out FLM --}}
                                <?php if($item->out_flm_cf != 0) { ?>
                                <td class="text-danger">{{$item->out_flm_cf}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_cf}}</td>
                                <?php } ?>

                                {{-- 15 DF out FLM --}}
                                <?php if($item->out_flm_df != 0) { ?>
                                <td class="text-danger">{{$item->out_flm_df}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_df}}</td>
                                <?php } ?>

                                {{-- 16 Receipt Printer out FLM --}}
                                <?php if($item->out_flm_receipt != 0) { ?>
                                <td class="text-danger">{{$item->out_flm_receipt}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_receipt}}</td>
                                <?php } ?>

                                {{-- 18 Part out FLM --}}
                                <?php if($item->out_flm_part != 0) { ?>
                                <td class="text-danger">{{$item->out_flm_part}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_part}}</td>
                                <?php } ?>

                                {{--19 Check N Clean in SLM --}}


                                {{--20 Replace Part in SLM --}}
                                <?php if($item->in_slm_replace != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_replace}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_replace}}</td>
                                <?php } ?>

                                {{--21 Network in SLM --}}
                                <?php if($item->in_slm_network != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_network}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_network}}</td>
                                <?php } ?>

                                {{--22 Host in SLM --}}
                                <?php if($item->in_slm_host != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_host}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_host}}</td>
                                <?php } ?>

                                {{--23 Electrical in SLM --}}
                                <?php if($item->in_slm_electrical != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_electrical}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_electrical}}</td>
                                <?php } ?>

                                {{--24 Vandalism in SLM --}}
                                <?php if($item->in_slm_vandalism != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_vandalism}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_vandalism}}</td>
                                <?php } ?>

                                {{--24 force in SLM --}}
                                <?php if($item->in_slm_force != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_force}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_force}}</td>
                                <?php } ?>

                                {{--25 Implement in SLM --}}
                                <?php if($item->in_slm_implement != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_implement}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_implement}}</td>
                                <?php } ?>

                                {{--26 Location in SLM  --}}
                                <?php if($item->in_slm_location != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_location}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_location}}</td>
                                <?php } ?>

                                {{--27 Non tech in SLM --}}
                                <?php if($item->in_slm_nontech != 0) { ?>
                                <td class="text-danger">{{$item->in_slm_nontech}}</td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_nontech}}</td>
                                <?php } ?>

                                {{--28 Check N Clean out SLM  --}}


                                {{--29 Replace Part out SLM --}}
                                <?php if($item->out_slm_replace != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_replace}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_replace}}</td>
                                <?php } ?>

                                {{--30 Network out SLM --}}
                                <?php if($item->out_slm_network != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_network}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_network}}</td>
                                <?php } ?>

                                {{--31 Host out SLM --}}
                                <?php if($item->out_slm_host != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_host}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_host}}</td>
                                <?php } ?>

                                {{--32 Electrical out SLM --}}
                                <?php if($item->out_slm_electrical != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_electrical}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_electrical}}</td>
                                <?php } ?>

                                {{--33 Vandalism out SLM --}}
                                <?php if($item->out_slm_vandalism != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_vandalism}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_vandalism}}</td>
                                <?php } ?>


                                {{--33 force out SLM --}}
                                <?php if($item->out_slm_force != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_force}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_force}}</td>
                                <?php } ?>

                                {{--34 Implement out SLM --}}
                                <?php if($item->out_slm_implement != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_implement}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_implement}}</td>
                                <?php } ?>

                                {{--35 Location out SLM --}}
                                <?php if($item->out_slm_location != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_location}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_location}}</td>
                                <?php } ?>

                                {{--36 Non Tech out SLM --}}
                                <?php if($item->out_slm_nontech != 0) { ?>
                                <td class="text-danger">{{$item->out_slm_nontech}}</td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_nontech}}</td>
                                <?php } ?>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
