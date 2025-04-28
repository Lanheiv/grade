<x-layout>
    <x-slot:title>
        Konta rediģēšana
    </x-slot:title>

    <div>
        <h1>Rediģēt kontu.</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/edit">
            @csrf

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
                <input type="password" name="password">
                <input name="password_confirmation" type="password">
            </label>

            <button>Saglabāt</button>
        </form>
    </div>
</x-layout>