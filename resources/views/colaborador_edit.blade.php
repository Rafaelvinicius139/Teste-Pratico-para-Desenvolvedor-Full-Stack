<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar colaborador</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white mb-4">
    <h1 class="h4 m-0">Colaborador</h1>
    <div>
        <a href="{{ route('home') }}" class="btn btn-dark text-white">
            <i class="bi bi-house-door-fill"></i> Início
        </a>
    </div>
</header>

<body class="bg-light">

<div class="container mt-5">
<form action="{{ route('Colaborador.update', $col->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h3 class="mb-3 text-center text-primary">Editar Colaborador</h3>

    <div class="mb-3">
        <label for="nome" class="form-label fw-bold">Nome</label>
        <input type="text" id="nome" name="nome" class="form-control form-control-lg" value="{{ old('nome', $col->nome) }}" required>

        <label for="email" class="form-label fw-bold mt-3">Email</label>
        <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ old('email', $col->email) }}" required>

        <label for="cpf" class="form-label fw-bold mt-3">CPF</label>
        <input type="text" id="cpf" name="cpf" class="form-control form-control-lg" value="{{ old('cpf', $col->cpf) }}" required>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success btn-lg d-flex align-items-center gap-2">
            <i class="bi bi-pencil-square"></i> Salvar
        </button>


        <a href="{{route('colaborador')}}" class="btn btn-secondary btn-lg d-flex align-items-center gap-2">
            <i class="bi bi-x-circle fs-5"></i> Cancelar
        </a>
    </div>
</form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
