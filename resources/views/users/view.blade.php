<x-layout>
    <x-slot:title>
        Konts
    </x-slot:title>

    <div>
        <div>
            <h1>Detaļas par kontu.</h1>

            <p>Vārds: {{ Auth::user()->first_name }}</p>
            <p>Uzvērds: {{ Auth::user()->last_name }}</p>

            <p>Admina loma: {{ Auth::user()->admin ? "Ir" : "Nav" }}</p>
            <p>Izveidots: {{ Auth::user()->created_at }}</p>

            <a href="/edit">Rediģēt kontu</a>
        </div>

        <form method="POST" action="/logout">
            @csrf

            <button>Iziet</button>
        </form>
    </div>
</x-layout>