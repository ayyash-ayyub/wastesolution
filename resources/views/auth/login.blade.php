<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Waste Management Sistem</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind (via CDN for quick styling helpers) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: #f5f6fa; }
    </style>
</head>
<body class="min-h-screen d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
                        <h4 class="fw-semibold">Waste Management Sistem</h4>
                        <p class="text-muted mb-0">Silakan masuk ke akun Anda</p>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <form method="POST" action="{{ route('login.post') }}" class="space-y-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email atau Username</label>
                                <input type="text" name="login" class="form-control" placeholder="contoh: sakti atau sakti@dahanawastesolution.com" value="{{ old('login') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Ingat saya</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

