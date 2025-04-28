<x-layout>
    <x-slot:title>
        Saraksts
    </x-slot:title>

    <div>
        <h1>Esiet sveicināti {{ Auth::user()->first_name }}</h1>
    </div>
</x-layout>