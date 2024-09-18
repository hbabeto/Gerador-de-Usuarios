<?php
include("classe/Usuario.php");

$pagina = file_get_contents("front-end/Usuario.html");

if(isset($_POST['botao'])) {
    $usuario = new Usuario();
    $usuario->fetchUserData();

    $resultado = '<div id="resultado">
                 <p><img src="' . $usuario->getFoto() . '" alt="Foto do usuário"></p>
                 <p>Nome: ' . $usuario->getNome() . '</p>
                 <p>E-mail: ' . $usuario->getEmail() . '</p>
                 <p>Telefone: ' . $usuario->getTelefone() . '</p>
                 </div>';

    $pagina = str_replace("#resutado", $resultado, $pagina);
} else {
    $pagina = str_replace("#resutado", "", $pagina);
}

echo $pagina;
?>
