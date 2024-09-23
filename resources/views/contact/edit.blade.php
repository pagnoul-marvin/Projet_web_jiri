<x-layouts.main>

    <h1 class="font-bold text-2xl">{{__('Modify')}} {{$contact->name}}</h1>
    <form action="{{route('contact.update', $contact)}}"
          method="POST"
          class="flex flex-col gap-6 bg-slate-50 rounded p-4">

        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-2">

            <label for="name" class="font-bold">{{__('Contact\'s name')}}

                @error('name')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="name" name="name" value="{{__('Actual name')}} : {{$contact->name}}">


        </div>
        <div class="flex flex-col gap-2">

            <label for="email" class="font-bold">{{__('Contact\'s email')}}

                @error('email')

                <span class="block text-red-500">{{$message}}</span>

                @enderror

            </label>

            <input required class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2"
                   type="text" id="email" name="email" value="{{__('Actual email')}} : {{$contact->email}}">

        </div>

        <button class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase"
                type="submit">{{__('Modify this Contact')}}</button>

    </form>

</x-layouts.main>

