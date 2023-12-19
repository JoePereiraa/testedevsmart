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
        <h2>Usuários</h2>
    </div>
</div>

<div class="col-md-12 m-t-md">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= isset($response['nome']) ? 'Usuário: ' . $response['nome'] : 'Novo usuário' ?></h5>
        </div>
        <div class="ibox-content">

            <form role="form" method="post" action="<?= isset($response['id']) ? URL_ADMIN . '/usuario/salvar' : URL_ADMIN . '/usuario/cadastrar' ?>" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <!-- <?php if (@$_SESSION['acesso'] == 'Administrador') { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loja</label>
                                        <select name="id_loja" class="form-control" required>
                                            <option value="">Selecione</option>
                                            <?php
                                            foreach ($response['lojas'] as $item) {
                                                echo '<option value="' . $item['id'] . '">' . $item['nome'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <script>
                                            $('select[name=id_loja]').val('<?= isset($response['id_loja']) ? $response['id_loja'] : '' ?>')
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Acesso</label>
                                        <select name="acesso" class="form-control" required>
                                            <option>Empresa</option>
                                            <option>Administrador</option>
                                        </select>
                                        <script>
                                            $('select[name=acesso]').val('<?= isset($response['acesso']) ? $response['acesso'] : '' ?>')
                                        </script>
                                    </div>
                                </div>
                            <?php } ?> -->
                            <div class="clearfix"></div>
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
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permissões <a class="badge badge-primary" data-toggle="modal" data-target="#myModal">?</a></label>
                                        <select name="permissoes[]" class="form-control select2" multiple required>
                                            <?php
                                            foreach ($response['permissoes'] as $item) {
                                                $selected = (in_array($item['id'], $response['permissao']) ? 'SELECTED' : '');
                                                echo '<option value="' . $item['id'] . '" ' . $selected . '>' . $item['nome'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input type="file" name="imagem" placeholder="" class="form-control" value="" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if (isset($response['imagem']) && $response['imagem']) {
                                    ?>
                                        <div class="user-image" style="background-image: url('<?= $response['imagem'] ?>');">
                                        </div>
                                        <?php
                                    }
                                        ?>
                                </div>
                            </div>
                        </div> -->

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

<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                <i class="fa fa-lock modal-icon"></i>
                <h4 class="modal-title">Permissões</h4>
                <small class="font-bold">Conheça as permissões do sistema.</small>
            </div>
            <div class="modal-body">
                <ol>
                    <li><b>Administração:</b> Gestão da loja junto ao Eldorado.</li>
                    <li><b>Caixa:</b> Abrir e fechar caixas.</li>
                    <li><b>Categorias:</b> Gerenciar categorias de produtos.</li>
                    <li><b>Configurações:</b> Configurações gerais da loja (sistema e pedidos online).</li>
                    <li><b>Mesas:</b> Gerenciar numeração das mesas atendidas.</li>
                    <li><b>Mesas - Atendimento:</b> Usuários que poderão registrar pedidos nas mesas.</li>
                    <li><b>Pedidos:</b> Visualizar pedidos realizados.</li>
                    <li><b>Pedidos - Cancelar:</b> Usuários que podem cancelar pedidos.</li>
                    <li><b>Preparo:</b> Usuários que podem confirmar a elaboração do pedido.</li>
                    <li><b>Produtos:</b> Gerenciar produtos e estoque.</li>
                    <li><b>Reportar erros:</b> Usuários que podem reportar erro do sistema à gestão do Eldorado.</li>
                    <li><b>Usuários:</b> Gerenciar usuários do sistema.</li>
                    <li><b>Venda:</b> Usuários que podem realizar vendas.</li>
                    <li><b>Venda - Desconto:</b> Usuários que podem conceder descontos.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
            </div>
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