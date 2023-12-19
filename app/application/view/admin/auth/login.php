<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?= URL_ADMIN ?>" target="_self">

    <title><?= APP_TITLE ?></title>

    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="/assets/img/favicon.png">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">
                    <br><br>
                    <img src="/assets/img/logo.png" alt="Logomarca" style="width:100%;">
                </h2>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                <?php if(@$response['logout']) echo '<p style="color: green;">' . $response['logout'] . '</p>';  ?>

                <?php if(@$response['error']) echo '<p style="color: red;">' . $response['error'] . '</p>';  ?>

                <?php if(@$response['email']) echo '<p style="color: green;">' . $response['email'] . '</p>';  ?>

                    <form class="m-t" role="form" method="post" action="<?= URL_ADMIN ?>/login">
                        <div class="form-group">
                            <input type="email" name="login" class="form-control" autocomplete="username" placeholder="E-mail" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" class="form-control" placeholder="Senha" autocomplete ="new-password" required="">
                        </div>
                        <?php if(@$response['erro']) echo '<p style="color: red;">' . $response['erro'] . '</p>';  ?>
                        <button type="submit" class="btn btn-success block full-width m-b">Entrar</button>

                        <a type="button" style="cursor: pointer;" class="text-right f-w-600" data-toggle="modal" data-target="#myModal">
                            <small>Esqueceu a senha ?</small>
                        </a>

                        <br><br><br>
                    </form>
                    <p class="m-t">
                        <small><?= APP_TITLE ?> &copy; <script>document.write(new Date().getFullYear());</script></small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <strong style="color:#000000;"><?= APP_TITLE ?></strong>
            </div>
            <div class="col-md-6 text-right">
            <strong style="color:#000000;"><small>© <script>document.write(new Date().getFullYear());</script></small></strong>
            </div>
        </div>
    </div>


<form class="m-t" role="form" method="post" action="<?= URL_ADMIN ?>/forgot">
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content animated flipInY">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Esqueceu a senha ?</h4>
          </div>
          <div class="modal-body">
            <p>Digite seu e-mail abaixo para redefinir sua senha.</p>
            <input type="text" name="email" placeholder="E-mail do usuário" autocomplete="off" class="form-control placeholder-no-fix" required="">
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
            <button class="btn btn-primary" type="submit">Enviar</button>
          </div>
        </div>
      </div>
    </div>
</form>


<script type="text/javascript" src="/assets/admin/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/bootstrap.min.js"></script>
</body>

</html>
