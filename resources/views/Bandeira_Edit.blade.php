<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Bandeira</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="mb-4">Editar Bandeira</h3>

    <form action="{{ route('bandeiras.update', $band->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Bandeira</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $band->nome }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('bandeira') }}" class="btn btn-secondary">Voltar</a>
    </form>
  </div>
</div>

</body>
</html>
