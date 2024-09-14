<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../user/seller");
    }
    require_once '../../../config/APP.php';
    require_once '../../components/head.php';
    require_once './components/headerSeller.php';
    require_once './components/navSeller.php';
?>
<style>
    body {
        height: 10000px;
    }
</style>

    
    <div class="container-tasks">
        <div class="tasks">
            <div class="tittle-tasks">
                <h3>Lista de tareas.</h3>
                <p>Las cosas con las que tienes que lidiar.</p>
            </div>
            <div class="tasks-info">
                <div class="tasks-rows">
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>No pagado.</p>
                            </div>
                        </a>
                    </div>
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Enviado para procesar.</p>
                            </div>
                        </a>
                    </div>
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Enviado procesado.</p>
                            </div>
                        </a>
                    </div>
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Cancelación.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tasks-rows">
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Reembolso / devolución.</p>
                            </div>
                        </a>
                    </div>
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Productos inhabilitados.</p>
                            </div>
                        </a>
                    </div>
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Carga de factura.</p>
                            </div>
                        </a>
                    </div>
                    <div class="tasks-columns">
                        <a href="">
                            <div class="tasks-columns-info">
                                <h5>0</h5>
                                <p>Productos agotados.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php
    require_once '../../components/scripts.php';
?>