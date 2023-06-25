<?php require 'controller/connexionCTRL.php' ?>

<form action='#' method='post'>
    
    <h1>Connexion</h1>
    
    <br />

    <label for="login">Login</label>
    <input type="text" name="login" value="<?php if(isset($_POST['co'])) {echo htmlentities($_POST['login']);} ?>">
    <p class="error"><?= $msg['login'] ?></p>

    <label for="password">Password</label>
    <input type="password" name="password" value="<?php if(isset($_POST['co'])) {echo htmlentities($_POST['password']);} ?>">
    <p class="error"><?= $msg['pwd'] ?></p>

    <input type="submit" class="btn" name="co" value="Se Connecter"></input>
</form>