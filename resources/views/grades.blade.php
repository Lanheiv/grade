<x-layout>


    <h1>Grades</h1>

    <table>
        <tr>
            <th>Student</th>
            <th>Subject</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
        <tr>
        @foreach ($grades as $grade)
            <tr>
                <td>{{ $grade->student->first_name }} {{ $grade->student->last_name }}</td>
                <td>{{ $grade->subject->subject_name }}</td>
                <td>{{ $grade->grade }}</td>
                <td>

                <form method="POST" action="/grades/{{ $grade->id }}">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </table>

</x-layout>