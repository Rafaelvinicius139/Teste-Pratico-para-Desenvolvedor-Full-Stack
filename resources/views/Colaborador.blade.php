<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Colaboradores</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Linhas alternadas suaves */
        .table-hover tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
        .badge-unidade {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="bg-light">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white shadow-sm mb-4">
    <h1 class="h4 m-0">Cadastrar Colaborador</h1>
    <a href="{{ route('home') }}" class="btn btn-dark d-flex align-items-center gap-2">
        <i class="bi bi-house-door-fill"></i> Início
    </a>
</header>

<!-- Formulário de Cadastro -->
<div class="container mb-5">
    <div class="card p-4 shadow-sm">
        <form class="row g-4 align-items-end" action="{{ route('colaborador.store') }}" method="POST" style="width:100%;">
            @csrf
            <div class="col-md-3">
                <label for="nome" class="form-label fw-bold">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control form-control-lg" placeholder="Nome" required>
            </div>
            <div class="col-md-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required>
            </div>
            <div class="col-md-2">
                <label for="cpf" class="form-label fw-bold">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control form-control-lg" placeholder="CPF" required>
            </div>
            <div class="col-md-3">
                <label for="unidade_id" class="form-label fw-bold">Unidade</label>
                <select name="unidade_id" id="unidade_id" class="form-select form-select-lg" required>
                    <option value="">Selecione a Unidade</option>
                    @foreach($banco as $Ba)
                        <option value="{{ $Ba->id }}">{{ $Ba->nome_fantasia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 d-grid">
                <button type="submit" class="btn btn-success btn-lg d-flex align-items-center gap-1">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Tabela de Colaboradores -->
<div class="container">
    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-hover align-middle text-center mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Unidade</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($col as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->nome }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->cpf }}</td>
                    <td>
                        @if($c->con)
                            <span class="badge bg-primary badge-unidade">{{ $c->con->nome_fantasia }}</span>
                        @else
                            <span class="badge bg-secondary badge-unidade">Sem grupo</span>
                        @endif
                    </td>
                    <td>{{ $c->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $c->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('colaborador_edit', $c->id) }}" class="btn btn-warning text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('Colaborador.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este colaborador?');">
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