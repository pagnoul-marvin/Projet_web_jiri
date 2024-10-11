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

        <div>

            <h2 class="font-black mb-5">{{__('List of contacts that you can add to your new Jiri')}}</h2>

            <ul class="flex-col flex gap-5">

                @foreach($contacts as $contact)

                    <li class="flex flex-row gap-3 items-center">

                        <input id="c-{{$contact->id}}" type="checkbox" name="contacts[]" class="h-4 w-4" value="{{$contact->id}}">
                        <label for="c-{{$contact->id}}">{{$contact->name}}</label>

                        <select name="role-{{$contact->id}}" id="role-{{$contact->id}}" class="rounded">

                            <option value="{{\App\Enums\ContactRoles::Student->value}}">{{__('Students')}}</option>
                            <option value="{{\App\Enums\ContactRoles::Evaluator->value}}">{{__('Evaluators')}}</option>

                        </select>

                        <label for="role-{{$contact->id}}" class="font-bold sr-only">{{__('Role')}}</label>

                    </li>

                @endforeach

            </ul>

        </div>

        <x-forms.controls.button :text="__('Create this jiri')" color="bg-blue-600"/>

    </form>

</x-layouts.main>
