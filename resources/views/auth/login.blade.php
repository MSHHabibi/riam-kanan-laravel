@extends('layouts.app')

@section('content')
<div class="login">
    <form class="loginbox" method="post">
        @csrf

        <div class="brand">
            <div class="logo">🌊</div>
            <h2>Login Admin</h2>
        </div>

        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <input
            name="email"
            type="email"
            value="admin@riamkanan.test"
            placeholder="Email"
        >

        <input
            name="password"
            type="password"
            value="password"
            placeholder="Password"
        >

        <button style="width:100%">
            Login
        </button>
    </form>
</div>
@endsection