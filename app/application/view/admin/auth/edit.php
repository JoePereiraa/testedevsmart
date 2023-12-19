<?php
$title = '';
$css = [
    'assets/admin/css/plugins/jasny/jasny-bootstrap.min.css'
];
$script = [
    'assets/admin/js/plugins/jasny/jasny-bootstrap.min.js',
    'assets/admin/js/plugins/parsley/parsley.min.js',
    'assets/admin/js/plugins/parsley/i18n/pt-br.js',
    'assets/admin/js/plugins/maskedinput/jquery.maskedinput.min.js',
];
require APP . 'view/admin/_templates/initFile.php';
?>

    <div class="col-md-12">
        <h1><?= @$response['nome'] ?></h1>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Meus Dados</h5>
            </div>
            <div class="ibox-content">

                <form role="form" method="post" action="<?= URL_ADMIN ?>/account/save" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" name="nome" placeholder="" class="form-control" value="<?= isset($response['nome']) ? $response['nome'] : '' ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" placeholder="" class="form-control telefone" value="<?= isset($response['telefone']) ? $response['telefone'] : '' ?>">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="" class="form-control" value="<?= isset($response['email']) ? $response['email'] : '' ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" name="senha" placeholder="" class="form-control" value="" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input type="file" name="imagem" placeholder="" class="form-control" value="" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if(isset($response['imagem']) && $response['imagem']) {
                                        ?>
                                        <div class="user-image" style="background-image: url('<?= $response['imagem']?>');">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="hr-line-dashed m-t-sm"></div>
                            <div class="form-group m-b-n-sm">
                                <input type="hidden" name="id" value="<?= isset($response['id']) ? $response['id'] : '' ?>">
                                <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Salvar</strong></button>
                                <a href="javascript:history.back()" class="btn btn-default m-t-n-xs"><strong>Voltar</strong></a>
                            </div>
                        </div>

                    </div>

                </form>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>

    <script>
        $('form').parsley();

        $('.telefone').mask("(99) 9999-9999?9").focusout(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });
    </script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>
