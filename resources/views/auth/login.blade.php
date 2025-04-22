<x-layout>
    <x-slot:title>
        Login
    </x-slot:title> 

    <h1>Login</h1>
    <form method="POST" action="/login">
        @csrf

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <label>
            Vārds:
            <input type="text" name="first_name" require>
        </label>

        <label>
            Parole:
            <input type="password" name="password" require>
        </label>

        <button>Ieiet</button>
    </form>
</x-layout>