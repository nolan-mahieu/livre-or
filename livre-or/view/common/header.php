<div id="header">
    <div id="header-logo">
        <h1 id="logo">Drift race</h1>
    </div>

    <div id="header-github">
        <img id="logo-github" src="public/img/github.png" alt="logo github">
        <a id="github" href="https://github.com/nolan-mahieu/livre-or">livre-or</a>
    </div>

<nav role="navigation">
  <div id="menuToggle">
    <input type="checkbox" />

        <span>menu</span>

        <ul id="menu"> 
            
            <li><a href="?page=accueil">Acceuil</a></li>
            <?php 
            
            if($_SESSION) {
                echo ('
                    <li><a href="?page=livre-or">Livre d\'or</a></li>
                    <li><a href="?page=profil">Profil</a></li>
                    <li><a href="?page=deconnexion">Déconnexion</a></li>
                ');

            } else {
                echo ('
                    <li><a href="?page=livre-or">Livre d\'or</a></li>
                    <li><a href="?page=inscription">Inscription</a></li>
                    <li><a href="?page=connexion">Connexion</a></li>
                ');
            }

            ?>
        </ul> 
    </div>
</nav>
