<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Colaborador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm rounded-4 p-4 bg-white">

          <div class="text-center mb-4">
            <h2 class="fw-bold">Login</h2>
            <p class="text-secondary mb-0">Digite seu email Corporativo</p>
          </div>

          <!-- Exibe erros -->
          @if (session('error'))
            <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
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

          <form method="POST" action="{{ route('login.processo') }}">
            @csrf
            <div class="mb-3">
              <label for="login" class="form-label">Email</label>
              <input type="text" name="login" id="login"
                class="form-control"
                placeholder="Digite seu Email" required>
            </div>

            <div class="d-grid mb-3 mt-4">
              <button type="submit" class="btn btn-success fw-semibold py-2">
                Entrar
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
