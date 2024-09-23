<x-layouts.main>

    <h1 class="font-bold text-2xl">{{$jiri->name}}</h1>

    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">{{__('Jiri\'s name')}}</dt>
            <dd>{{$jiri->name}}</dd>
        </div>
        <div>
            <dt class="font-bold">{{__('Starting at')}}</dt>
            <dd>{{$jiri->starting_at->diffForHumans()}}
            </dd>
            <dd>
                <time datetime="{{$jiri->starting_at}}">
                    on {{$jiri->starting_at->format('d M y')}}
                    at {{$jiri->starting_at->format('H:i')}}
                </time>
            </dd>
        </div>
    </dl>

    <a href="/jiris/{{$jiri->id}}/edit" class="underline text-blue-800">{{__('Modify this Jiri')}}</a>

    <form action="{{route('jiri.destroy', $jiri)}}"
          method="post">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="bg-red-500 font-bold text-white rounded-md p-2 px-4 uppercase tracking-wider">{{__('Delete this Jiri')}}</button>

    </form>

</x-layouts.main>
