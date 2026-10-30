<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="card border-0 shadow rounded-4">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <i class="fa-solid fa-key fa-3x text-primary mb-3"></i>
                            <h4 class="fw-bold">Ubah Password</h4>
                            <p class="text-muted small">
                                Masukkan password lama sebelum membuat password baru.
                            </p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('akun.updatePassword', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="password_lama" class="form-label fw-semibold">
                                    Password Lama
                                </label>

                                <input type="password" name="password_lama" id="password_lama" class="form-control"
                                    autocomplete="current-password" placeholder="Masukan password lama" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_baru" class="form-label fw-semibold">
                                    Password Baru
                                </label>

                                <input type="password" name="password_baru" id="password_baru" class="form-control"
                                    minlength="6" autocomplete="new-password" placeholder="Masukan password baru"
                                    required>

                                <small class="text-muted">
                                    Minimal 6 karakter.
                                </small>
                            </div>

                            <div class="mb-4">
                                <label for="password_baru_confirmation" class="form-label fw-semibold">
                                    Konfirmasi Password Baru
                                </label>

                                <input type="password" name="password_baru_confirmation" id="password_baru_confirmation"
                                    class="form-control" minlength="6" autocomplete="new-password"
                                    placeholder="Ulangi password baru" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-save"></i>
                                Simpan
                            </button>

                            <a href="{{ route('akun.index') }}" class="btn btn-light w-100 mt-2">
                                <i class="fa-solid fa-arrow-left"></i>
                                Kembali
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
