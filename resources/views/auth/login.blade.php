@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5 mx-auto w-25">
        <h1 class="text-white">Login</h1>
        <form action="{{ route('login') }}" method="POST" class="mt-3" id="loginForm">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email:</label>
                <input type="email" name="email" id="email" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password:</label>
                <input type="password" name="password" id="password" class="form-control bg-dark text-white" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            var form = event.target;
            var email = form.email.value;
            var password = form.password.value;

            if (!validateEmail(email)) {
                event.preventDefault();
                alert('Please enter a valid email address.');
            }

            if (password.length < 8) {
                event.preventDefault();
                alert('Password must be at least 8 characters long.');
            }
        });

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
@endsection
