<x-layout>
    <x-slot:title>
        Konta rediģēšana
    </x-slot:title>

    <div>
        <form method="POST" action="/edit">
            @csrf

            <h1>Rediģēt kontu.</h1>

            <label>
                Vārds:
                <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" require>
            </label>

            <label>
                Uzvārds:
                <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" require>
            </label>

            <label>
                Parole:
                <input type="text" name="password" require>
            </label>

            <button>Saglabāt</button>
        </form>
    </div>
</x-layout>