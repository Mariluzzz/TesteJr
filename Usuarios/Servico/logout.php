<?php

require_once 'Autentificacao.php';

Autentificacao::sairSessao();
header("Location: ../../index.php");

?>
