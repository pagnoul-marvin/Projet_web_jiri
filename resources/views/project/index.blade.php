<x-layouts.main>

    <h1 class="font-bold text-2xl">Your projects</h1>

    <section>
        <h2 class="font-bold">My projects</h2>
        <ul>

            @foreach($projects as $project)

                <li><a class="underline text-blue-500" href="/projects/{{$project->id}}">{{$project->name}}</a></li>

            @endforeach

        </ul>
    </section>

</x-layouts.main>
