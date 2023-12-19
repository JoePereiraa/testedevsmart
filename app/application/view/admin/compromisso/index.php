<?php
$title = ' - Painel de Controle';
$css = [];
$script = [
    'assets/admin/js/plugins/fullcalendar/index.global.min.js',
    'assets/admin/js/plugins/fullcalendar/core/locales-all.global.min.js',
];

require APP . 'view/admin/_templates/initFile.php';

$encode = json_encode($response);

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Compromissos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL_ADMIN ?>/inicio">Inicio</a>
            </li>
            <li class="active">
                <strong>Compromissos</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registerModal">
                        <i class="fas fa-calendar"></i>
                        Novo compromisso
                    </button>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Todos</h3>
                </div>
                <div class="ibox-content">
                    <div id='external-events'>
                        <?php foreach ((array)$response as $appointment) : ?>
                            <div class="external-event <?php
                                                        if ($appointment['status'] === 1) {
                                                            echo 'navy-bg';
                                                        } else {
                                                            echo 'bg-success';
                                                        }
                                                        ?>">

                                <h3 style="text-transform:capitalize;"><?= $appointment['title']; ?></h3>
                                <dl class="row" style="margin-bottom: 4px;">
                                    <dt class="col-sm-3">Inicio: </dt>
                                    <dd class="col-sm-9"><?= $appointment['start'] ?? ''; ?></dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 4px;">
                                    <dt class="col-sm-3">Fim: </dt>
                                    <dd class="col-sm-9"><?= $appointment['end'] ?? ''; ?></dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 4px;">
                                    <dt class="col-sm-3">Status: </dt>
                                    <dt class="col-sm-9">
                                        <?php
                                        if ($appointment['status'] === 1) {
                                            echo '<span class="btn yellow-bg">Em andamento</span>';
                                        } else {
                                            echo '<span class="btn btn-info">Concluido</span>';
                                        }
                                        ?>
                                    </dt>
                                </dl>
                                <!-- <h4></h4>
                                <h4></h4> -->
                                <hr style="margin: 12px 0;">
                                <?php
                                if ($appointment['status'] === 1) {
                                    echo '<button type="button" id="vmodal" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">
                                    <i class="fa fa-edit"></i> Editar</button>';
                                }

                                ?>
                                <!-- <?= '<a class="btn btn-warning btn-sm" href="' . URL_ADMIN . '/compromisso/editar/' . $appointment['id'] . '"><i class="fa fa-edit"></i> Editar</a> | '; ?> -->
                                <?= '<a class="btn btn-danger btn-sm" href="' . URL_ADMIN . '/compromisso/remover/' . $appointment['id'] . '" id="remover"><i class="fas fa-trash"></i> Remover</a>'; ?>
                            </div>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Editar Compromisso</h4>
                                        </div>
                                        <div class="modal-body">
                                            <span id="msg-cad"></span>
                                            <form role="form" id="addAppointment" method="post" action="<?= isset($appointment['id']) ? URL_ADMIN . '/compromisso/salvar' : URL_ADMIN . '/compromisso/cadastrar' ?>" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Titulo</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" value="<?= $appointment['title'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Data de Inicio</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="start_date" class="form-control" id="start_date" value="<?= $appointment['start'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Data Final</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="end_date" class="form-control" id="end_date" value="<?= $appointment['end'] ?? '' ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-10">
                                                            <div class="i-checks"><label> <input type="radio" <?= $appointment['status'] == 1 ? 'checked' : '' ?> value="1" name="status"> <i></i> Em andamento </label></div>
                                                            <div class="i-checks"><label> <input type="radio" <?= $appointment['status'] == 0 ? 'checked' : '' ?> value="0" name="status"> <i></i> Concluido </label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10 col-sm-offset-2">
                                                        <div class="form-group m-b-n-sm">
                                                            <input type="hidden" name="id" value="<?= isset($appointment['id']) ? $appointment['id'] : '' ?>">
                                                            <button class="btn btn-primary m-t-n-xs btn-lg" type="submit">
                                                                <strong>Editar Compromisso</strong>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div id="calendar"></div>


                    <!-- Modal View-->
                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Detalhes do Compromisso</h4>
                                </div>
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-3">ID: </dt>
                                        <dd class="col-sm-9" id="VIEW_ID"></dd>

                                        <dt class="col-sm-3">Titulo: </dt>
                                        <dd class="col-sm-9" id="VIEW_TITLE"></dd>

                                        <dt class="col-sm-3">Inicio: </dt>
                                        <dd class="col-sm-9" id="VIEW_START"></dd>

                                        <dt class="col-sm-3">Fim: </dt>
                                        <dd class="col-sm-9" id="VIEW_END"></dd>
                                    </dl>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <!-- Modal Register-->
                    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Criar Compromisso</h4>
                                </div>
                                <div class="modal-body">
                                    <span id="msg-cad"></span>
                                    <form role="form" id="addAppointment" method="post" action="<?= isset($response['id']) ? URL_ADMIN . '/compromisso/salvar' : URL_ADMIN . '/compromisso/cadastrar' ?>" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Titulo</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" value="<?= isset($response['title']) ? $response['title'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Data de Inicio</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="start_date" class="form-control" id="start_date" value="<?= isset($response['start_date']) ? $response['start_date'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Data Final</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="end_date" class="form-control" id="end_date" value="<?php isset($response['end_date']) ? $response['end_date'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <div class="form-group m-b-n-sm">
                                                    <input type="hidden" name="id" value="<?= isset($response['id']) ? $response['id'] : '' ?>">
                                                    <button class="btn btn-primary m-t-n-xs btn-lg" type="submit">
                                                        <strong>Salvar Compromisso</strong>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        //CALENDAR
        var events = <?= $encode; ?>;
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            locale: 'pt-br',

            navLinks: true,
            selectable: true,
            selectMirror: true,
            select: function(info) {
                $('#registerModal #start_date').val(info.start.toLocaleString());
                $('#registerModal #end_date').val(info.end.toLocaleString());
                $('#registerModal').modal('show');
            },

            editable: true,
            dayMaxEvents: true,
            events: events,

            eventClick: function(info) {
                $('#viewModal').modal('show');
                document.getElementById('VIEW_ID').innerText = info.event.id;
                document.getElementById('VIEW_TITLE').innerText = info.event.title;
                document.getElementById('VIEW_START').innerText = info.event.start.toLocaleString();
                document.getElementById('VIEW_END').innerText = info.event.end.toLocaleString();
            }
        });

        calendar.render()

    })
    let events = <?= $encode; ?>;
</script>