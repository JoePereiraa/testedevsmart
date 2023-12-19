<?php
$title = '';
$css = [
    'assets/admin/css/plugins/jasny/jasny-bootstrap.min.css',
    'assets/admin/css/plugins/select2/select2.min.css',
];
$script = [
    'assets/admin/js/plugins/jasny/jasny-bootstrap.min.js',
    'assets/admin/js/plugins/parsley/parsley.min.js',
    'assets/admin/js/plugins/parsley/i18n/pt-br.js',
    'assets/admin/js/plugins/maskedinput/jquery.maskedinput.min.js',
    'assets/admin/js/plugins/select2/select2.full.min.js',
];

require APP . 'view/admin/_templates/initFile.php';
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-12">
        <i class="fa fa-users fa-3x pull-right icon-heading"></i>
        <h2>Compromissos</h2>
    </div>
</div>

<div class="col-md-12 m-t-md">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= isset($response['title']) ? 'Compromisso: ' . $response['title'] : 'Novo compromisso' ?></h5>
        </div>
        <div class="ibox-content">

            <form role="form" method="post" action="<?= isset($response['id']) ? URL_ADMIN . '/compromisso/salvar' : URL_ADMIN . '/compromisso/cadastrar' ?>" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="title" placeholder="" class="form-control" value="<?= isset($response['title']) ? $response['title'] : '' ?>" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data de Inicio</label>
                                    <input type="date" name="start_date" placeholder="" class="form-control" value="<?= isset($response['start_date']) ? $response['start_date'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Final</label>


                                    <input type="date" name="end_date" placeholder="" class="form-control" value="<?= isset($response['end_date']) ? $response['end_date'] : '' ?>">
                                </div>
                            </div> -->
                            <div class="clearfix"></div>
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
    $('.select2').select2();
    $('.telefone').mask("(99) 9999-9999?9").focusout(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if (phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });
</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>