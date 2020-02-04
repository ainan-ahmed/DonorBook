<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'DonorBook') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0b40333001.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <div id="app">
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <div class="col" style="background-color:lightblue">
                <li class="float-right">
                    Already a donor? <a class="" href="{{ route('login') }}">Sign in</a> to continue


                </li>
            </div>
            @else
            <li class="nav-item dropdown col" style="background-color:lightblue">
                <a id="navbarDropdown" class="nav-link dropdown-toggle float-right" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Hello {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}">
                        Profile
                    </a>
                </div>


    </div>
    </li>
    @endguest
    </ul>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:skyblue">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{asset('img/navlogo-black.png')}}" alt="" width="120px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('donateBlood') }}">Why Donate Blood?</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Become a donor') }}</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
            </ul>

            <bold style="padding-right:10px"> Follow us</bold>
            <a class="socialIcon" href="http://www.facebook.com"><i class="fab fa-facebook fa-lg"> </i></a>
            <a class="socialIcon" href="http://twitter.com"><i class="fab fa-twitter fa-lg"></i></a>
            <a class="socialIcon" href="http://instagram.com"><i class="fab fa-instagram fa-lg"></i></a>
        </div>
    </nav>



    <main class="py-4">


        <div class="col form-group">
            <label for="blood_group"
                class="col-md-2 col-form-label text-md-right float-left">{{ __('Blood Group') }}</label>
            <div class="col-md-4 float-left">
                <select class="browser-default custom-select" id="blood_group" name="blood_group"
                    onchange="getBlood(this)">
                    <option disabled selected>Select blood group</option>
                    <option value="All">All</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>

                </select>
                @error('blood_group')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <label for="division" class="col-1 col-form-label text-md-right float-left">{{ __('Division') }}</label>
            <div class="col-md-4 float-left">
                <select class="browser-default custom-select" id="division" name="division" onchange="getDivision(this)">
                    <option disabled selected>Select division</option>
                    <option value="All">All</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Sylhet">Sylhet</option>
                </select>
                @error('division')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>
           <table class="table table-bordered table-hover mt-3">
                <thead >

                </thead>
                <tbody>

                
                </tbody>
           </table>

        
        <script type="text/javascript">
            function getBlood(val) {
                let blood = val.options[val.selectedIndex].value;
                let tmp = document.getElementById('division');
                let division = tmp.options[tmp.selectedIndex].value;
                $.ajax({
                    method: 'GET',
                    url: "{{ route('donorList') }}",
                    data: {
                        blood: blood,
                        division: division,
                    },
                    success: function (data) {
                        //console.log(data.head);
                        $('thead').html(data.head);
                        $('tbody').html(data.body);
                    }

                })

            };


            function getDivision(val) {
                let division = val.options[val.selectedIndex].value;
                let tmp = document.getElementById('blood_group');
                let blood = tmp.options[tmp.selectedIndex].value;
                $.ajax({
                    method: 'GET',
                    url: "{{ route('donorList') }}",
                    data: {
                        blood: blood,
                        division: division,
                    },
                    success: function (data) {
                        //console.log(data.head);
                        $('thead').html(data.head);
                        $('tbody').html(data.body);
                    }

                })
            }

        </script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });

        </script>

    </main>
    </div>
</body>

</html>
