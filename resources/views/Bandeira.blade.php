<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bandeiras</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white mb-4 shadow-sm">
    <h1 class="h4 m-0">Gerenciar Bandeiras</h1>
    <a href="{{ route('home') }}" class="btn btn-outline-light d-flex align-items-center gap-2">
        <i class="bi bi-house-door-fill"></i> Início
    </a>
</header>

<!-- Mensagens de sucesso/erro -->
<div class="container mb-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</div>

<!-- Formulário de Cadastro -->
<div class="container mb-5">
    <div class="card p-4 shadow-sm border-0">
        <h5 class="mb-3">Cadastrar Nova Bandeira</h5>
        <form class="row g-3 align-items-end" action="{{ route('bandeira.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="nome" class="form-label fw-bold">Nome da Bandeira</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome da bandeira" required>
            </div>
            <div class="col-md-4">
                <label for="grupo_economico_id" class="form-label fw-bold">Grupo Econômico</label>
                <select name="grupo_economico_id" id="grupo_economico_id" class="form-select" required>
                    <option value="">Selecione um grupo</option>
                    @foreach($Nomes as $nome)
                        <option value="{{ $nome->id }}">{{ $nome->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-success d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-plus-circle-fill"></i> Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Tabela de Bandeiras -->
<div class="container mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Lista de Bandeiras</span>
            <i class="bi bi-flag-fill"></i>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle text-center m-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Bandeira</th>
                        <th>Grupo</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($band as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->nome }}</td>
                            <td>{{ $b->grupo->nome ?? 'Sem grupo' }}</td>
                            <td>{{ $b->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $b->updated_at->format('d/m/Y H:i') }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <!-- Botão Editar -->
                                <a href="{{ route('bandeiras.edit', $b->id) }}" 
                                   class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>
                                              <form action="{{ route('Bandeira.destroy', $b->id) }}" method="POST" onsubmit="return confirmarExclusao('{{ $b->nome }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i> Excluir
                                                </button>
                                            </form>
                                        
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">Nenhuma bandeira cadastrada ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
