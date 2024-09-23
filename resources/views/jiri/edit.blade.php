<x-layouts.main>

    <h1 class="font-bold text-2xl">{{'Modify'}} <?= $jiri->name ?></h1>
    <form action="{{route('jiri.update', $jiri)}}"
          method="POST"
          class="flex flex-col gap-6 bg-slate-50 rounded p-4">

        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-2">

            <label for="name" class="font-bold">{{__('Jiri\'s name')}}

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="name" name="name" value="{{__('Actual name')}} : {{$jiri->name}}">


        </div>
        <div class="flex flex-col gap-2">

            <label for="starting_at" class="font-bold">{{__('Starting at')}}

                @error('starting_at')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="starting_at" name="starting_at" value="{{__('Actual starting at')}} : {{$jiri->starting_at}}">

        </div>

        <button class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"
                type="submit">{{__('Modify this Jiri')}}</button>

    </form>

</x-layouts.main>
