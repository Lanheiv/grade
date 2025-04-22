@if(Auth::check() && Auth::user()->admin)
    <nav>
        <ul>
            <li><a href="/">Saraksts</a></li>
        </ul>
    </nav>
@endif

