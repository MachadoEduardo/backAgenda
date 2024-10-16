<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../agenda/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>AgendaSENAC</title>
    <style>
    /* Imagem de fundo do header */
    .header-bg {
        background-image: url('../agenda/img/luxa.org-opacity-changed-236-74f7c320108e407fd812efca960441a01.jpg');
        background-size: cover;
        background-position: center;
        height: 450px;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        filter: brightness(70%);
    }

    /* Estilização do conteúdo do header */
    .header-content {
        text-align: center;
        padding: 150px 20px;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        position: relative;
    }

    /* Estilização geral de textos */
    h1,
    h5 {
        font-family: 'Roboto', sans-serif;
    }

    /* Estilização das seções */
    .main-content {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .section-title {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        margin-bottom: 40px;
    }

    .section-content p {
        font-family: 'Roboto', sans-serif;
        font-size: 1rem;
        line-height: 1.6;
    }

    .section-content {
        margin-bottom: 20px;
    }

    /* Estilização dos botões */
    button.btn-secondary {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button.btn-secondary:hover {
        background-color: #343a40;
        transform: scale(1.05);
    }

    /* Espaçamento e alinhamento do footer */
    footer {
        padding: 20px 0;
        background-color: #343a40;
        color: white;
    }

    footer a {
        color: #adb5bd;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body class="bg-light">

    <!-- Header -->
    <div class="header-bg"></div>
    <header class="container bg-dark mt-4 rounded d-flex justify-content-between align-items-center py-2">
        <div class="d-flex align-items-center">
            <p class="text-white fs-3 fw-bold mb-0">AgendaSENAC</p>
        </div>
        <div class="d-flex align-items-center">
            <div class="dropdown me-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Serviços
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <h6 class="dropdown-header">Tópicos</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Agenda</a></li>
                    <li><a class="dropdown-item" href="#">Eventos</a></li>
                    <li><a class="dropdown-item" href="#">Lembranças</a></li>
                    <li><a class="dropdown-item" href="#">Sobre Nós</a></li>
                </ul>
            </div>
            <div class="dropdown me-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Acessar
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <h6 class="dropdown-header">Modo</h6>
                    </li>
                    <li><a class="dropdown-item" href="adminLogin.php">Administrativo</a></li>

                    <li><a class="dropdown-item" href="usuarioLogin.php">Usuário</a></li>
                </ul>
            </div>


        </div>
    </header>