@extends('layouts.default')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ $header }}</h2>
        </div>
        <div class="panel-body">
            <form method="{{ $method }}" action="{{ $action }}">
                {!! csrf_field() !!}
                {!!  $hidden or '' !!}
                <div class="form-group">
                    <label for="kode">Kode Perkiraan</label>
                    <input name="code" type="text" class="form-control" id="kode"
                           value="{{$account->code or ''}}" placeholder="Kode Perkiraan"{{$disable or ''}}>
                </div>
                <div class="form-group">
                    <label for="sub-kelas">Grup</label>
                    <select name="group_id" class="form-control" id="sub-kelas"{{$disable or ''}}>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}"
                                {{($group->id == (isset($account)?$account->group_id:''))?'selected=selected':''}}>
                            {{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="perkiraan">Deskripsi Perkiraan</label>
                    <input name="name" type="text" class="form-control" id="perkiraan"
                           value="{{$account->name or ''}}" placeholder="Deskripsi Perkiraan">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="/accounts" role="button">Batal</a>
            </form>
        </div>
    </div>
@stop