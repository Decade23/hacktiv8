<li class="bold {{ request()->is('report*') ? 'active' : '' }}"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="">Pelaporan</span></a>
    <div class="collapsible-body">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        <li><a class="collapsible-body {{ request()->is('report/pegawai*') ? 'active' : '' }}" href="{{ route('pegawai.index') }}" data-i18n=""><i class="material-icons">{{ request()->is('report/pegawai*') ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span>Laporan Pegawai</span></a>
        </li>
    </ul>
    </div>
</li>