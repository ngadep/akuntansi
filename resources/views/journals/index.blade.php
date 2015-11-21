@extends('layouts.default')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Daftar Jurnal Umum
        </h2>
        <h3>Periode: {{$period}}
        </h3>
    </div>

    <div class="panel-body">

        <a href="/journals/new" class="btn btn-primary btn-sm pull-right">
            <span class="glyphicon glyphicon-plus"></span> Buat Jurnal Baru
        </a>

        <br/>
        <br/>

        @if ($journals->isEmpty())
        <div class="">
            <div class="alert alert-warning"><strong>Maaf</strong> daftar Jurnal masih kosong</div>
        </div>
        @endif

        @if (!$journals->isEmpty())
        <table class="table table-responsive table-hover table-striped table-condensed">
            <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Referensi</th>
                <th>Keterangan</th>
                <th class="text-right">Nilai Jurnal</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($journals as $index=>$journal)
            <tr>
                <td>{{$index + 1}}</td>
                <td>
                    {{date("d M Y",mktime(0,0,0,$journal->month,$journal->date,$journal->year))}}
                </td>
                <td>
                    {{$journal->reference}}
                </td>
                <td>
                    {{$journal->description}}
                </td>
                <td class="text-right">
                    {{number_format($journal->value)}}
                </td>
                <td>
                    <a data-toggle="modal" class="btn btn-warning btn-xs buka-modal" data-id="{{$journal->id}}">
                        <span class="glyphicon glyphicon-pencil"></span> Detail</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
            {!! $journals->render() !!}
        @endif

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Jurnal</h4>
            </div>
            <div class="modal-body">
                <table class="table table-responsive table-hover table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Akun</th>
                        <th>Deskripsi</th>
                        <th class="text-right">Debit</th>
                        <th class="text-right">Kredit</th>
                    </tr>
                    </thead>
                    <tbody id="data-jurnal-detail">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/app.min.js')}}"></script>
@stop
