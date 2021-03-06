@extends('layouts.app')
@section('css')

<style type="text/css">
    .navbar-default {
        background-color: #ef9e2d !important;
    }
    .navbar-brand {
        color: white !important;
    }
    .fa {
        color: white !important;
    }
    .caret {
        color: white !important;
    }
    .dropdown-menu .fa, table .fa {
        color: black !important;
    }
    @keyframes alert-customer {
        from   {color: #fff;}
        to  {color: #ef9e2d;}
    }

    /* The element to apply the animation to */
    .customer-alert {
        margin-left: 10px;
        background-color: inherit;
        animation-name: alert-customer;
        animation-duration: 2s;
        animation-iteration-count: infinite;
    }
</style>
<!-- DataTables CSS -->
<link href="{{ URL::asset('css/dataTables.bootstrap.css') }}  " rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ URL::asset('css/dataTables.responsive.css') }}  " rel="stylesheet">
@endsection
@section('content')
    @include('shared.navbartop')
    @include('sweetalert::alert')

    <div class="container-fluid rasxod-page" style="min-height: 853px;">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall  ">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 10px;">
                    <!-- Content You may write your code here -->
                    <div class="">
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center"> Имя клиента </th>
                                    <th class="text-center"> Название фирмы </th>
                                    <th class="text-center"> Тип заказа </th>
                                    <th class="text-center"> Заказ </th>
                                    <th class="text-center"> Срок: </th>
                                </tr>
                            </thead>
                            <tbody class="clearfix">
                                <!--  -->
                                @foreach($incomes as $income)
                                    <tr>
                                        <td>
                                            {{ $income->customer_name }}
                                        </td>
                                        <td>
                                            {{ $income->company_name }}
                                        </td>
                                        <td>
                                            {{ $income->type_of_zakaz }}
                                        </td>
                                        <td>
                                            {{ $income->zakaz }}
                                        </td>
                                        <td>
                                            @if($income->srok >= 0)
                                                <i class="fa fa-circle customer-alert"> &nbsp;</i> 
                                                {{ Carbon\Carbon::parse($income->srok)->day  }} осталось дней
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
@endsection
@section('js')
<!-- DataTables JavaScript -->
<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.responsive.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    $('.dolgi').click(function(){
        $('#platitdolgi').modal('show');

        var id = $(this).val();
        
        $('.custommer_id').attr('value', id);
        $('.customer_name').attr('value', $('#income_'+id).find('#person_name').text());

    });
</script>

@endsection
