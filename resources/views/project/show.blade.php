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

    <a href="/projects/{{$project->id}}/edit" class="underline text-blue-800">{{__('Modify this Project')}}</a>

    <form action="{{route('project.destroy', $project)}}" method="POST">

        @csrf
        @method('DELETE')

        <button class="bg-red-500 font-bold text-white rounded-md p-2 px-4 uppercase tracking-wider" type="submit">{{__('Delete this Project')}}</button>

    </form>

</x-layouts.main>
