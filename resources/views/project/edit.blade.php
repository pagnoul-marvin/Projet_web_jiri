<x-layouts.main>

    <h1 class="font-bold text-2xl">{{__('Modify')}} {{$project->name}}</h1>
    <form action="{{route('project.update', $project)}}"
          method="POST"
          class="flex flex-col gap-6 bg-slate-50 rounded p-4">

        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-2">

            <label for="name" class="font-bold">{{__('Project\'s name')}}

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="name" name="name" value="{{__('Actual name')}} : {{$project->name}}">


        </div>
        <div class="flex flex-col gap-2">

            <label for="description" class="font-bold">{{__('Project\'s description')}}

                @error('description')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="description" name="description" value="{{__('Actual description')}} : {{$project->description}}">

        </div>

        <div class="flex flex-col gap-2">

            <label for="url" class="font-bold">{{__('Project\'s website')}}

                @error('url')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="url" name="url" value="{{__('Actual url')}} : {{$project->url}}">

        </div>

        <button class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"
                type="submit">{{__('Modify this Project')}}</button>

    </form>

</x-layouts.main>

