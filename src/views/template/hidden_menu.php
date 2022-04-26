<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user']->prenom . "  " . $_SESSION['user']->nom ?></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="saisie_des_fiches">Saisir une fiche de frais</a></li>
                <li><a class="dropdown-item" href="consulter_mes_fiches">Consulter mes fiches de frais</a></li>
                <li><a class="dropdown-item" href="modifier_mdp">Modifier mon mot de passe</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout"></i>Me déconnecter</a></li>
            </ul>
        </li>
    </ul>
</div>