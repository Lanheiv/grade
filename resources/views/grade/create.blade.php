<x-layout>
    <x-slot:title>
        Pievienot adzīmi
    </x-slot:title>

    <div>
        <h1>Pievienot adzīmi</h1>

        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/grade">
            @csrf

            <label>
                Skolēns: 
                <select name="student_id">
                    <option value="0">--Tukš--</option>
                    @foreach ($user as $user)
                        @if (!$user->admin)
                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endif    
                    @endforeach
                </select>
            </label>

            <label>
                Priekšmets: 
                <select name="subject_id">
                    <option value="0">--Tukš--</option>
                    @foreach ($subject as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                Atdzīme: 
                <input type="number" name="grade">
            </label>

            <button>Pievienot</button>
        </form>
    </div>
</x-layout>