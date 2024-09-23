<x-layouts.main>

    <h1 class="font-bold text-2xl">{{$contact->name}}</h1>
    <dl class="bg-slate-50 p-4 flex flex-col gap-4">
        <div>
            <dt class="font-bold">{{__('Contact\'s name')}}</dt>
            <dd>{{$contact->name}}</dd>
        </div>
        <div>
            <dt class="font-bold">{{__('Contact\'s email')}}</dt>
            <dd>{{$contact->email}}</dd>
        </div>
    </dl>

    <a class="text-blue-800 underline" href="/contacts/{{$contact->id}}/edit">{{__('Modify this Contact')}}</a>

    <form action="{{route('contact.destroy', $contact)}}" method="POST">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="bg-red-500 font-bold text-white rounded-md p-2 px-4 uppercase tracking-wider">{{__('Delete this Contact')}}</button>

    </form>

</x-layouts.main>
