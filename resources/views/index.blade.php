<x-layout>
    <x-slot:title>
        Atdzīmes saraksts
    </x-slot:title>

        <h1>Atdzīmes saraksts</h1>
    <table>
        <tr>
            <th>Students</th>
            <th>Priekšmets</th>
            <th>Atdzīme</th>
            <th>Darbība</th>
        </tr>
        <tr>
            @foreach ($grades as $grade)
                <td>{{ $grade->student->first_name }} {{ $grade->student->last_name }}</td>
                <td>{{ $grade->subject->subject_name }}</td>
                <td>{{ $grade->grade }}</td>
                
                <td>
                    <form method="POST" action="/{{ $grade->id }}">
                        @csrf
                        @method('DELETE')

                        <button>Dzēst</button>
                    </form>
                </td>
            @endforeach
        </tr>
    </table>
</x-layout>