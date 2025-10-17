<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Colaboradores</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white shadow-sm mb-4">
    <h1 class="h4 m-0">Relatório de Colaboradores</h1>
    <a href="{{ route('home') }}" class="btn btn-light d-flex align-items-center gap-2">
        <i class="bi bi-house-door-fill"></i> Início
    </a>
</header>

<div class="container">

    <!-- FILTRO -->
    <div class="card p-4 mb-4 shadow-sm">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-6">
                <label for="unidade_id" class="form-label fw-bold">Filtrar por Empresa</label>
                <select name="unidade_id" id="unidade_id" class="form-select">
                    <option value="">Todas as empresas</option>
                    @foreach($trabalho as $t)
                        <option value="{{ $t->id }}" {{ request('unidade_id') == $t->id ? 'selected' : '' }}>
                            {{ $t->nome_fantasia }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary mt-2">
                    <i class="bi bi-search"></i> Filtrar
                </button>
            </div>

            {{-- Excel / PDF futuramente --}}
            {{-- 
            <div class="col-md-2 d-grid">
                <a href="{{ route('Relatorio_Colaboradores_Export', ['unidade_id' => request('unidade_id')]) }}" class="btn btn-success mt-2">
                    <i class="bi bi-file-earmark-excel"></i> Excel
                </a>
            </div>
            <div class="col-md-2 d-grid">
                <a href="{{ route('Relatorio_Colaboradores_Pdf', ['unidade_id' => request('unidade_id')]) }}" class="btn btn-danger mt-2">
                    <i class="bi bi-file-earmark-pdf"></i> PDF
                </a>
            </div>
            --}}
        </form>
    </div>

    <!-- TABELA DOS COLABORADORES -->
    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-hover align-middle text-center mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trabalhador as $tr)
                    <tr>
                        <td>{{ $tr->nome }}</td>
                        <td>{{ $tr->email ?? '-' }}</td>
                        <td>{{ $tr->con->nome_fantasia ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-3">Nenhum colaborador encontrado para esta empresa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>