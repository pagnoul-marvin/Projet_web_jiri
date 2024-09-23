<x-layouts.main>

    <form action="/project" method="post" class="flex flex-col gap-8">

        @csrf

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="name">{{__('Project\'s name')}}

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="name" name="name" value="{{old('name')}}" placeholder="Portfolio">

        </div>

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="description">{{__('Project\'s description')}}

                @error('description')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="description" name="description" value="{{old('description')}}"
                   placeholder="Le portfolio de Marvin">

        </div>

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="url">{{__('Project\'s website')}}

                @error('url')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>
            <input class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   required type="text" id="url" name="url" value="{{old('url')}}"
                   placeholder="portfolio.marvin.com">

        </div>

        <button class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase" type="submit">
            {{__('Create this Project')}}
        </button>

    </form>

</x-layouts.main>
