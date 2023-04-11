@extends("layout.html")

@section("title","Verwaltung")
@push("body_classes","bg-slate-100 font-light")
@push("body_styles","margin: 0px;")

@section("body")

<div class="block md:flex w-screen lg:max-w-6xl mx-auto h-screen">
    <div class="md:w-80 md:h-full overflow-y-scroll text-center">
        <!-- Menu //-->
        <div class="text-sm flex items-center mt-5 text-slate-800 font-bold border-b border-slate-300 mx-8 pb-3">
            <div class="pr-3">
                <img src="{{ asset("logo.svg") }}" class="w-10">
            </div>
            <div class="flex flex-col items-start">
                <p>CIS</p>
                <p>Reports</p>
            </div>
        </div>

        <x-backend.menu />

    </div>
    <div class="w-full h-full overflow-y-scroll">
        <!-- Content //-->
        @yield("content")
    </div>
</div>

@endsection
