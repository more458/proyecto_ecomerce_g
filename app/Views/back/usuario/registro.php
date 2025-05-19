


<div class="container pt-5 mt-5 mb-5">
    <div class="card-header text-justify">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3" style="width: 50%;">
                <h4>Registrarse</h4>
            </div>
        </div>
    </div>

    <!-- usamos el servicio de validación de CodeIgniter Services::validation() -->
    <?php $validation = \Config\Services::validation(); ?>

    <form method="post" action="<?= base_url('enviar-form') ?>">
        <?= csrf_field(); ?> <!-- genera un campo oculto con el token de seguridad -->

        <?php if (!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif; ?>

        <?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <div class="card-body justify-content-center media (max-width:768px)">

            <!--nombre-->
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input name="nombre" type="text" class="form-control" placeholder="nombre">
                <?php if ($validation->getError('nombre')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('nombre'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!--apellido-->
            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="apellido">
                <?php if ($validation->getError('apellido')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('apellido'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- email -->
            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="correo electronico">
                <?php if ($validation->getError('email')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- nombre de usuario -->
            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Nombre de Usuario</label>
                <input type="text" name="username" class="form-control" placeholder="usuario">
                <?php if ($validation->getError('username')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('username'); ?>
                    </div>
                <?php endif; ?>
                </div>

            <!-- Contraseña -->
            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                <?php if ($validation->getError('password')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('password'); ?>
                    </div>
                <?php endif; ?>
                </div>
                
                <!-- Boton de envio -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>

            </div>
        </div>
    </form>
</div>
