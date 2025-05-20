
@if(Auth::check())
<nav>
    <ul>
        <li><a href="/">Saraksts</a></li>
        @if(Auth::check() && Auth::user()->admin)
            <li><a href="/grade">Pievienot adzīmi</a></li>
            <li><a href="/subject">Pievienot mācību priekšmetu</a></li>
            <li><a href="/create">Izveidot skolēna kontu</a></li>
        @endif
        <li><a href="/account">Konts</a></li>
    </ul>
</nav>
@endif


