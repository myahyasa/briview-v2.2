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

                <h4 class="text-primary mb-4">Daily Status Kanwil</h4>
                <hr class="mb-4">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dsk-index" style="width:100%">
                        <thead>
                            <tr style="border-color: black">
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">Regional Office</th>
                                <th rowspan="2" class="text-center">CRM Total</th>
                                <th rowspan="2" class="text-center">Up Tunai</th>
                                <th colspan="3" class="text-center table-primary">Performance</th>
                                <th rowspan="2" class="text-center">Sisa Kas CRM (dlm Milyar)</th>
                                <th colspan="6" class="text-center table-primary">In CROFLM</th>
                                <th colspan="6" class="text-center">Out CROFLM</th>
                                <th colspan="9" class="text-center table-primary">In SLM</th>
                                <th colspan="9" class="text-center">Out SLM</th>
                            </tr>
                            <tr class="">
                                {{-- Performance --}}
                                <th class="text-center table-primary">Target</th>
                                <th class="text-center table-primary">Reliability</th>
                                <th class="text-center table-primary">Pencapaian</th>
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
                            @foreach ($master_dskIndex_data as $item)
                            <tr class="text-center" style="font-weight: bold; vertical-align: middle;">
                                <td>{{$i++}}</td>
                                <td><a class="text-primary" id="kanwil" href="{{url('/admin/DailyStatusKanwil/daily_ticket_by_kc/'.$item->kode_kanwil)}}" target="_blank" rel="noopener noreferrer">{{$item->kanwil}}</a></td>
                                <td>{{$item->machines}}</td>
                                <td>{{ $item->up_tunai }}</td>
                                <td style="background-color: #7FFF00"><?php $this_performance = (number_format($item->target_performance,2).'%'); echo($this_performance);  ?></td>

                                {{-- reliability & pencapaian --}}
                                <?php $this_reliability = (number_format(($item->reliability*100),2).'%');

                                if($this_reliability <= 90) { ?>
                                <td style="background-color: #FF3131"><?php $this_reliability = (number_format(($item->reliability*100),2).'%'); echo($this_reliability); ?></td>
                                <td style="background-color: #FF3131">
                                    <?php 
                                    $pencapaian = @(($this_reliability / $this_performance)*100);
                                    echo (number_format($pencapaian,2)).'%';
                                    ?>
                                </td>

                                <?php } elseif($this_reliability <= 95 ) { ?>
                                <td style="background-color: 	#FFFF00"><?php $this_reliability = (number_format(($item->reliability*100),2).'%'); echo($this_reliability); ?></td>
                                <td style="background-color: 	#FFFF00">
                                    <?php 
                                    $pencapaian = @(($this_reliability / $this_performance)*100);
                                    echo (number_format($pencapaian,2)).'%';
                                    ?>
                                </td>

                                <?php } elseif($this_reliability <= 95.50 ) { ?>
                                <td style="background-color: 	#90EE90"><?php $this_reliability = (number_format(($item->reliability*100),2).'%'); echo($this_reliability); ?></td>
                                <td style="background-color: 	#90EE90">
                                    <?php 
                                    $pencapaian = @(($this_reliability / $this_performance)*100);
                                    echo (number_format($pencapaian,2)).'%';
                                    ?>
                                </td>

                                <?php } elseif($this_reliability <= 100 ) { ?>
                                <td style="background-color: 	#7FFF00"><?php $this_reliability = (number_format(($item->reliability*100),2).'%'); echo($this_reliability); ?></td>

                                <td style="background-color: 	#7FFF00">
                                    <?php 
                                    $pencapaian = @(($this_reliability / $this_performance)*100);
                                    echo (number_format($pencapaian,2)).'%';
                                    ?>
                                </td>
                                <?php } ?>

                                {{-- sisa kas crm --}}
                                <td><?php echo(number_format(($item->sisa_kas_crm/1000000000),2)); ?></td>

                                {{--7 No Trx In FLM --}}
                                <?php if($item->in_flm_ntx != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_flm_ntx')}}" target="_blank">{{$item->in_flm_ntx}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_ntx}}</td>
                                <?php } ?>

                                {{--7 Cash Out In FLM --}}
                                <?php if($item->in_flm_co != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_flm_co')}}" target="_blank">{{$item->in_flm_co}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_co}}</td>
                                <?php } ?>

                                {{--8 Cash Full In FLM --}}
                                <?php if($item->in_flm_cf != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_flm_cf')}}" target="_blank">{{$item->in_flm_cf}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_cf}}</td>
                                <?php } ?>

                                {{--9 DF (Dispenser Failure) In FLM --}}
                                <?php if($item->in_flm_df != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_flm_df')}}" target="_blank">{{$item->in_flm_df}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_df}}</td>
                                <?php } ?>

                                {{--10 Receipt Printer/struk empty In FLM --}}
                                <?php if($item->in_flm_receipt != 0) { ?>
                                <td>
                                    <a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_flm_receipt')}}" target="_blank">{{$item->in_flm_receipt}}</a>
                                </td>

                                <?php } else { ?>
                                <td>{{$item->in_flm_receipt}}</td>
                                <?php } ?>


                                {{--12 Part In FLM --}}
                                <?php if($item->in_flm_part != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_flm_part')}}" target="_blank">{{$item->in_flm_part}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_flm_part}}</td>
                                <?php } ?>

                                {{--13 No Trx Out FLM --}}
                                <?php if($item->out_flm_ntx != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_flm_ntx')}}" target="_blank">{{$item->out_flm_ntx}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_ntx}}</td>
                                <?php } ?>

                                {{--13 Cash Out Out FLM --}}
                                <?php if($item->out_flm_co != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_flm_co')}}" target="_blank">{{$item->out_flm_co}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_co}}</td>
                                <?php } ?>

                                {{--14 Cash Full Out FLM --}}
                                <?php if($item->out_flm_cf != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_flm_cf')}}" target="_blank">{{$item->out_flm_cf}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_cf}}</td>
                                <?php } ?>

                                {{-- 15 DF out FLM --}}
                                <?php if($item->out_flm_df != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_flm_df')}}" target="_blank">{{$item->out_flm_df}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_df}}</td>
                                <?php } ?>

                                {{-- 16 Receipt Printer out FLM --}}
                                <?php if($item->out_flm_receipt != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_flm_receipt')}}" target="_blank">{{$item->out_flm_receipt}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_receipt}}</td>
                                <?php } ?>

                                {{-- 18 Part out FLM --}}
                                <?php if($item->out_flm_part != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_flm_part')}}" target="_blank">{{$item->out_flm_part}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_flm_part}}</td>
                                <?php } ?>

                                {{--19 Check N Clean in SLM --}}


                                {{--20 Replace Part in SLM --}}
                                <?php if($item->in_slm_replace != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_replace')}}" target="_blank">{{$item->in_slm_replace}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_replace}}</td>
                                <?php } ?>

                                {{--21 Network in SLM --}}
                                <?php if($item->in_slm_network != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_network')}}" target="_blank">{{$item->in_slm_network}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_network}}</td>
                                <?php } ?>

                                {{--22 Host in SLM --}}
                                <?php if($item->in_slm_host != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_host')}}" target="_blank">{{$item->in_slm_host}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_host}}</td>
                                <?php } ?>

                                {{--23 Electrical in SLM --}}
                                <?php if($item->in_slm_electrical != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_electrical')}}" target="_blank">{{$item->in_slm_electrical}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_electrical}}</td>
                                <?php } ?>

                                {{--24 Vandalism in SLM --}}
                                <?php if($item->in_slm_vandalism != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_vandalism')}}" target="_blank">{{$item->in_slm_vandalism}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_vandalism}}</td>
                                <?php } ?>

                                {{--24 force in SLM --}}
                                <?php if($item->in_slm_force != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_force')}}" target="_blank">{{$item->in_slm_force}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_force}}</td>
                                <?php } ?>

                                {{--25 Implement in SLM --}}
                                <?php if($item->in_slm_implement != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_implement')}}" target="_blank">{{$item->in_slm_implement}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_implement}}</td>
                                <?php } ?>

                                {{--26 Location in SLM  --}}
                                <?php if($item->in_slm_location != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_location')}}" target="_blank">{{$item->in_slm_location}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_location}}</td>
                                <?php } ?>

                                {{--27 Non tech in SLM --}}
                                <?php if($item->in_slm_nontech != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/in_slm_nontech')}}" target="_blank">{{$item->in_slm_nontech}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->in_slm_nontech}}</td>
                                <?php } ?>

                                {{--28 Check N Clean out SLM  --}}


                                {{--29 Replace Part out SLM --}}
                                <?php if($item->out_slm_replace != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_replace')}}" target="_blank">{{$item->out_slm_replace}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_replace}}</td>
                                <?php } ?>

                                {{--30 Network out SLM --}}
                                <?php if($item->out_slm_network != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_network')}}" target="_blank">{{$item->out_slm_network}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_network}}</td>
                                <?php } ?>

                                {{--31 Host out SLM --}}
                                <?php if($item->out_slm_host != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_host')}}" target="_blank">{{$item->out_slm_host}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_host}}</td>
                                <?php } ?>

                                {{--32 Electrical out SLM --}}
                                <?php if($item->out_slm_electrical != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_electrical')}}" target="_blank">{{$item->out_slm_electrical}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_electrical}}</td>
                                <?php } ?>

                                {{--33 Vandalism out SLM --}}
                                <?php if($item->out_slm_vandalism != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_vandalism')}}" target="_blank">{{$item->out_slm_vandalism}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_vandalism}}</td>
                                <?php } ?>


                                {{--33 force out SLM --}}
                                <?php if($item->out_slm_force != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_force')}}" target="_blank">{{$item->out_slm_force}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_force}}</td>
                                <?php } ?>

                                {{--34 Implement out SLM --}}
                                <?php if($item->out_slm_implement != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_implement')}}" target="_blank">{{$item->out_slm_implement}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_implement}}</td>
                                <?php } ?>

                                {{--35 Location out SLM --}}
                                <?php if($item->out_slm_location != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_location')}}" target="_blank">{{$item->out_slm_location}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_location}}</td>
                                <?php } ?>

                                {{--36 Non Tech out SLM --}}
                                <?php if($item->out_slm_nontech != 0) { ?>
                                <td><a class="text-danger" href="{{url('/dailyStatusKanwil/dskIndexDetail/'.$item->kode_kanwil.'/out_slm_nontech')}}" target="_blank">{{$item->out_slm_nontech}}</a></td>
                                <?php } else { ?>
                                <td>{{$item->out_slm_nontech}}</td>
                                <?php } ?>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center" style="font-weight: bold; font-size: 12px;">
                                <td colspan="8">TOTAL TIKET<span style="color: white;">space|space|space|space|space|space</span></td>

                                {{--37 in_flm_ntx_sum--}}
                                <?php if($dskIndex_sum->in_flm_ntx != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_flm_ntx')}}" target="_blank">{{$dskIndex_sum->in_flm_ntx}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_flm_ntx}}</td>
                                <?php } ?>

                                {{--37 in_flm_co_sum--}}
                                <?php if($dskIndex_sum->in_flm_co != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_flm_co')}}" target="_blank">{{$dskIndex_sum->in_flm_co}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_flm_co}}</td>
                                <?php } ?>

                                {{--37 in_flm_cf_sum--}}
                                <?php if($dskIndex_sum->in_flm_cf != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_flm_cf')}}" target="_blank">{{$dskIndex_sum->in_flm_cf}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_flm_cf}}</td>
                                <?php } ?>

                                {{--37 in_flm_df_sum--}}
                                <?php if($dskIndex_sum->in_flm_df != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_flm_df')}}" target="_blank">{{$dskIndex_sum->in_flm_df}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_flm_df}}</td>
                                <?php } ?>

                                {{--37 in_flm_receipt_sum--}}
                                <?php if($dskIndex_sum->in_flm_receipt != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_flm_receipt')}}" target="_blank">{{$dskIndex_sum->in_flm_receipt}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_flm_receipt}}</td>
                                <?php } ?>

                                {{--37 in_flm_part_sum--}}
                                <?php if($dskIndex_sum->in_flm_part != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_flm_part')}}" target="_blank">{{$dskIndex_sum->in_flm_part}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_flm_part}}</td>
                                <?php } ?>

                                {{--37 out_flm_ntx_sum--}}
                                <?php if($dskIndex_sum->out_flm_ntx != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_flm_ntx')}}" target="_blank">{{$dskIndex_sum->out_flm_ntx}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_flm_ntx}}</td>
                                <?php } ?>

                                {{--37 out_flm_co_sum--}}
                                <?php if($dskIndex_sum->out_flm_co != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_flm_co')}}" target="_blank">{{$dskIndex_sum->out_flm_co}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_flm_co}}</td>
                                <?php } ?>

                                {{--37 out_flm_cf_sum--}}
                                <?php if($dskIndex_sum->out_flm_cf != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_flm_cf')}}" target="_blank">{{$dskIndex_sum->out_flm_cf}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_flm_cf}}</td>
                                <?php } ?>

                                {{--37 out_flm_df_sum--}}
                                <?php if($dskIndex_sum->out_flm_df != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_flm_df')}}" target="_blank">{{$dskIndex_sum->out_flm_df}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_flm_df}}</td>
                                <?php } ?>

                                {{--37 out_flm_receipt_sum--}}
                                <?php if($dskIndex_sum->out_flm_receipt != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_flm_receipt')}}" target="_blank">{{$dskIndex_sum->out_flm_receipt}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_flm_receipt}}</td>
                                <?php } ?>

                                {{--37 out_flm_part_sum--}}
                                <?php if($dskIndex_sum->out_flm_part != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_flm_part')}}" target="_blank">{{$dskIndex_sum->out_flm_part}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_flm_part}}</td>
                                <?php } ?>

                                {{--37 in_slm_replace_sum--}}
                                <?php if($dskIndex_sum->in_slm_replace != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_replace')}}" target="_blank">{{$dskIndex_sum->in_slm_replace}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_replace}}</td>
                                <?php } ?>

                                {{--37 in_slm_network_sum--}}
                                <?php if($dskIndex_sum->in_slm_network != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_network')}}" target="_blank">{{$dskIndex_sum->in_slm_network}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_network}}</td>
                                <?php } ?>

                                {{--37 in_slm_host_sum--}}
                                <?php if($dskIndex_sum->in_slm_host != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_host')}}" target="_blank">{{$dskIndex_sum->in_slm_host}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_host}}</td>
                                <?php } ?>

                                {{--37 in_slm_electrical_sum--}}
                                <?php if($dskIndex_sum->in_slm_electrical != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_electrical')}}" target="_blank">{{$dskIndex_sum->in_slm_electrical}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_electrical}}</td>
                                <?php } ?>

                                {{--37 in_slm_vandalism_sum--}}
                                <?php if($dskIndex_sum->in_slm_vandalism != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_vandalism')}}" target="_blank">{{$dskIndex_sum->in_slm_vandalism}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_vandalism}}</td>
                                <?php } ?>

                                {{--37 in_slm_force_sum--}}
                                <?php if($dskIndex_sum->in_slm_force != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_force')}}" target="_blank">{{$dskIndex_sum->in_slm_force}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_force}}</td>
                                <?php } ?>

                                {{--37 in_slm_implement_sum--}}
                                <?php if($dskIndex_sum->in_slm_implement != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_implement')}}" target="_blank">{{$dskIndex_sum->in_slm_implement}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_implement}}</td>
                                <?php } ?>

                                {{--37 in_slm_location_sum--}}
                                <?php if($dskIndex_sum->in_slm_location != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_location')}}" target="_blank">{{$dskIndex_sum->in_slm_location}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_location}}</td>
                                <?php } ?>

                                {{--37 in_slm_nontech_sum--}}
                                <?php if($dskIndex_sum->in_slm_nontech != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/in_slm_nontech')}}" target="_blank">{{$dskIndex_sum->in_slm_nontech}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->in_slm_nontech}}</td>
                                <?php } ?>

                                {{--37 out_slm_replace_sum--}}
                                <?php if($dskIndex_sum->out_slm_replace != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_replace')}}" target="_blank">{{$dskIndex_sum->out_slm_replace}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_replace}}</td>
                                <?php } ?>

                                {{--37 out_slm_network_sum--}}
                                <?php if($dskIndex_sum->out_slm_network != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_network')}}" target="_blank">{{$dskIndex_sum->out_slm_network}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_network}}</td>
                                <?php } ?>

                                {{--37 out_slm_host_sum--}}
                                <?php if($dskIndex_sum->out_slm_host != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_host')}}" target="_blank">{{$dskIndex_sum->out_slm_host}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_host}}</td>
                                <?php } ?>

                                {{--37 out_slm_electrical_sum--}}
                                <?php if($dskIndex_sum->out_slm_electrical != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_electrical')}}" target="_blank">{{$dskIndex_sum->out_slm_electrical}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_electrical}}</td>
                                <?php } ?>

                                {{--37 out_slm_vandalism_sum--}}
                                <?php if($dskIndex_sum->out_slm_vandalism != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_vandalism')}}" target="_blank">{{$dskIndex_sum->out_slm_vandalism}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_vandalism}}</td>
                                <?php } ?>

                                {{--37 out_slm_force_sum--}}
                                <?php if($dskIndex_sum->out_slm_force != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_force')}}" target="_blank">{{$dskIndex_sum->out_slm_force}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_force}}</td>
                                <?php } ?>

                                {{--37 out_slm_implement_sum--}}
                                <?php if($dskIndex_sum->out_slm_implement != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_implement')}}" target="_blank">{{$dskIndex_sum->out_slm_implement}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_implement}}</td>
                                <?php } ?>

                                {{--37 out_slm_location_sum--}}
                                <?php if($dskIndex_sum->out_slm_location != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_location')}}" target="_blank">{{$dskIndex_sum->out_slm_location}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_location}}</td>
                                <?php } ?>

                                {{--37 out_slm_nontech_sum--}}
                                <?php if($dskIndex_sum->out_slm_nontech != 0) { ?>
                                <td><a class="text-danger" id="tiket_style" href="{{url('/admin/DailyStatusKanwil/detail_tiket_index_sum/out_slm_nontech')}}" target="_blank">{{$dskIndex_sum->out_slm_nontech}}</a></td>
                                <?php } else { ?>
                                <td>{{$dskIndex_sum->out_slm_nontech}}</td>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
