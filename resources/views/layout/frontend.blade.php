@extends("layout.html")

@section("title","Verwaltung")
@push("body_classes","bg-slate-100 font-light")
@push("body_styles","margin: 0px;")

@section("body")
    <div class="flex items-center">
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
            <div class="flex space-x-2 ml-auto">
                <div class="">
                    <a href="{{ route("application") }}" class="bg-slate-700 text-white p-1 px-3 rounded shadow-md text-sm"><i class="fa fa-home mr-2"></i>Dashbaord</a>
                </div>
                @if(!auth()->user()->group_user)
                <div class="">
                    <a href="{{ route("profile") }}" class="bg-slate-700 text-white p-1 px-3 rounded shadow-md text-sm"><i class="fa fa-user mr-2"></i>Profil</a>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->backend_access)
                <div class="ml-auto">
                    <a href="{{ route("backend") }}" class="bg-slate-700 text-white p-1 px-3 rounded shadow-md text-sm"><i class="fa fa-cog mr-2"></i>Verwaltung</a>
                </div>
                @endif
                <div class="ml-2">
                    <form action="{{ route("sign-out") }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-700 text-white p-1 px-3 rounded shadow-md text-sm"><i class="fa fa-sign-out mr-2"></i>Abmelden</button>
                    </form>
                </div>
            </div>
        </div>

        @yield("content")
    </div>

    <div class="bottom-0 fixed w-full text-center text-xs text-slate-600 pb-3">
        &copy; 2021 - {{ Carbon\Carbon::now()->year }} CisFoundation
    </div>
@endsection
