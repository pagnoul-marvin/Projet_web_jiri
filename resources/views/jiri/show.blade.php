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

    <div>

        <h2 class="font-bold">{{__('Evaluators')}} :</h2>

        <ul class="flex gap-5 flex-col mb-5">

            @foreach($jiri->evaluators as $evaluator)

                <li class="flex gap-2 items-center">
                    <a href="{{route('contact.show', $evaluator->id)}}"
                       class="underline text-blue-500">{{$evaluator->name}}</a>
                    <form action="{{route('attendance.update', $evaluator->pivot->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="role" value="{{\App\Enums\ContactRoles::Student->value}}">
                        <x-forms.controls.button :text="__('Change to student')" color="bg-blue-600"/>
                    </form>
                </li>

            @endforeach

        </ul>

    </div>

    <div>

        <h2 class="font-bold mb-5">{{__('Students')}} :</h2>

        <ul class="flex gap-5 flex-col">

            @foreach($jiri->students as $student)

                <li class="flex gap-2 items-center">
                    <a href="{{route('contact.show', $student->id)}}"
                       class="underline text-blue-500">{{$student->name}}</a>
                    <form action="{{route('attendance.update', $student->pivot->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="role" value="{{\App\Enums\ContactRoles::Evaluator->value}}">
                        <x-forms.controls.button :text="__('Change to evaluator')" color="bg-blue-600"/>
                    </form>
                </li>

            @endforeach

        </ul>

    </div>

    <div>

        <h2 class="font-bold mb-5">{{__('Here is the projects for this Jiri')}}</h2>

        <ul class="flex gap-5 flex-col">

            @foreach($jiri->projects as $project)

                <li class="flex gap-2 items-center">
                    <a class="underline text-blue-500"
                       href="{{route('project.show', $project->id)}}">{{$project->name}}</a>
                    <form action="{{route('assignement.destroy', $project->pivot->id)}}" method="POST">

                        @csrf
                        @method('DELETE')

                        <x-forms.controls.button color="bg-red-600" :text="__('Delete this Project from this Jiri')"/>

                    </form>
                </li>

            @endforeach

        </ul>

    </div>

    <div class="font-black mb-5">

        <h2 class="font-bold mb-5">{{__('Add Projects to your Jiri')}}</h2>

        <ul class="flex gap-5 flex-col">

            @foreach($remaining_projects as $project)

                <li class="flex gap-2 items-center">

                    <a class="underline text-blue-500"
                       href="{{route('project.show', $project->id)}}">{{$project->name}}</a>
                    <form action="{{route('assignement.store')}}" method="POST">

                        @csrf

                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <input type="hidden" name="jiri_id" value="{{$jiri->id}}">

                        <x-forms.controls.button color="bg-blue-600" :text="__('Add this Project to your Jiri')"/>

                    </form>

                </li>

            @endforeach

        </ul>

    </div>

    @can('update', $jiri)

        <a href="/jiris/{{$jiri->id}}/edit" class="underline text-blue-800">{{__('Modify this Jiri')}}</a>

    @endcan

    @can('delete', $jiri)

        <form action="{{route('jiri.destroy', $jiri)}}"
              method="post">
            @csrf
            @method('DELETE')

            <x-forms.controls.button :text="__('Delete this Jiri')" color="bg-red-600"/>
        </form>

    @endcan

</x-layouts.main>
