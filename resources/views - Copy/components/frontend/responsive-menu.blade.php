<div class="menu--sm mobile-menu">
    <!-- Head -->
    <div class="mobile-menu__header">
        <!-- brand -->
        <div class="mobile-menu__brand">
            <div class="left-side">
                <div class="close">
                    <span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 5.08325L15.6066 15.6899" stroke="#191F33" stroke-width="1.9375"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4.99999 15.9167L15.6066 5.31015" stroke="#191F33" stroke-width="1.9375"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <a href="{{ route('frontend.index') }}">
                    <img src="{{ $settings->logo_image_url }}" alt="brand-logo">
                </a>
            </div>
            <div class="navigation-bar__buttons">
                @if (auth('user')->check())
                    @php
                        $unread_messages = App\Models\Messenger::where('to_id', auth('user')->id())
                            ->where('body', '!=', '.')
                            ->where('read', 0)
                            ->count();
                    @endphp
                    <a href="{{ route('frontend.post') }}" class="btn">
                        <span class="icon--left">
                            <x-svg.image-select-icon />
                        </span>
                    </a>
                    <a href="{{ route('frontend.dashboard') }}" class="mbl-user position-relative">
                        <div class="user__img-wrapper">
                            <img src="{{ auth('user')->user()->image_url }}"
                                style="width: 40px; height: 40px; border-radius: 50%" alt="User Image">
                        </div>

                        <span id="unread_count_custom3"
                            class="text-danger unread-message-img {{ $unread_messages ? '' : 'd-none' }}"
                            amount="{{ $unread_messages }}">
                            {{ $unread_messages }}
                        </span>
                    </a>
                @else
                    <a href="{{ route('users.login') }}" class="btn mbl-post-btn login_required">
                        <span class="icon--left">
                            <x-svg.image-select-icon />
                        </span>
                    </a>
                    <a href="{{ route('users.login') }}" class="btn btn--bg">{{ __('sign_in') }}</a>
                @endif
            </div>

        </div>

        {{-- <div class="mobile-menu__search">
            <form action="{{ route('frontend.adlist.search') }}" method="GET">
                <div class="input-field">
                    <input type="text" placeholder="{{ __('ads_title_keyword') }}..." name="keyword">
                    <button class="icon icon-search">
                        <x-svg.search-icon />
                    </button>
                </div>
            </form>
        </div> --}}
        <div class="mobile-menu__body">
            <h4 class="title">Menu Options</h4>
            <ul>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.index') }}" class="menu--sm__link">{{ __('home') }}</a>
                </li>
                <li class="menu--sm__item">
                    <a href="#" class="menu--sm__link">
                        {{ __('all_categories') }}
                        <span class="icon">
                            <x-svg.category-arrow-icon />
                        </span>
                    </a>
                    @if (isset($footer_categories) && count($footer_categories))
                        <ul class="menu--sm-dropdown">
                            @foreach ($footer_categories as $category)
                                <li class="menu--sm-dropdown__item">
                                    <a href="javascript:void(0)"
                                        onclick="adFilterFunctionTwo('{{ $category->slug }}')"
                                        class="menu--sm-dropdown__link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    @endif
                </li>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.adlist') }}" class="menu--sm__link">{{ __('ads') }}</a>
                </li>
                @if ($blog_enable)
                    <li class="menu--sm__item">
                        <a href="{{ route('frontend.blog') }}" class="menu--sm__link">{{ __('blog') }}</a>
                    </li>
                @endif
                @if ($priceplan_enable)
                    <li class="menu--sm__item">
                        <a href="{{ route('frontend.priceplan') }}" class="menu--sm__link">{{ __('pricing') }}</a>
                    </li>
                @endif
            </ul>
        </div>
         @if (auth('user')->check())
        <div class="mobile-menu__body">
            <h4 class="title">Dashboard</h4>
            @php
                $user = auth('user')->user();
            @endphp
            <ul>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.dashboard') }}"
                        class="menu--sm__link {{ request()->routeIs('frontend.dashboard') ? 'active' : '' }}">
                        {{ __('overview') }}
                    </a>
                </li>
                <li class="menu--sm__item">
                    <a href="#"
                        class="menu--sm__link {{ request()->routeIs('frontend.seller-dashboard') ? 'active' : '' }}">
                        {{ __('public_profile') }}
                    </a>
                </li>
                @if (session('user_plan') && session('user_plan')->ad_limit > 0)
                    <li class="menu--sm__item">
                        <a href="{{ route('frontend.post') }}"
                            class="menu--sm__link {{ request()->routeIs('frontend.post') ? 'active' : '' }}">
                            {{ __('post_ads') }}
                        </a>
                    </li>
                @endif
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.adds') }}"
                        class="menu--sm__link {{ request()->routeIs('frontend.adds') ? 'active' : '' }}">
                        {{ __('my_ads') }}
                    </a>
                </li>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.favourites') }}"
                        class="menu--sm__link {{ request()->routeIs('frontend.favourites') ? 'active' : '' }}">
                        {{ __('favorite_ads') }}
                    </a>
                </li>
                <li class="menu--sm__item">
                    @php
                        $unread_messages = App\Models\Messenger::where('to_id', auth('user')->id())
                            ->where('body', '!=', '.')
                            ->where('read', 0)
                            ->count();
                    @endphp
                    <a href="{{ route('frontend.message') }}"
                        class="menu--sm__link {{ request()->routeIs('frontend.message') ? 'active' : '' }}">
                        {{ __('message') }}

                        <span id="unread_count_custom2" class="text-danger {{ $unread_messages ? '' : 'd-none' }}"
                            amount="{{ $unread_messages }}">
                            ({{ $unread_messages }})
                        </span>
                    </a>
                </li>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.plans-billing') }}"
                        class="menu--sm__link  {{ request()->routeIs('frontend.plans-billing') ? 'active' : '' }}">
                        {{ __('plans_billing') }}
                    </a>
                </li>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.account-setting') }}"
                        class="menu--sm__link {{ request()->routeIs('frontend.account-setting') ? 'active' : '' }}">
                        {{ __('account_settings') }}
                    </a>
                </li>
                <li class="menu--sm__item">
                    <a href="#" class="menu--sm__link"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('sign_out') }}
                    </a>

                    <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        @endif
    </div>
    <!-- footer  -->
    <div class="mobile-menu__footer ">
        <div class="d-flex flex-column mbl-switcher-wrapper">
            <x-frontend.language-switcher />
            <x-frontend.currency-switcher />
        </div>
    </div>
</div>
<div class="mbl-overlay"></div>
