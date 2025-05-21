<x-layout>
    <x-slot:title>
        Konts
    </x-slot:title>

    <div>
        <div>
            <h1>Detaļas par kontu.</h1>

            <p>Vārds: {{ Auth::user()->first_name }}</p>
            <p>Uzvērds: {{ Auth::user()->last_name }}</p>

            <p>Admina loma: {{ Auth::user()->admin ? "Ir" : "Nav" }}</p>
            <p>Izveidots: {{ Auth::user()->created_at }}</p>

            <a href="/edit">Rediģēt kontu</a>
        </div>
        <div>
            <h1>Konta bilde</h1>
            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="profile_image" accept="image/*" required>
                <button type="submit">Pievienot</button>
            </form>
            @if(auth()->user()->profile_image)
                <img src="{{ asset('storage/profile_pics/' . auth()->user()->profile_image) }}" alt="Profile Picture" width="150">

                <form action="{{ route('profile.image.delete') }}" method="POST">
                    @csrf
                    <button type="submit">Delete Profile Image</button>
                </form>
            @else
                <p>Nav bildes</p>
            @endif
        </div>

        <form method="POST" action="/logout">
            @csrf

            <button>Iziet</button>
        </form>
    </div>
</x-layout>