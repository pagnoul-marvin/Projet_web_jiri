<x-layouts.main>

    <form action="/jiri" method="post" class="flex flex-col gap-8">

        @csrf

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="name">{{__('Jiri\'s name')}}

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="name" name="name" value="{{old('name')}}" placeholder="Projets web">

        </div>

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="starting_at">{{__('Jiri\'s starting at')}}

                @error('starting_at')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="starting_at" name="starting_at" value="{{old('starting_at')}}"
                   placeholder="2024-12-12 18:00">

        </div>

        <x-forms.controls.button :text="__('Create this jiri')" color="bg-blue-600"/>

    </form>

</x-layouts.main>
