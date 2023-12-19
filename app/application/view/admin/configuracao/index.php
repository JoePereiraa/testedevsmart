<?php
$title = ' - Configurações do Sistema';
$css = [
];
$script = [
	'assets/admin/js/plugins/dataTables/datatables.min.js',
];
require APP . 'view/admin/_templates/initFile.php';
?>

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
      <h2>Configurações do Sistema</h2>
      <ol class="breadcrumb">
          <li>
              <a href="<?=URL_ADMIN?>/dashboard">Inicio</a>
          </li>
          <li class="active">
              <strong>Configurações do Sistema</strong>
          </li>
      </ol>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Configurações do Sistema</h5>
                      </div>
                    <div class="ibox-content">
                    <div class="form-group col-lg-12">
                      
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                      <th>Nome do Sistema</th>
                      <th width="90">Situação</th>
                      <th width="90">Protocolo</th>
                      <th width="180">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ((array)$response as $config) {
                          echo '<tr class="gradeX">';                          
                          echo '<td>' . $config['app_title'] . '</td>';
                          echo '<td>' . $config['environment'] . '</td>';
                          echo '<td>' . $config['protocol'] . '</td>';
                          echo '<td class="text-center"><a class="btn-xs btn-success" href="' . URL_ADMIN . '/configuracoes/editar/'. $config['id'] . '"><i class="fa fa-pencil"></i> Editar Informações</a> </td>';                          
                          echo '</tr>';                    
                    } ?>
                        </tbody>
                    </tbody>
                    </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 100,
                responsive: true,
                dom: '<"html5buttons"B>Tfgitlp',
                buttons: [
                    {extend: 'excel', title: '<?=APP_TITLE?>'},
                    {extend: 'pdf', title: '<?=APP_TITLE?>'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ],
                language: {
                    "url": "/assets/admin/js/plugins/dataTables/i18n/Portuguese-Brasil.json"
                }
            });

        });

    </script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>