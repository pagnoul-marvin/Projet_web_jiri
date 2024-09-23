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

</x-layouts.main>
