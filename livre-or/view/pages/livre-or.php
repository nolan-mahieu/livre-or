<?php

require 'model/model.php';

$showComment = getComment();
if($_SESSION) {
    echo ('
        <a class="lienAjouterCom" href="?page=commentaire">Laisser un commentaire</a>
    ');
}

?>

<?php foreach($showComment as $comment => $value) { ?>

<div class="livreor">
    <p>Posté le :  <?= date("d-m-Y", strtotime($value['date'])) . ' par ' . $value['login'] . ' ' ?></p>
    <p class="line"></p>
    <p><?= $value['commentaire'] ?>
</div>

<?php } ?>