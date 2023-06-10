<?php
function getNomeSetor($id)
{
    $setorController = app(\App\Http\Controllers\SetorController::class);
    // Chame o método desejado do SetorController para obter o nome do setor
    $nomeSetor = $setorController->showName($id)[0]['nome'];

    return $nomeSetor;
}
?>