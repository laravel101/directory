@extends("frontend.layout.master")

@section("body")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>

                <div class="col-md-4">
                    @include("frontend.include.sidebar")
                </div>
            </div>
        </div>
    </section>
@stop