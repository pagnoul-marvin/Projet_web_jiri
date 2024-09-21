<x-layouts.main>

    <h1 class="font-bold text-2xl">Your Jiris</h1>

    <section>

        <h2 class="font-bold">Upcoming Jiris</h2>

        <x-jiris.list :jiris="$upcomingJiris"/>

    </section>

    <section>

        <h2 class="font-bold">Past Jiris</h2>

        <x-jiris.list :jiris="$pastJiris"/>

    </section>

    <a class="underline text-blue-800" href="/jiris/create">Create a new Jiri</a>

</x-layouts.main>


