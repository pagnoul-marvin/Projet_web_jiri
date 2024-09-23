<x-layouts.main>

    <form action="/contact" method="post" class="flex flex-col gap-8">

        @csrf

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="name">{{__('Contact\'s name')}}

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="name" name="name" value="{{old('name')}}" placeholder="Jean">

        </div>

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="email">{{__('Contact\'s email')}}

                @error('email')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="email" name="email" value="{{old('email')}}"
                   placeholder="jean@gmail.com">

        </div>

        <button class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase" type="submit">
            {{__('Create this Contact')}}
        </button>

    </form>

</x-layouts.main>
