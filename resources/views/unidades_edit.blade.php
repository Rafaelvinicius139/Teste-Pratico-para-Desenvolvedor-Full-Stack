<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Unidade</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white mb-4">
    <h1 class="h4 m-0">Editar Unidade</h1>
    <div>
        <a href="{{ route('home') }}" class="btn btn-dark text-white">
        <i class="bi bi-house-door-fill"></i> Início
         </a>
    </div>
</header>
<body class="bg-light">

<div class="container mt-5">
<form action="{{ route('unidade.update', $unidade->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h3 class="mb-3 text-center text-primary">Editar Unidade</h3>

    <div class="mb-3">
      <label for="nome_fantasia" class="form-label fw-bold">Nome Fantasia</label>
      <input type="text" id="nome_fantasia" name="nome_fantasia" class="form-control form-control-lg" value="{{ old('nome_fantasia', $unidade->nome_fantasia) }}" required>

      <label for="razao_social" class="form-label fw-bold mt-3">Razão Social</label>
      <input type="text" id="razao_social" name="razao_social" class="form-control form-control-lg" value="{{ old('razao_social', $unidade->razao_social) }}" required>

      <label for="cnpj" class="form-label fw-bold mt-3">CNPJ</label>
      <input type="text" id="cnpj" name="cnpj" class="form-control form-control-lg" value="{{ old('cnpj', $unidade->cnpj) }}" required>

     

     
    </div>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-success btn-lg d-flex align-items-center gap-2">
       <i class="bi bi-pencil-square"></i>  Salvar
      </button>
      <a href="{{ route('Unidade') }}" class="btn btn-secondary btn-lg d-flex align-items-center gap-2">
        <i class="bi bi-x-circle fs-5"></i> Cancelar
      </a>
    </div>
</form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
