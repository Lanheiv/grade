<x-layout>
    <x-slot:title>
        Pievienot mācību priekšmetu
    </x-slot:title>

    <div>
        <h1>Pievienot mācību priekšmetu</h1>

        @if ($errors->any())
            <ul>
                @foreach($errors as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/subject">
            @csrf

            <label>
                Mācību priekšmets: 
                <input type="text" name="subject_name" require>
            </label>

            <button>Pievienot</button>
        </form>
    </div>
</x-layout>