<x-layouts.main>

    <form action="/jiri" method="post" class="flex flex-col gap-8">

        @csrf

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="name">Jiri's name

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="name" name="name" value="{{old('name')}}" placeholder="Projets web">

        </div>

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="starting_at">Jiri's starting at

                @error('starting_at')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="starting_at" name="starting_at" value="{{old('starting_at')}}"
                   placeholder="2024-12-12 18:00">

        </div>

        <button class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase" type="submit">
            {{__('Create this jiri')}}
        </button>

    </form>

</x-layouts.main>
