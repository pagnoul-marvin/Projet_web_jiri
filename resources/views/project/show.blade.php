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

        <x-forms.controls.button :text="__('Delete this Project')" color="bg-red-600"/>

    </form>

</x-layouts.main>
