<x-layouts.main>

    <h1 class="font-bold text-2xl">Your contacts</h1>

    <section>
        <h2 class="font-bold">My contacts</h2>
            <ul>

                @foreach($contacts as $contact)

                    <li><a class="underline text-blue-500" href="/contacts/{{$contact->id}}">{{$contact->name}} - {{$contact->email}}</a></li>

                @endforeach

            </ul>
    </section>

</x-layouts.main>
