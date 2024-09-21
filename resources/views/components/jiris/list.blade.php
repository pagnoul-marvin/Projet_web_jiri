@props(['jiris'])

<ol>

    @foreach($jiris as $jiri)

        <li><a class="underline text-blue-500" href="/jiris/{{$jiri->id}}">{{$jiri->name}}</a></li>

    @endforeach

</ol>
