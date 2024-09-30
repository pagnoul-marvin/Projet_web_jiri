<x-layouts.main>

    <h1 class="font-bold text-2xl">{{__('Your projects')}}</h1>

    <section>
        <h2 class="font-bold">{{__('My projects')}}</h2>
        <ul>

            @foreach($projects as $project)

                <li><a class="underline text-blue-500" href="/projects/{{$project->id}}">{{$project->name}}</a></li>

            @endforeach

        </ul>
    </section>

    <a class="underline text-blue-800" href="/projects/create">{{__('Create a new Project')}}</a>

</x-layouts.main>
