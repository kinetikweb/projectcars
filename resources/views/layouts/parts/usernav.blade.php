<li><a href="{{ url('/cars/search') }}">Search</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
       Cars <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ url('/cars') }}">Cars List
            </a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
       Car Brands <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ url('/brands') }}">Brands List
            </a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Car Models <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ url('/models') }}">Model List
            </a>
        </li>
    </ul>
</li>

 <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Car Engines <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ url('/engines') }}">Engines List
            </a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Colors <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ url('/colors') }}">Color List
            </a>
        </li>
    </ul>
</li>
