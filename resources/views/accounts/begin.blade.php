@extends('layouts.default')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Saldo Awal Akun
            </h2>

            <h3>{{$period}}
            </h3>
        </div>

        <div class="panel-body">

            @if ($balanceDebits->isEmpty())
                <div class="">
                    <div class="alert alert-warning"><strong>Maaf</strong> daftar Perkiraan tidak ditemukan</div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-6">
                        <h4>Aktiva</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 id="sum-debit" class="text-right"></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6">
                        <h4>Pasiva</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 id="sum-kredit" class="text-right"></h4>
                    </div>
                </div>
            </div>

            @if (!$balanceDebits->isEmpty())
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>kode</th>
                                <th>Nama Akun</th>
                                <th>Saldo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($balanceDebits as $index=>$balanceDebit)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>
                                        {{$balanceDebit->code}}
                                    </td>
                                    <td>
                                        {{$balanceDebit->name}}
                                    </td>
                                    <td class="text-right debit-value">
                                        <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
                                        <a href="#" class="balance" data-name="debit" data-pk="{{$balanceDebit->id}}">
                                            {{number_format($balanceDebit->beginning_balance)}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>kode</th>
                                <th>Nama Akun</th>
                                <th>Saldo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($balanceCredits as $index=>$balanceCredit)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>
                                        {{$balanceCredit->code}}
                                    </td>
                                    <td>
                                        {{$balanceCredit->name}}
                                    </td>
                                    <td class="text-right credit-value">
                                        <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
                                        <a href="#" class="balance" data-name="credit" data-pk="{{$balanceCredit->id}}">
                                            {{number_format(- $balanceCredit->beginning_balance)}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
@section('js-atas')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-editable.css')}}"/>
    <script src="{{asset('assets/js/bootstrap-editable.js')}}"></script>
@stop
@section('js-bawah')
<script src="{{asset('/js/app.min.js')}}"></script>
@stop