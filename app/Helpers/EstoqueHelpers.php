<?php
function getNomeSetor($id)
{
    $setorController = app(\App\Http\Controllers\SetorController::class);
    $nomeSetor = $setorController->showName($id)[0]['nome'];
    return $nomeSetor;
}
?>