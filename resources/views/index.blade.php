<x-layout>
    <x-slot:title>
        Atzīmes
    </x-slot:title>

        <h1>Atzīmes</h1>

        <div class="filter-section">
        <form method="GET" action="/">
            <select name="student_id">
                <option value="">Visi studenti</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ (string)request('student_id') === (string)$student->id ? 'selected' : '' }}>
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>

            <select name="subject_id">
                <option value="">Visi priekšmeti</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ (string)request('subject_id') === (string)$subject->id ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                @endforeach
            </select>

            <select name="grade">
                <option value="">Visas atzīmes</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ (string)request('grade') === (string)$i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>

            <button type="submit">Filtrēt</button>
            <a href="/">Attīrīt</a>
        </form>
    </div>

    <table>
        <tr>
            <th>Students</th>
            <th>Priekšmets</th>
            <th>Atzīme</th>
            @if(Auth::check() && Auth::user()->admin)<th>Darbība</th>@endif
        </tr>
       
            @foreach ($grades as $grade)
             <tr>
                <td>{{ $grade->student->first_name }} {{ $grade->student->last_name }}</td>
                <td>{{ $grade->subject->subject_name }}</td>
                <td>{{ $grade->grade }}</td>
                
            @if(Auth::check() && Auth::user()->admin)
                <td>
                    <form method="POST" action="/{{ $grade->id }}">
                        @csrf
                        @method('DELETE')

                        <button>Dzēst</button>
                    </form>

                    <form method="GET" action="/grade/{{ $grade->id }}/edit">
                        @csrf

                        <button>Rediģēt</button>
                    </form>
                </td>
            @endif
            
            </tr>
            @endforeach
        
    </table>
</x-layout>