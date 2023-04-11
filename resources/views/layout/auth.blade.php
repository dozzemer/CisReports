@extends("layout.html")
@section("title","Anmelden")

@push("body_classes","w-full h-full bg-gradient-to-r from-slate-100 to-slate-400")

@section("body")
    <div class="max-w-3xl mx-5 md:mx-auto bg-white mt-10 shadow-md border-slate-500 rounded-2xl">
        <div class="grid grid-cols-2">
            <div class="p-8">

                <div class="text-4xl font-bold py-8 ml-3 text-blue-600">
                    Anmelden
                </div>

                @livewire("auth.signin")

                <div class="text-xs text-slate-400 mt-6">
                    <i class="fa fa-cog animate-spin"></i> V {{ config("app.version") }}
                </div>

            </div>
            <div class="p-8 bg-slate-400 hidden md:flex items-center justify-center rounded-r-2xl">
                <div class="bg-white h-52 w-52 rounded-full flex items-center justify-center text-blue-600" style="font-size:4em;">
                    <i class="fa fa-id-card"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-5 md:mx-auto mt-4 text-slate-400 text-xs">
        &copy; CisFoundation 2023 - {{ Carbon\Carbon::now()->year }} | CisReports
    </div>


@endsection
