@extends('layouts.app')
@section('css')

<style type="text/css">
    .navbar-default {
        background-color: #2851aa !important;
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

    .product-men {
        margin-top: 0.3em;
    }
    .men-pro-item {
        position: relative;
        border: 1px solid #D6D6D6;
    }

    .men-thumb-item {
        position: relative;
    }
    .men-cart-pro {
        bottom: 0;
        left: 0;
        margin: auto;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        right: 0;
        text-align: center;
        top: 0;
        transition: all 0.5s ease-out 0s;
        visibility: hidden;
        z-index: 10;
    }
    .inner-men-cart-pro {
        height: 100%;
        position: relative;
        width: 100%;
        transition: all 0.5s ease-out 0s;
    }
    .inner-men-cart-pro .link-product-add-cart {
        width: 100%;
        top: 0;
        left: 0;
        position: absolute;
        transition: all 0.5s ease-out 0s;
    }
    .inner-men-cart-pro .link-product-add-cart {
        width: 100%;
        /*bottom: -40px;*/
        left: 0;
        position: absolute;
        transition: all 0.5s ease-out 0s;
    }
    .product-new-top {
        color: #fff;
        display: inline-block;
        right: 0;
        padding: 0 0px 1px;
        position: absolute;
        top: 0;
        z-index: 99;
    }
    .item-info-product {
        text-align: center;
        margin: 0px 0 0;
    }
    .info-product-price {
        margin: 10px 0;
    }
    .images {
        /*height:250px;*/
        text-align: center;
        margin: 0px;
        padding: 0px;
    }
    .pro-image-front {
        height: 225px !important;
        width: 225px !important;
        margin: 0px;
        padding: 0px;
    }
    .btn {
        line-height: 1.3em;
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

    <div class="container-fluid rasxod-page" style="min-height: 853px;margin-top: 0px;">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall" style="margin-top: 0px;">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 0px;margin: 0px;">
                    <!-- Content You may write your code here -->
                    @foreach($sotrudnikis as $sotrudniki)
                        <div class="col-md-2 product-men" id="sotrudniki_{{ $sotrudniki->id }}" style="margin-top:0px;">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <div class="images">
                                        <img src="{{ $sotrudniki->photo_path }}" alt="" class="pro-image-front">
                                    </div>
                                    <div class="product-new-top">
                                        <a href="{{ route('sotrudniki.edit', ['id' => $sotrudniki->id ]) }}" style="background-color: orange!important;padding: 4px;display: block;border-radius: 0px;" class="btn">
                                            <span class=""><i class="fa fa-pencil fa-fw"></i></span>
                                        </a>
                                        <button style="background-color: #fc636b!important;padding: 4px;display: block;border-radius: 0px;" value="{{ $sotrudniki->id }}" class="deletesotrudniki btn">
                                            <span class=""><i class="fa fa-trash fa-fw"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="item-info-product">
                                    <h4 class="text-capitalize"><a href="{{ route('sotrudniki.show', [ 'id' => $sotrudniki->id ]) }}">{{ $sotrudniki->imja_sotrudnika }}</a></h4>
                                    <div class="clearfix" style="margin-top: 0px;color:#337ab7;font-weight: bold;">
                                        <div class="col-md-12">
                                            <div class="col-md-6 text-right" style="padding: 0px;">
                                                Зарплата:
                                            </div>
                                            <div class="col-md-6 text-left" style="padding: 0px;">
                                                &nbsp;{{ $sotrudniki->zarplata }}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6 text-right" style="padding: 0px;">
                                                Получено:
                                            </div>
                                            <div class="col-md-6 text-left" style="padding: 0px;">
                                               @foreach($sotrudniki->getSumma as $summa)
                                                    &nbsp;{{  $summa->total }}
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

 <!-- Modal for Delete Zarplata -->
<div class="modal fade" id="deletesotrudniki" tabindex="-1" role="dialog">
    <div class='modal-dialog'>
        <!-- Modal content-->
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'></h4>
            </div>
            <div class='modal-body'>
                <div class="">
                    <h4 class="text-center text-danger"> Запись будеть удален.</h4>
                    <h4 class="text-center text-danger">Вы действительно хотите удалит запись?</h4>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger deletebtn' value=''>Удалит</button>
                <!-- <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> -->
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
</script>
<script type="text/javascript">
    $('.deletesotrudniki').click(function(){
            $('#deletesotrudniki').modal('show');

            $('.deletebtn').val($(this).val());  
            
            var task_id = $('.deletebtn').val();

            $('.deletebtn').click(function(){
                $.ajax({
                    type: "get",
                    url:"/sotrudniki/deleteAjax/" + task_id,
                    success: function (data) {
                        $('#deletesotrudniki').modal('hide');
                        $("#sotrudniki_" + data[1]).fadeOut(800, function () {
                            $(this).remove();
                        });
                    },
                    error: function (data) {
                    }
                });
            });
        });

</script>

@endsection
