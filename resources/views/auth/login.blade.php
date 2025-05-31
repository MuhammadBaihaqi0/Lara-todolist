@extends('layouts.app')

@section('content')
    <head>
        <!-- Google Font: Poppins -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            body {
                background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
                font-family: 'Poppins', sans-serif;
            }

            .auth-card {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                color: #fff;
            }

            .form-control,
            .input-group-text {
                background-color: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                color: #fff;
            }

            .form-control::placeholder {
                color: #ccc;
            }

            .form-control:focus {
                box-shadow: 0 0 0 2px #9f7aea;
            }

            .btn-purple {
                background: linear-gradient(135deg, #9f7aea, #6b46c1);
                border: none;
                color: white;
                font-weight: bold;
                transition: all 0.3s ease;
            }

            .btn-purple:hover {
                background: linear-gradient(135deg, #b794f4, #553c9a);
            }

            .link-purple {
                color: #c084fc;
                text-decoration: none;
            }

            .link-purple:hover {
                text-decoration: underline;
            }

            .feature-icon {
                color: #9f7aea;
                font-size: 1.2rem;
            }

            .text-light {
                color: #ddd !important;
            }
        </style>
    </head>

    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body p-4 p-md-5">

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="text-center mb-4">
                                <h2 class="fw-bold text-white mb-2">🗂️ To_Do_List Baihaqi</h2>
                                <p class="text-light">Masuk ke akun Anda</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" name="login"
                                            class="form-control @error('login') is-invalid @enderror"
                                            placeholder="Email atau Username" value="{{ old('login') }}" required autofocus>
                                    </div>
                                    @error('login')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-key"></i>
                                        </span>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" required>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-purple w-100 mb-3">
                                    <span class="d-flex align-items-center justify-content-center">
                                        Masuk
                                        <i class="ms-2 bi bi-box-arrow-in-right"></i>
                                    </span>
                                </button>

                                <div class="text-center mt-2">
                                    <a href="{{ route('register') }}" class="link-purple">
                                        Belum Punya Akun? Daftar Sekarang
                                    </a>
                                </div>

                                <div class="mt-4 pt-4 border-top border-secondary">
                                    <div class="row g-4">
                                        @foreach (['Task Management', 'Progress Tracking', 'Team Collaboration', 'Priority Settings'] as $feature)
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="feature-icon me-2"><i class="bi bi-check-circle-fill"></i></div>
                                                    <span class="small text-light">{{ $feature }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
