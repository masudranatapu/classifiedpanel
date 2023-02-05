@if ($setting->currency_changing && count($headerCurrencies))
    @php
        $currency_count = count($headerCurrencies) && count($headerCurrencies) > 1;
        $current_currency_code = currentCurrencyCode();
        $current_currency_symbol = currentCurrencySymbol();
    @endphp
    <li class="nav-item dropdown show currency-switcher">
        <a class="nav-link text-dark d-flex align-items-center justify-content-between" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="true"
            id="currency_switch_button">

            <span class="text-uppercase">{{ $current_currency_code }} ({{ $current_currency_symbol }})</span>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 3L11 8L6 13" stroke="#767E94" stroke-width="1.6" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
        @if ($currency_count)
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right show"
                style="display:none;left: inherit; right: 0px;" id="currency_switch_dropdown">
                @foreach ($headerCurrencies as $currency)
                    {{-- @if ($currency->code != $current_currency_code) --}}
                        <a class="dropdown-item {{ $current_currency_code == $currency->code ? 'active' : '' }}" href="{{ route('changeCurrency', $currency->code) }}">
                            {{ $currency->code }} ({{ $currency->symbol }})
                        </a>
                    {{-- @endif --}}
                @endforeach
            </div>
        @endif
    </li>
@endif
