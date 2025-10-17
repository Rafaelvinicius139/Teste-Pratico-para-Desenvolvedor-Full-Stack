<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header / Menu -->
<header class="bg-dark text-white py-3 shadow-sm">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="fs-3 fw-bold mb-2 mb-md-0">Sistema de Gestão</div>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="{{ route('Grupos') }}" class="text-white text-decoration-none">Grupos</a>
            <a href="{{ route('bandeira') }}" class="text-white text-decoration-none">Bandeira</a>
            <a href="{{ route('Unidade') }}" class="text-white text-decoration-none">Unidade</a>
            <a href="{{ route('colaborador') }}" class="text-white text-decoration-none">Colaborador</a>
            <a href="{{ route('RelatorioColaborador') }}" class="text-white text-decoration-none">Relatórios</a>
            <a href="{{ route('auditoria') }}" class="text-white text-decoration-none">Auditoria</a>
        </div>
    </div>
</header>

<!-- Seção de Cards / Funcionalidades -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <!-- Card Colaboradores -->
            <div class="col-md-4">
                <div class="card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-3 text-primary mb-3"></i>
                        <h4 class="card-title fw-bold">Colaboradores</h4>
                        <p class="card-text">Gerencie todos os colaboradores do sistema de forma prática e eficiente.</p>
                        <a href="{{ route('colaborador') }}" class="btn btn-primary btn-lg">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Card Unidades -->
            <div class="col-md-4">
                <div class="card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-building display-3 text-success mb-3"></i>
                        <h4 class="card-title fw-bold">Unidades</h4>
                        <p class="card-text">Visualize e administre todas as unidades da organização de forma organizada.</p>
                        <a href="{{ route('Unidade') }}" class="btn btn-success btn-lg">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Card Relatórios -->
            <div class="col-md-4">
                <div class="card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-file-earmark-bar-graph-fill display-3 text-warning mb-3"></i>
                        <h4 class="card-title fw-bold">Relatórios</h4>
                        <p class="card-text">Acesse relatórios detalhados de desempenho e auditoria rapidamente.</p>
                        <a href="{{ route('RelatorioColaborador') }}" class="btn btn-warning btn-lg text-white">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Card Bandeira -->
            <div class="col-md-4">
                <div class="card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-flag-fill display-3 text-danger mb-3"></i>
                        <h4 class="card-title fw-bold">Bandeira</h4>
                        <p class="card-text">Cadastre e gerencie bandeiras no sistema de forma rápida.</p>
                        <a href="{{ route('bandeira') }}" class="btn btn-danger btn-lg">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Card Auditoria -->
            <div class="col-md-4">
                <div class="card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-shield-check display-3 text-info mb-3"></i>
                        <h4 class="card-title fw-bold">Auditoria</h4>
                        <p class="card-text">Acompanhe auditorias e ações realizadas no sistema com facilidade.</p>
                        <a href="{{ route('auditoria') }}" class="btn btn-info btn-lg text-white">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
          <div class="card h-100 shadow-lg border-0 text-center">
              <div class="card-body">
                  <i class="bi bi-diagram-3-fill display-3 text-secondary mb-3"></i>
                  <h4 class="card-title fw-bold">Grupos</h4>
                  <p class="card-text">Gerencie os grupos econômicos do sistema de forma rápida e prática.</p>
                  <a href="{{ route('Grupos') }}" class="btn btn-secondary btn-lg text-white">Acessar</a>
              </div>
          </div>
      </div>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; {{ date('Y') }} Sistema de Gestão. Todos os direitos reservados.
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
