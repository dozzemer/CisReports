@extends("layout.initial-login")

@section("content")
    @include("layout.error_success")
    <form action="{{ route("initial-login.send-code") }}" method="POST">
        @csrf
        <div class="cis-form-group">
            <label for="code">Willkommenscode:</label>
            <input type="text" name="code" placeholder="Code eingeben..." value="{{ old("code") }}">
        </div>

        <button type="submit" class="cis-submit">Senden</button>
    </form>
@endsection
