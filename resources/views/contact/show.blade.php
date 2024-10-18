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

        @if($contact->photo)
            <div>
                <dt class="font-bold">{{__('Contact\'s photo')}}</dt>
                <dd><img
                        srcset="
                        {{asset('contacts/'.Auth::id().'/large/'.basename($contact->photo))}} 720w,
                {{asset('contacts/'.Auth::id().'/medium/'.basename($contact->photo))}} 500w,
                {{asset('contacts/'.Auth::id().'/small/'.basename($contact->photo))}} 300w"
                        sizes="(max-width: 800px) 300px,(max-width: 1000px) 500px, 720px"
                        src="{{asset($contact->photo)}}"
                        alt="Photo de profil">
                </dd>
            </div>
        @endif
    </dl>

    <a class="text-blue-800 underline" href="/contacts/{{$contact->id}}/edit">{{__('Modify this Contact')}}</a>

    <form action="{{route('contact.destroy', $contact)}}" method="POST">

        @csrf
        @method('DELETE')

        <x-forms.controls.button :text="__('Delete this Contact')" color="bg-red-600"/>
    </form>

</x-layouts.main>
