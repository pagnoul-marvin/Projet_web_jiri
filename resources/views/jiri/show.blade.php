<x-layouts.main>

    <h1 class="font-bold text-2xl">{{$jiri->name}}</h1>

    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">Jiri's name</dt>
            <dd>{{$jiri->name}}</dd>
        </div>
        <div>
            <dt class="font-bold">Starting at</dt>
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

</x-layouts.main>
