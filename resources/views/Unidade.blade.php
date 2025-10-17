<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Listagem de Unidades</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white shadow-sm mb-4">
    <h1 class="h4 m-0">Cadastrar Unidade</h1>
    <div>
        <a href="{{ route('home') }}" class="btn btn-dark d-flex align-items-center gap-2">
            <i class="bi bi-house-door-fill"></i> Início
        </a>
    </div>
</header>

<!-- Formulário de Cadastro -->
<div class="container mb-5">
    <div class="card p-4 shadow-sm">
        <form class="row g-3 align-items-end" action="{{ route('unidade.store') }}" method="POST">
            @csrf
            <div class="col-md-3">
                <label for="nome_fantasia" class="form-label fw-bold">Nome Fantasia</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" placeholder="Nome" required>
            </div>
            <div class="col-md-3">
                <label for="razao_social" class="form-label fw-bold">Razão Social</label>
                <input type="text" name="razao_social" id="razao_social" class="form-control" placeholder="Razão Social" required>
            </div>
            <div class="col-md-2">
                <label for="cnpj" class="form-label fw-bold">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ" required>
            </div>
            <div class="col-md-3">
                <label for="bandeira_id" class="form-label fw-bold">Bandeira</label>
                <select class="form-select" name="bandeira_id" id="bandeira_id" required>
                    <option value="">Selecione uma bandeira</option>
                    @foreach($ban as $Ba)
                        <option value="{{ $Ba->id }}">{{ $Ba->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 d-grid">
                <button type="submit" class="btn btn-success mt-2"><i class="bi bi-plus-lg"></i> Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<!-- Tabela de Unidades -->
<div class="container mb-5">
    <div class="table-responsive shadow-sm">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>CNPJ</th>
                    <th>Nome</th>
                    <th>Razão Social</th>
                    <th>Bandeira</th>
                    <th>Data de Criação</th>
                    <th>Última Atualização</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unidade as $u)
                <tr>
                    <td>{{ $u->cnpj }}</td>
                    <td>{{ $u->nome_fantasia }}</td>
                    <td>{{ $u->razao_social }}</td>
                    <td>{{ $u->ban->nome ?? 'Sem grupo' }}</td>
                    <td>{{ $u->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $u->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('unidade.update', $u->id) }}" class="btn btn-warning text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('Unidade.destroy', $u->id) }}" method="POST" 
                              onsubmit="return confirm('Atenção: se você apagar esta Unidade, todos os Colaboradores serão excluídos!');">
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
