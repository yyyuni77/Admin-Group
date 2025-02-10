<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">{{ __('RIDEMATE') }}</a>
        </div>
        <ul class="nav">
            @php
                $pageSlug = $pageSlug ?? ''; // Ensure $pageSlug is always set
            @endphp

            <li class="{{ $pageSlug == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

                    <li class="{{ $pageSlug == 'profile' ? 'active' : '' }}">
                        <a href="{{ route('profile.edit') }}">
                            <i class="tim-icons icon-single-02"></i>
                            <p>{{ __('Admin Profile') }}</p>
                        </a>
                    </li>
            

            <li class="{{ $pageSlug == 'maps' ? 'active' : '' }}">
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>

            <li class="{{ $pageSlug == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
