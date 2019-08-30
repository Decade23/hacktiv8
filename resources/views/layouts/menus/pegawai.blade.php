<li class="bold {{ request()->is('kepegawaian*') ? 'active' : '' }}"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="">Kepegawaian</span>
    {{-- <span class="badge badge pill orange float-right mr-10">3</span> --}}
</a>
    <div class="collapsible-body">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        <li><a class="collapsible-body {{ request()->is('kepegawaian/pegawai*') ? 'active' : '' }}" href="{{ route('pegawai.index') }}" data-i18n=""><i class="material-icons">{{ request()->is('kepegawaian/pegawai*') ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span>Data Pegawai</span></a>
        </li>
        <li><a class="collapsible-body" href="{{ route('pegawai.index') }}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Riwayat Pendidikan</span></a>
        </li>
        <li><a class="collapsible-body" href="dashboard-ecommerce.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Kepegawaian</span></a>
        </li>
        <li><a class="collapsible-body" href="dashboard-analytics.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Mutasi</span></a>
        </li>
        
        <li><a class="collapsible-body" href="dashboard-analytics.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Report</span></a>
        </li>
    </ul>
    </div>
</li>