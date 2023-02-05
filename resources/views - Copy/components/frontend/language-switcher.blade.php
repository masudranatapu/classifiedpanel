@if ($language_enable && $setting->language_changing)
    <li class="nav-item dropdown show language-switcher">
        <a class="nav-link text-dark d-flex align-items-center justify-content-between" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="true"
            id="language_switch_button">
            <span>
                <i class="flag-icon {{ currentLanguage()->icon }}"></i>
                <span class="text-uppercase">{{ currentLanguage()->code }}</span>
            </span>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 3L11 8L6 13" stroke="#767E94" stroke-width="1.6" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>

        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right show"
            style="display:none;left: inherit; right: 0px;" id="switch_dropdown">
            @foreach ($languages as $lang)
                <a class="dropdown-item {{ currentLanguage()->code == $lang->code ? 'active' : '' }}"
                    href="{{ route('changeLanguage', $lang->code) }}">
                    <i class="flag-icon {{ $lang->icon }}"></i>
                    {{ $lang->name }}
                </a>
            @endforeach
        </div>
    </li>
@endif
