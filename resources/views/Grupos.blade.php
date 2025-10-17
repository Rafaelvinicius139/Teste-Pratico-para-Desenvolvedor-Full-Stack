<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Grupos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white shadow-sm mb-4">
    <h1 class="h4 m-0">Cadastrar Grupos</h1>
    <a href="{{ route('home') }}" class="btn btn-dark d-flex align-items-center gap-2">
        <i class="bi bi-house-door-fill"></i> Início
    </a>
</header>

<!-- Formulário de Cadastro -->
<div class="container mb-5">
    <div class="card p-4 shadow-sm">
        <form class="d-flex gap-2 flex-wrap" action="{{ route('Grupos.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="flex-grow-1">
                <input type="text" name="nome" class="form-control form-control-lg" placeholder="Nome do Grupo" required>
            </div>
            <button type="submit" class="btn btn-success btn-lg d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Cadastrar
            </button>
        </form>
    </div>
</div>

<!-- Tabela de Grupos -->
<div class="container">
    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-hover align-middle text-center mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->id }}</td>
                    <td>{{ $grupo->nome }}</td>
                    <td>{{ $grupo->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $grupo->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" onsubmit="return confirm('Deseja Apagar esse grupo {{ $grupo->nome }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
