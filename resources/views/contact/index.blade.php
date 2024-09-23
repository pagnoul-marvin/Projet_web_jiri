<x-layouts.main>

    <h1 class="font-bold text-2xl">{{__('Your contacts')}}</h1>

    <section>
        <h2 class="font-bold">{{__('My contacts')}}</h2>
            <ul>

                @foreach($contacts as $contact)

                    <li><a class="underline text-blue-500" href="/contacts/{{$contact->id}}">{{$contact->name}} - {{$contact->email}}</a></li>

                @endforeach

            </ul>
    </section>

    <a href="/contacts/create" class="text-blue-800 underline">{{__('Create a new Contact')}}</a>

</x-layouts.main>
