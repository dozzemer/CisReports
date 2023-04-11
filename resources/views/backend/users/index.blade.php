@extends("layout.backend")

@section("content")
<div>
    @include("layout.error_success")
    <h1 class="text-slate-700 font-bold text-2xl my-6">Anwender verwalten</h1>

    <a href="{{ route("backend.users.create") }}" class="bg-green-600 text-white p-2 rounded shadow">Anwender anlegen</a>
    <a href="{{ route("backend.groupusers.create") }}" class="bg-blue-600 text-white p-2 rounded shadow">Gruppenanwender anlegen</a>
    <div class="bg-white rounded shadow p-4 mt-6">
        @livewire("backend.users.table")
    </div>
</div>
@endsection
