<x-layout>
    <x-slot:title>
        Izveidot kontu
    </x-slot:title>

    <div>
        <h1>Izveidot kontu</h1>

        <form method="POST" action="/create">
            @csrf

            <label>
                Vārds: 
                <input type="text" name="first_name" require>
            </label>

            <label>
                Uzvārds: 
                <input type="text" name="last_name" require>
            </label>

            <label>
                Uzvārds: 
                <input type="password" name="password" require>
            </label>

            <button>Saglabāt</button>
        </form>
    </div>
</x-layout>