<nav id="main-menu" class="font-bold">
    <h2 class="sr-only">{{$title}}</h2>
    <ul class="flex flex-col sm:flex-row gap-4 sm:gap-8 sm:items-center">
        @auth
            @foreach($links as $link)

                <li><a class="underline text-white uppercase tracking-wider"
                       href="{{$link['url']}}">{{ __($link['name']) }}</a></li>

            @endforeach

            @if(Route::has('logout'))

                <li>

                    <form method="POST" action="{{route('logout')}}">

                        @csrf

                        <button type="submit" class="underline text-white uppercase tracking-wider">

                            {{__('Logout')}}

                        </button>

                    </form>

                </li>

            @endif

            @if(Route::has('profile'))

                <li><a href="{{route('profile')}}"
                       class="underline text-white uppercase tracking-wider">{{__('Profile')}}</a></li>

            @endif

        @else

            @if(Route::has('login'))

                <li><a href="{{route('login')}}"
                       class="underline text-white uppercase tracking-wider">{{__('Login')}}</a></li>

            @endif

            @if(Route::has('register'))

                <li><a href="{{route('register')}}"
                       class="underline text-white uppercase tracking-wider">{{__('Register')}}</a></li>

            @endif

        @endauth
    </ul>
</nav>
