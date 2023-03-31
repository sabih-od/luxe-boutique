<div class="dashboard-overlay">&nbsp;</div>
<div id="sidebar" class="sidebar-blog bg-light p-30">
    <div class="dashbaord-sidebar-close d-xl-none">
        <i class="fas fa-times"></i>
    </div>
    {{--@dd(\Auth::user()->id);--}}
    <div class="widget border-0 py-0 widget_categories">
        @if(Auth::user()->is_vendor == 2)
            <h4 class="widget-title down-line">{{ Auth::user()->shop_name }}</h4>
        @else
            <h4 class="widget-title down-line">{{ __('Dashboard') }}</h4>
        @endif
        <ul>
            <li class=""><a class="{{ Request::url() == route('user-dashboard') ? 'active':'' }}"
                            href="{{ route('user-dashboard') }}">Dashboard</a></li>

            @if(Auth::user()->is_vendor == 1)
                <li class=""><a class="{{ Request::url() == route('user-affilate-program') ? 'active':'' }}"
                                href="{{ route('user-affilate-program') }}">{{ __('Affiliate Program') }}</a></li>
            @endif
            @if(Auth::user()->is_vendor == 2)
                @if(empty($package))
                    @if(isset($package->subscription_id))
                        {{--                    <li class=""><a class="">{{ __('Please First Upgrade A Package') }}</a>--}}
                        {{--                    </li>--}}
                        {{--                        <a href="{{route('user-package')}}"--}}
                        {{--                           class="btn btn-default">{{ __('Get Started') }}</a>--}}
                        {{--                        <br><small>&nbsp;</small>--}}
                        <li class=""><a class="" href="{{ route('user-package') }}">{{ __('Get Started') }}</a>
                        </li>
                    @else
                        <li class=""><a class="" href="{{ route('vendor.dashboard') }}">{{ __('Vendor Dashboard') }}</a>
                        </li>
                        <li class=""><a class="{{ Request::url() == route('user-transactions-index') ? 'active':'' }}"
                                        href="{{route('user-transactions-index')}}">{{ __('Transactions') }}</a></li>
                        <li class=""><a class="{{ Request::url() == route('user-message-index') ? 'active':'' }}"
                                        href="{{route('user-message-index')}}">{{ __('Tickets') }}</a></li>
                        <li class=""><a class="{{ Request::url() == route('user-messages') ? 'active':'' }}"
                                        href="{{route('user-messages')}}">{{ __('Messages') }}</a></li>
                        <li class=""><a class="{{ Request::url() == route('user-dmessage-index') ? 'active':'' }}"
                                        href="{{ route('user-dmessage-index') }}">{{ __('Disputes') }}</a></li>
                        {{--                @php( $mentor = \App\Models\Mentor::where('user_id', Auth::user()->id)->first() )--}}
                        {{--                @if($mentor)--}}
                        {{--                    <li class=""><a class="" href="{{ route('user-mentor-sessions') }}">{{ __('Session Requests') }}</a>--}}
                        {{--                    </li>--}}
                        {{--                @else--}}
                        {{--                    <li class=""><a class="" href="{{ route('user-become-a-mentor') }}">{{ __('Become a Mentor') }}</a>--}}
                        {{--                    </li>--}}
                        {{--                @endif--}}
                        {{--                    @else--}}
                        {{--                        <a href="{{route('user-package')}}"--}}
                        {{--                           class="btn btn-default">{{ __('Get Started') }}</a>--}}
                        {{--                        <br><small>&nbsp;</small>--}}
                    @endif
                @else
                    {{--                <li class=""><a class="">{{ __('Please First Upgrade A Package') }}</a>--}}
                    {{--                    </li>--}}
                @endif
            @endif

            @if(Auth::user()->is_vendor == 1)
                <li class=""><a class="{{ Request::url() == route('user-transactions-index') ? 'active':'' }}"
                                href="{{route('user-transactions-index')}}">{{ __('Transactions') }}</a></li>
                <li class=""><a class="{{ Request::url() == route('user-wwt-index') ? 'active':'' }}"
                                href="{{route('user-wwt-index')}}">{{ __('Withdraw') }}</a></li>
                <li class=""><a class="{{ Request::url() == route('user-messages') ? 'active':'' }}"
                                href="{{route('user-messages')}}">{{ __('Messages') }}</a></li>
                <li class=""><a class="{{ Request::url() == route('user-message-index') ? 'active':'' }}"
                                href="{{route('user-message-index')}}">{{ __('Tickets') }}</a></li>
                {{--                <li class=""><a class="{{ Request::url() == route('user-dmessage-index') ? 'active':'' }}"--}}
                {{--                                href="{{ route('user-dmessage-index') }}">{{ __('Disputes') }}</a></li>--}}
            @endif

            @if(Auth::user()->is_vendor == 0)
                {{--                <li class=""><a class="" href="{{ route('user-become-a-mentor') }}">{{ __('Become a Mentor') }}</a></li>--}}
                <li class=""><a class="{{ Request::url() == route('user-orders') ? 'active':'' }}"
                                href="{{ route('user-orders') }}">{{ __('Purchased Items') }}</a></li>
                <li class=""><a class="{{ Request::url() == route('user-transactions-index') ? 'active':'' }}"
                                href="{{route('user-transactions-index')}}">{{ __('Transaction') }}</a></li>
                {{--                <li class=""><a class="{{ Request::url() == route('user-wwt-index') ? 'active':'' }}"--}}
                {{--                                href="{{route('user-wwt-index')}}">{{ __('Withdraw') }}</a></li>--}}
                <li class=""><a class="{{ Request::url() == route('user-favorites') ? 'active':'' }}"
                                href="{{route('user-favorites')}}">{{ __('Favourite Sellers') }}</a></li>
                <li class=""><a class="{{ Request::url() == route('user-messages') ? 'active':'' }}"
                                href="{{route('user-messages')}}">{{ __('Messages') }}</a></li>
                {{--                <li class=""><a class="{{ Request::url() == route('user-dmessage-index') ? 'active':'' }}"--}}
                {{--                                href="{{ route('user-dmessage-index') }}">{{ __('Disputes') }}</a></li>--}}
            @endif
            {{--                        <li class=""><a class="{{ Request::url() == route('user-orders') ? 'active':'' }}" href="{{ route('user-orders') }}">{{ __('Purchased Items') }}</a></li>--}}
            {{--                        <li class=""><a class="{{ Request::url() == route('user-deposit-index') ? 'active':'' }}" href="{{route('user-deposit-index')}}">{{ __('Deposit') }}</a></li>--}}
            {{--                        <li class=""><a class="{{ Request::url() == route('user-transactions-index') ? 'active':'' }}" href="{{route('user-transactions-index')}}">{{ __('Transactions') }}</a></li>--}}
            {{--                        <li class=""><a class="{{ Request::url() == route('user-reward-index') ? 'active':'' }}" href="{{route('user-reward-index')}}">{{ __('Rewards') }}</a></li>--}}
            {{--            <li class=""><a class="{{ Request::url() == route('user-wwt-index') ? 'active':'' }}" href="{{route('user-wwt-index')}}">{{ __('Withdraw') }}</a></li>--}}
            {{--            <li class=""><a class="{{ Request::url() == route('user-order-track') ? 'active':'' }}" href="{{route('user-order-track')}}">{{ __('Order Tracking') }}</a></li>--}}
            {{--            <li class=""><a class="{{ Request::url() == route('user-favorites') ? 'active':'' }}" href="{{route('user-favorites')}}">{{ __('Favourite Sellers') }}</a></li>--}}
            {{--            <li class=""><a class="{{ Request::url() == route('user-messages') ? 'active':'' }}" href="{{route('user-messages')}}">{{ __('Messages') }}</a></li>--}}
            {{--            <li class=""><a class="{{ Request::url() == route('user-message-index') ? 'active':'' }}" href="{{route('user-message-index')}}">{{ __('Tickets') }}</a></li>--}}
            {{--            <li class=""><a class="{{ Request::url() == route('user-dmessage-index') ? 'active':'' }}" href="{{ route('user-dmessage-index') }}">{{ __('Disputes') }}</a></li>--}}
            <li class=""><a class="{{ Request::url() == route('user-profile') ? 'active':'' }}"
                            href="{{ route('user-profile') }}">{{ __('Edit Profile') }}</a></li>
            <li class=""><a class="{{ Request::url() == route('user-reset') ? 'active':'' }}"
                            href="{{ route('user-reset') }}">{{ __('Change Password') }}</a></li>
            <li class=""><a class="" href="{{ route('user-logout') }}">{{ __('Logout') }}</a></li>
        </ul>
    </div>


    @if($gs->reg_vendor == 1)
        <div class="row mt-4">
            <div class="col-lg-12 text-center">

                {{--                @if(Auth::user()->is_vendor == 1)--}}
                {{--                    <a href="{{ route('user-package') }}" class="mybtn1 lg">--}}
                {{--                        <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor == 1 ? __('Upgrade Your Plan') : __('Start Selling') }}--}}
                {{--                    </a>--}}
                {{--                @else--}}
                {{--                    <a href="{{ route('user-package') }}" class="mybtn1 lg">--}}
                {{--                        <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor == 2 ? __('Upgrade Your Plan') : __('Start Selling') }}--}}
                {{--                    </a>--}}
                {{--                    --}}
                {{--                @endif--}}

                @if(auth()->user()->isSubscriptionActive() && count(auth()->user()->subscribes) > 0 && auth()->user()->is_vendor == 2)

{{--                   @if($user->isSubscriptionActive() && count(auth()->user()->subscribes) > 0 && auth()->user()->is_vendor == 2)--}}
{{--                @if(count(auth()->user()->subscribes) > 0 && auth()->user()->is_vendor == 2)--}}
                    <a href="{{ route('user-package') }}" class="mybtn1 lg">
                        <i class="fas fa-dollar-sign"></i> Upgrade Your Plan
                    </a>

                @elseif(count(auth()->user()->subscribes) > 0 && auth()->user()->is_vendor == 2)
                    <a href="{{ route('user-package') }}" class="mybtn1 lg">
                        <i class="fas fa-dollar-sign"></i> Renew your Plan
                    </a>

                @else
                    <a href="{{ route('user-package') }}" class="mybtn1 lg">
                        <i class="fas fa-dollar-sign"></i> Start Selling
                    </a>
                @endif


{{--                @if($data->isSubscriptionActive())--}}
{{--                    <a href="{{ route('user-package') }}" class="mybtn1 lg">--}}
{{--                        <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor == 2 ? __('Upgrade Your Plan1') : __('Start Selling') }}--}}
{{--                    </a>--}}
{{--                                    @elseif(Auth::user()->is_vendor == 2)--}}
{{--                                        <a href="{{ route('user-package') }}" class="mybtn1 lg">--}}
{{--                                            <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor !== 2 ? __('Upgrade Your Plan2') : __('Start Selling') }}--}}
{{--                                        </a>--}}
{{--                @else--}}
{{--                    <a href="{{ route('user-package') }}" class="mybtn1 lg">--}}
{{--                        <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor == 2 ? __('Upgrade Your Plan3') : __('Start Selling') }}--}}
{{--                    </a>--}}
{{--                @endif--}}
            </div>
        </div>
    @endif
</div>
