<?php
$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);

?>
<!---->
<div class="navbar-fixed">
    <nav class="#212121 grey darken-4">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo"><img src="imagens/history.png" height="55" width="60"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="<?php if ($pagina_Corrente == 'index.php') {
                                echo 'class="active"';
                            } ?>"> <a href="index.php">Casa</a></li>
                <li class="<?php if ($pagina_Corrente == 'crud.php') {
                                echo 'class="active"';
                            } ?>"> <a href="crud.php">Gerenciar</a></li>
            </ul>
        </div>
    </nav>
</div>
<!---->