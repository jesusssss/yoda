<ul>
    <li>
        <a href="{{ URL::route('home') }}">
            Home
        </a>
    </li>
    @if(Auth::check())
        <li>
            <a href="">
                My account
            </a>
        </li>
    @else
        <li>
            <a href="{{ URL::route('account-create') }}">
                Create account
            </a>
        </li>
    @endif
    <li>
        <a href="">
            Than
        </a>
    </li>
    <li>
        <a href="">
            Home
        </a>
    </li>
</ul>