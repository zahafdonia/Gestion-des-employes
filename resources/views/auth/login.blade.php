@extends('layouts.app')
@section('content')
<body>
    <!-- Image d'arrière-plan -->
    <div class="background"></div>
    <div class="overlay"></div>

    <!-- Conteneur du formulaire -->
    <div class="login-container">
        <!-- Logo -->
        <img src="/images/logo-removebg-preview.png" alt="Logo" class="logo">
   

        <!-- Formulaire de connexion -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
@endsection
