<?php
require_once "controle.php";
$controleUsuario = criaControleUsuario();
$login = $controleUsuario->getLogin();

if ($login == $mensagem['quem']) {

?>

<form action="views/mensagem/removemsgaction.php" method="post">
    <input type="hiden" name="quem" value="<?php echo $mensagem
    ['quem']; ?>">

    <input type="hiden" name="quando" value="<?php echo $mensagem
    ['quando']; ?>">

    <input type="submit" value="remover">

</form>
<?php } ?>