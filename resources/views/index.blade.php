<x-layout>
    <div>
        <h1>Esiet sveicināti {{ Auth::user()->first_name }}</h1>

        <form method="POST" action="/logout">
            @csrf

            <button>Iziet</button>
        </form>
    </div>
</x-layout>