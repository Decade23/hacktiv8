{{-- pegawai --}}
<li class="bold  {{ request()->is('pegawai*') ? 'active' : '' }}">
    <a class="waves-effect waves-cyan {{ request()->is('pegawai*') ? 'active' : '' }}" href="{{ route('pegawai.index') }}"><i class="material-icons"><img src="{{asset('icons/data_pegawai_kecil.png')}}"></i><span class="menu-title" data-i18n="">Data Pegawai</span>
    </a>
</li>

<li class="bold">
    <a class="waves-effect waves-cyan {{ request()->is('riwayat-pendidikan*') ? 'active' : '' }}" href="{{ route('riwayat_pendidikan.index') }}"><i class="material-icons"><img src="{{asset('icons/school_kecil.png')}}"></i><span class="menu-title" data-i18n="">Riwayat Pendidikan</span>
    </a>
</li>

<li class="bold">
    <a class="waves-effect waves-cyan {{ request()->is('mutasi*') ? 'active' : '' }}" href="{{ route('mutasi.index') }}"><i class="material-icons"><img src="{{asset('icons/mutasi_kecil.png')}}"></i><span class="menu-title" data-i18n="">Mutasi</span>
    </a>
</li>