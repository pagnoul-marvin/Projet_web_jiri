<x-layouts.main>

    <h1 class="font-bold text-2xl">{{__('Your Jiris')}}</h1>

    <section>

        <h2 class="font-bold">{{__('Upcoming Jiris')}}</h2>

        <x-jiris.list :jiris="$upcomingJiris"/>

    </section>

    <section>

        <h2 class="font-bold">{{__('Past Jiris')}}</h2>

        <x-jiris.list :jiris="$pastJiris"/>

    </section>

    <a class="underline text-blue-800" href="/jiris/create">{{__('Create a new Jiri')}}</a>

</x-layouts.main>


