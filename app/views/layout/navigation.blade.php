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