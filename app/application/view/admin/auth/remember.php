<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= APP_TITLE ?> | Redefinir Senha</title>

    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/font-awesome/css/all.css" rel="stylesheet">

    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div id="gravarSenha" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); z-index: 5000; display: none;">
    <div style="width: 250px; height: 125px; background-color: #ffffff; position:absolute; top: 50%; margin-top: -50px; left: 50%; margin-left: -100px; border-radius: 20px;">
        <h2 class="text-center m-t-lg"><i class="fas fa-circle-notch fa-spin fa-lg"></i> <b>Aguarde</b></h2>
        <p class="text-center">Estamos gravando a sua nova senha.</p>
    </div>
</div>

<?php if($response['id'] == ''){ ?>
<div class="lock-word animated fadeInDown"></div>
    <div class="middle text-center lockscreen animated fadeInDown">
        <div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
            <h2>Ops, link usado ou vencido, caso ainda precise solicite um novo.</h2><br><br>
            <a href="<?= URL_ADMIN ?>" class="btn btn-success">Voltar</a>
        </div>
    </div>
</div>
<?php } else { ?>

<div class="lock-word animated fadeInDown">
</div>
    <div class="middle-box text-center lockscreen animated fadeInDown">
        <div>
            <div class="m-b-md">
            <img alt="image" class="img-circle circle-border" src="/<?=$response['imagem']?>" style="width: 100%;">
            </div>
            <h3><?=$response['nome']?></h3>
            <p>Você está na tela de redefinir senha e você precisa digitar uma nova senha para voltar acessar o sistema.</p>
            <form class="m-t" role="form" method="post" action="<?= URL_ADMIN ?>/newpassword" id="envio_email">
                <div class="form-group">
                    <input type="password" name="senha" autocomplete="off" class="form-control" placeholder="******">
                    <input type="hidden" name="id" value="<?=@$response['id']?>">
                </div>
                <input type="submit" class="btn btn-primary block full-width" value="Alterar Senha">
            </form>
        </div>
    </div>

 <?php } ?>

    <!-- Mainly scripts -->
    <script src="/assets/admin/js/jquery-3.1.1.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script>
$(document).ready(function(){  
    $('#envio_email').validate({
        //regras e mensagens para os campos 
        rules: {  
            senha: { required: true },
        },  
        messages: {  
            senha: { required: 'Ops, informe uma senha.' },  
        },submitHandler: function( form ){
            var dados = $( form ).serialize();
            $('#gravarSenha').detach().appendTo('body').fadeIn();
            $(dados).submit();

            return false;
        }
    });
});
</script>

</body>

</html>
