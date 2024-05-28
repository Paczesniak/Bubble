@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5 mx-auto w-25">
        <h1 class="text-white">Register</h1>
        <form action="{{ route('register') }}" method="POST" class="mt-3" id="registerForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-white">Name:</label>
                <input type="text" name="name" id="name" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email:</label>
                <input type="email" name="email" id="email" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password:</label>
                <input type="password" name="password" id="password" class="form-control bg-dark text-white" required minlength="8">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label text-white">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-dark text-white" required minlength="8">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var form = event.target;
            var password = form.password.value;
            var confirmPassword = form.password_confirmation.value;

            if (password !== confirmPassword) {
                event.preventDefault();
                alert('Passwords do not match.');
            }
        });
    </script>
@endsection
