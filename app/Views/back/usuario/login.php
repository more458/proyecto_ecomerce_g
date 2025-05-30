<div class="container pt-5 mt-5 mb-5">
    <div class="card-header text-justify">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3" style="width: 50%;">
                <h4>Iniciar Sesion</h4>
            </div>
        </div>
    </div>

    <!-- usamos el servicio de validación de CodeIgniter Services::validation() -->
    <?php $validation = \Config\Services::validation(); ?>

    <form method="post" action="<?= base_url('enviarlogin');?>">
        <?= csrf_field(); ?> <!-- genera un campo oculto con el token de seguridad -->
       <?php if (!empty(session()->getFlashdata('msg'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fmsg'); ?></div>
        <?php endif; ?>

        <?php if (!empty(session()->getFlashdata('msg'))): ?>
            <div class="alert-success"><?= session()->getFlashdata('msg'); ?></div>
        <?php endif; ?>

        <div class="card-body justify-content-center media (max-width:768px)">

            <!-- email -->
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="correo electronico">
                <?php if ($validation->getError('email')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('email'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contraseña -->
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña">
                <?php if ($validation->getError('pass')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('pass'); ?>
                    </div>
                <?php endif; ?>
                </div>
                
                <!-- Boton de envio -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </div>

            </div>
        </div>
    </form>
</div>
