@extends('layouts.default')
@section('content')
<!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Daftar Akun Perkiraan
            <small>( {{ $accounts->count() }} )</small>
        </h2>
    </div>
    <div class="panel-body">

        <a href="/accounts/create" class="btn btn-primary btn-sm pull-right">
            <span class="glyphicon glyphicon-plus"></span> Tambah Akun
        </a>

        <br/>
        <br/>

        @if ($accounts->isEmpty())
        <div class="">
            @if(!is_array($accounts))
            <div class="alert alert-warning"><strong>Maaf</strong> daftar Perkiraan tidak ditemukan</div>
            @endif
        </div>
        @endif

        @if (!$accounts->isEmpty())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Kode Akun</th>
                <th>Kategori</th>
                <th>Grup</th>
                <th>Nama Akun</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $key=>$account)
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    {{ $account->code }}
                </td>
                <td>
                    {{ $account->category_name }}
                </td>
                <td>
                    {{ $account->group_name }}
                </td>
                <td>
                    {{ $account->account_name }}
                </td>
                <td>
                    <form method="POST" action="accounts/{{ $account->id }}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <a href="{{action('AccountController@edit', array($account->id))}}" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-pencil"></span> Edit
                    </a>
                    <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>
                        Hapus
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif

    </div>
</div>
@stop