<?php
$title = ' - Painel de Controle';
$css = [
];
$script = [
];
require APP . 'view/admin/_templates/initFile.php';
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <h1>
                   Painel do Sistema - <?= APP_TITLE ?>
                </h1>
            </div>
        </div>
    </div>
</div>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>
