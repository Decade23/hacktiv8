<li class="bold {{ request()->is('kepegawaian*') ? 'active' : '' }}"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons"><img src="{{asset('icons/kepegawaian_kecil.png')}}"></i><span class="menu-title" data-i18n="">Kepegawaian</span>
    {{-- <span class="badge badge pill orange float-right mr-10">3</span> --}}
</a>
    <div class="collapsible-body">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        <li><a class="collapsible-body {{ request()->is('kepegawaian/jabatan*') ? 'active' : '' }}" href="{{ route('jabatan.index') }}" data-i18n=""><i class="material-icons">{{ request()->is('kepegawaian/riwayat-pendidikan*') ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span>Jabatan</span></a>
        </li>
        <li><a class="collapsible-body {{ request()->is('kepegawaian/pangkat*') ? 'active' : '' }}" href="{{ route('pangkat.index') }}" href="{{ route('riwayat_pendidikan.index') }}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Pangkat</span></a>
        </li>
    </ul>
    </div>
</li>
