<x-layouts.main>

    <form action="/jiri" method="post">

        @csrf

        <label for="name">Jiri's name</label>
        <input type="text" id="name" name="name">


        <label for="starting_at">Jiri's starting at</label>
        <input type="text" id="starting_at" name="starting_at">

        <button type="submit">Create</button>

    </form>

</x-layouts.main>
