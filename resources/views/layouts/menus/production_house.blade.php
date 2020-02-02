{{-- pegawai --}}
<li class="bold  {{ request()->is('production-house*') ? 'active' : '' }}">
    <a class="waves-effect waves-cyan {{ request()->is('production-house*') ? 'active' : '' }}" href="{{ route('production_house.index') }}"><i class="material-icons"><img src="{{asset('icons/data_pegawai_kecil.png')}}"></i><span class="menu-title" data-i18n="">Production House</span>
    </a>
</li>