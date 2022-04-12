<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')
    @include('layouts.partials.css')

</head>

<body>
    <section class="vh-200" style="background-color:#b2b2ec;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </section>

    @include('layouts.partials.footer-scripts')

</body>

</html>