<div id="resNav">
    <span id="navText" style="float: left;">
        Menu
    </span>
    <span id="navIcon" style="float: right;">
        <i class="fa fa-bars"></i>
    </span>
</div>
<div id="normNav">
    <ul>
        @if(isset($menu))
            @foreach($menu as $m)
                @if($m->getActive() == 1)

                <li>
                    <a href="{{ URL::to('/site/'.$m->getName()) }}">
                        {{ $m->getName() }}
                    </a>
                </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>