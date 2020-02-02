<li class="bold {{ request()->is('movie*') ? 'active' : '' }}"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons"><img src="{{asset('icons/kepegawaian_kecil.png')}}"></i><span class="menu-title" data-i18n="">Movie</span>
    {{-- <span class="badge badge pill orange float-right mr-10">3</span> --}}
</a>
    <div class="collapsible-body">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        <li><a class="collapsible-body {{ request()->is('movie*') ? 'active' : '' }}" href="{{ route('movie.index') }}" data-i18n=""><i class="material-icons">{{ request()->is('movie*') ? 'radio_button_checked' : 'radio_button_unchecked' }}</i><span>List</span></a>
        </li>
    </ul>
    </div>
</li>
