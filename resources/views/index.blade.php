<x-layout>
    <x-slot:title>
        Atzīmes
    </x-slot:title>

        <h1>Atzīmes</h1>

        <div class="filter-section">
        <form method="GET" action="/">
        @if (Auth::check() && Auth::user()->admin)
            <select name="student_id">
                <option value="">Visi studenti</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ (string)request('student_id') === (string)$student->id ? 'selected' : '' }}>
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>
        @endif

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
            @if(Auth::check() && Auth::user()->admin)
                <th>Students</th>
            @endif
            <th>Priekšmets</th>
            <th>Atzīme</th>
            @if(Auth::check() && Auth::user()->admin)<th>Darbība</th>@endif
        </tr>
            @if(Auth::check() && Auth::user()->admin)
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->student->first_name }} {{ $grade->student->last_name }}</td>
                        <td>{{ $grade->subject->subject_name }}</td>
                        <td>{{ $grade->grade }}</td>
                        
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
                    </tr>
                @endforeach
            @endif
            @if(Auth::check() && !Auth::user()->admin)
                @foreach ($grades as $grade)
                    @if ($grade->student_id === auth()->id())
                    <tr>
                        <td>{{ $grade->subject->subject_name }}</td>
                        <td>{{ $grade->grade }}</td>
                    </tr>
                    @endif
                @endforeach
            @endif
    </table>
</x-layout>