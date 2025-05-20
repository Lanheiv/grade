<x-layout>
    <x-slot:title>
        Rediģēt atzīmi
    </x-slot:title>
    <h1>Rediģēt atzīmi</h1>

    <form method="POST" action="/grade/{{ $grade->id }}">
        @csrf
        @method('PUT')

       <select name="student_id">
            @foreach($user as $student)
                <option value="{{ $student->id }}" {{ $grade->student_id == $student->id ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>

        <select name="subject_id">
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $grade->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->subject_name}}
                </option>
            @endforeach
        </select>

        <input type="number" name="grade" value="{{ $grade->grade }}"/>

        <button type="submit">Saglabāt</button>

    </form>
</x-layout>