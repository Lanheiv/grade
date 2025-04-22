<x-layout>
    <div>
        <h1>Esiet sveicināti {{ Auth::user()->first_name }}</h1>
        <h3>Jūs esat {{ Auth::user()->admin }} admin</h3>
    </div>
</x-layout>