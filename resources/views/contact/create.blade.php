<x-layouts.main>

    <form action="/contact" method="post" enctype="multipart/form-data" class="flex flex-col gap-8">

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

        <div class="flex flex-col gap-2">

            <label class="font-bold" for="photo">{{__('Contact\'s photo')}}

                @error('photo')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input class="border border-grey-700 rounded-md p-2" type="file" id="photo" name="photo">

        </div>

        <x-forms.controls.button :text="__('Create this Contact')" color="bg-blue-600"/>

    </form>

</x-layouts.main>
