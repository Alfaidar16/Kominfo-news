{{-- <x-guest-layout> --}}
    <!-- Session Status -->
   {{-- @extends('guest.layouts.Guest') --}}
   {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

   <form method="POST" action="{{ route('login') }}">
       @csrf

       <!-- Email Address -->
       <div>
           <x-input-label for="email" :value="__('Email')" />
           <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
           <x-input-error :messages="$errors->get('email')" class="mt-2" />
       </div>

       <!-- Password -->
       <div class="mt-4">
           <x-input-label for="password" :value="__('Password')" />

           <x-text-input id="password" class="block mt-1 w-full"
                           type="password"
                           name="password"
                           required autocomplete="current-password" />

           <x-input-error :messages="$errors->get('password')" class="mt-2" />
       </div>

       <!-- Remember Me -->
       <div class="block mt-4">
           <label for="remember_me" class="inline-flex items-center">
               <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
               <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
           </label>
       </div>

       <div class="flex items-center justify-end mt-4">
           @if (Route::has('password.request'))
               <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                   {{ __('Forgot your password?') }}
               </a>
           @endif

           <x-primary-button class="ms-3">
               {{ __('Log in') }}
           </x-primary-button>
       </div>
   </form> --}}
{{-- </x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <link rel="icon" href="{{asset('/adminlte/assets/img/logo_kominfo.png')}}" />
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            padding: 0;
            margin: 0;
        }
        .left-side, .right-side {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            min-height: 100vh;
        }
        .left-side {
            background-color: #06b6d4;
            color: #fff;
        }
        .left-side img {
            max-width: 100px;
            height: auto;
            margin-bottom: 1rem;
        }
        .right-side {
            background-color: #ffffff;
        }
        .login-form {
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            /* box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); */
            width: 100%;
            max-width: 500px;
        }
        .footer-links {
            margin-top: 1rem;
            text-align: center;
        }
        .footer-links a {
            margin: 0 0.5rem;
            color: #6c757d;
            text-decoration: none;
        }
        .form-control {
            border-radius: 1rem;
            /* box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); */
            padding: 0.5rem;
            margin-bottom: 1rem;
            background: #f4f4f5
        }
    </style>
</head>
<body>
    <div class="container-fluid login-container">
        <div class="row w-100 m-0">
            <div class="col-md-6 left-side">
                <img src="{{asset('/adminlte/assets/img/logo_kominfo.png')}}" alt="Logo">
                <h2>Dinas Komunikasi Informatika,</h2>
                <h2>Statistika dan Persandian</h2>
                <h3>PROVINSI SULAWESI SELATAN</h3>
            </div>
            <div class="col-md-6 right-side">
                <div class="login-form">
                    <h2 class="mb-4 text-center">Selamat Datang</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                 
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid
                                
                            @enderror" id="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid
                                
                            @enderror" id="password" >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill p-2">Login</button>
                            <a href="/" class="btn btn-danger rounded-pill p-2 mt-3">Halaman Utama</a>
                        </div>
                    </form>
                    {{-- <div class="footer-links" style="margin-top: 400px;">
                        <a href="#">About</a>
                        <a href="#">Support</a>
                        <a href="#">Purchase</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>