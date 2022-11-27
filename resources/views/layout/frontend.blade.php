@extends("layout.html")

@section("title","Verwaltung")
@push("body_classes","bg-slate-100 font-light")
@push("body_styles","margin: 0px;")

@section("body")
    <div class="flex items-center w-full">
            <div class="w-32">
                <img src="{{ asset('logo.svg') }}">
            </div>
            <div>
                <p class="text-2xl font-bold">
                    CisReports
                </p>
                <p>
                    @if(auth()->check())
                        Willkommen zurück, {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                    @else
                        Herzlich Willkommen!
                    @endif
                </p>
            </div>
        </div>

        @yield("content")
    </div>

    <div class="bottom-0 fixed w-full text-center text-xs text-slate-600 pb-3">
        &copy; 2021 - {{ Carbon\Carbon::now()->year }} CisFoundation
    </div>
@endsection
