<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des examens</title>
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- ☰ BOUTON 3 TIRETS À GAUCHE -->
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- CONTENU -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU AU CENTRE -->
            <ul class="navbar-nav  gap-4">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('filiere.index')}}">Filières</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('cours.index')}}">Cours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('etudiant.index')}}">Étudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('examen.index')}}">Examens</a>
                </li>
            </ul>

            <!-- CONNEXION / INSCRIPTION À DROITE -->
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm" href="#">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-warning btn-sm" href="#">Inscription</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <!-- Tout le code ici-->
    @yield('content')
</div>
</body>
</html>