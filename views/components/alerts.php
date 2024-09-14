<?php
function mostrarAlerta($mensaje, $redireccionar = null) {
    ?>
    <div class="container-form-alert exit" id="exit-alert">
        <div class="form-alert">
            <div class="logo-alert">
                <img src="<?php echo SERVERURL ?>views/img/allshop-logo.png" alt="">
            </div>
            <div class="exit-alert-container">
                <div class="exit-alert exit" id="exit-alert">
                    x
                </div>
            </div>
            <div class="alert">
                <p><?php echo htmlspecialchars($mensaje); ?></p>
            </div>
            <div class="btn-axcept-alert" id="exit-alert">
                <?php
                if ($redireccionar) {
                    echo '<a href="' . htmlspecialchars($redireccionar) . '"><button>Aceptar</button></a>';
                } else {
                    echo '<button class="exit"">Aceptar</button>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}

