<ul class="base-menu">
    <li class="base-menu__item base-menu__item--clickable"><a href="{{ route('homepage') }}" class="unstyled-link">Home</a></li>
    @if (Auth::guest())
        <li class="base-menu__item base-menu__item--clickable"><a href="{{ route('register') }}" class="unstyled-link">Register</a></li>
        <li class="base-menu__item base-menu__item--clickable"><a href="{{ route('signin') }}" class="unstyled-link">Sign In</a></li>
    @else
        <li class="base-menu__item">Welcome back {{ Auth::user()->name }}.</li>
        <li class="base-menu__item base-menu__item--clickable">
            <form method="POST" action="{{ route('signout') }}" class="signout-form">
                {{ csrf_field() }}
                <button type="submit" class="signout-form__button">Sign Out</button>
            </form>
        </li>
    @endif
</ul>
