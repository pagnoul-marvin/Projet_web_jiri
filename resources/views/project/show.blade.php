<x-layouts.main>

    <h1 class="font-bold text-2xl">{{$project->name}}</h1>

    <section>
        <h2 class="font-bold text-2xl">{{__('Project\'s info')}}</h2>

        <div>

            <h3 class="font-bold">{{__('Project\'s info')}}</h3>
            <p>{{$project->description}}</p>

        </div>

        <div>

            <h3 class="font-bold">{{__('Project\'s website')}}</h3>
            <a class="underline text-blue-500" href="{{$project->url}}">{{$project->url}}</a>

        </div>
    </section>

</x-layouts.main>
