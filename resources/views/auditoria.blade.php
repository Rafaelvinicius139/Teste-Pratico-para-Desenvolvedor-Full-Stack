<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoria do Sistema</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center p-3 mb-4 bg-dark text-white shadow-sm">
    <h1 class="h4 m-0">Auditoria do Sistema</h1>
    <a href="{{ route('home') }}" class="btn btn-outline-light d-flex align-items-center gap-2">
        <i class="bi bi-house-door-fill"></i> Início
    </a>
</header>

<div class="container py-4">

    <!-- Título e botão de exportar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Registro de Auditoria</h3>
        <a href="{{ route('auditoria.exportar') }}" class="btn btn-success d-flex align-items-center gap-2">
            <i class="bi bi-file-earmark-excel-fill"></i> Exportar para Excel
        </a>
    </div>

    <!-- Tabela de auditoria -->
    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-hover align-middle text-center mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Tabela</th>
                    <th>Ação</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditorias as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->user->nome ?? 'Desconhecido' }}</td>
                        <td>{{ $a->tabela }}</td>
                        <td>{{ $a->acao }}</td>
                        <td>{{ $a->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $auditorias->links() }}
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
