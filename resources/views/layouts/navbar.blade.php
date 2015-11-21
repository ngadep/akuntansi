<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        @if (Auth::check())
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a
                                href="/">{{ Akuntansi\Models\Company::find(session()->get("perusahaan_aktif"))->name }}</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akun <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/accounts">Daftar Akun</a></li>
                            <li><a href="/beginning-balance">Saldo Awal Akun</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Daftar Asset</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jurnal <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/journals/new">Jurnal Umum</a></li>
                            <li><a href="/journals">Daftar Jurnal Umum</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Trial Balance</a></li>
                            <li><a href="#">Neraca</a></li>
                            <li><a href="#">Laba/ Rugi</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Buku Besar</a></li>
                            <li><a href="#">Transaksi Jurnal</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">pengaturan</a></li>
                            <li><a href="{{action('Auth\AuthController@getLogout')}}">keluar</a></li>
                        </ul>
                    </li>
                </ul>
                @if(auth()->user()->companies->count() > 1)
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Perusahaan
                            <span class="caret"></span></a>

                        <form name="ChangeID" id="ChangeID" method="post" action="/perusahaan">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="cari_id">
                            <ul class="dropdown-menu" role="menu">
                                @foreach(auth()->user()->companies as $company)
                                    <li><a href="#"
                                           onclick="$('#cari_id').val('{{$company->id}}'); $('#ChangeID').submit()">
                                            {{$company->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                    </li>
                </ul>
                @endif
            </div>
        @endif
    </div>
</div>
