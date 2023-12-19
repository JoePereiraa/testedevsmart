<?php
$title = '';
$css = [
    'assets/admin/css/plugins/dataTables/datatables.min.css'
];
$script = [
    'assets/admin/js/plugins/dataTables/datatables.min.js'
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
            <a href="<?= URL_ADMIN ?>/usuario/novo" class="btn btn-primary btn-sm">Novo</a>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <!-- <?php if (@$_SESSION['acesso'] == 'Administrador') { ?>
                                <th>Tipo</th>
                                <th>Loja</th>
                            <?php } ?> -->
                            <!-- <th>Permissões</th> -->
                            <th>Telefone</th>
                            <th>Email</th>
                            <th width="150">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ((array)$response as $usuario) {
                            echo '<tr class="gradeX">';
                            echo '<td><a href="' . URL_ADMIN . '/usuario/editar/' . $usuario['id'] . '">' . $usuario['nome'] . '</a></td>';
                            echo '<td>' . $usuario['telefone'] . '</td>';
                            echo '<td>' . $usuario['email'] . '</td>';
                            echo '<td class="text-center"><a href="' . URL_ADMIN . '/usuario/editar/' . $usuario['id'] . '"><i class="fa fa-edit"></i> Editar</a> | ';
                            echo '<a href="' . URL_ADMIN . '/usuario/remover/' . $usuario['id'] . '" id="remover"><i class="fa fa-remove"></i> Remover</a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 100,
            responsive: true,
            dom: '<"html5buttons"B>Tfgitlp',
            buttons: [{
                    extend: 'excel',
                    title: '<?= APP_TITLE ?>'
                },
                {
                    extend: 'pdf',
                    title: '<?= APP_TITLE ?>'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ],
            language: {
                "url": "assets/admin/js/plugins/dataTables/i18n/Portuguese-Brasil.json"
            }
        });

    });
</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>