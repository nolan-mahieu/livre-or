<?php require 'controller/inscriptionCTRL.php'; ?>

<form action="" method="POST">
    
    <h1>Inscription</h1>

    <br />

    <label for="login">Login</label>
    <input type="text" name="login" value="<?php if(isset($_POST['ins'])) {echo $login;} ?>">
    <p class="error"><?= $msg['login'] ?></p>

    <label for="password">Password</label>
    <input type="password" name="password">
    <p class="error"><?= $msg['pwd'] ?></p>

    <label for="confirm-password">Confirm password</label>
    <input type="password" name="confirm-password">
    <p class="error"><?= $msg['c-pwd'] ?></p>

    <input type="submit" class="btn" name="ins" value="S'inscrire"></input>
</form>