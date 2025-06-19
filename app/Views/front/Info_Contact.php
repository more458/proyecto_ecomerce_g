<?php $validation = \Config\Services::validation(); ?>

<?php
$id_usuario = $old->id_usuario ?? null;
$nombre = $old->nombre ?? '';
$apellido = $old->apellido ?? null;
$email = $old->email ?? '';
?>

<body class="contact-body">
<div class="titulo">  
  <h1 class="contact-h1"><?php echo $$titulo="Información de Contacto"?></h1>
</div>
  <!-- IMAGEN DE FONDO -->
  <div class="imagen-fondo">
    <img src="assets/img/fondo.jpg" alt="fondo">
  </div>

  <div class="container mt-5">
    <div class="row">
      <!-- INFO DEL CONTACTO -->
      <div class="col-md-5 bg-light p-4 rounded shadow">
        <h5>Información de Contacto</h5>
        <p><strong>Nombre del Titular:</strong> María López</p>
        <p><strong>Razón Social:</strong> Sweet Vibe's S.R.L.</p>
        <p><strong>Domicilio Legal:</strong> Av. de los Sabores 1234, CABA, Buenos Aires, Argentina</p>
        <p><strong>Teléfonos:</strong> (011) 4567-8910 / +54 9 11 2345-6789</p>
        <p><strong>Email:</strong> contacto@sweetvibes.com.ar</p>
        <p><strong>Redes Sociales:</strong></p>
        <ul class="list-unstyled">
          <li><i class="fab fa-facebook text-primary me-2"></i>Facebook</li>
          <li><i class="fab fa-instagram text-danger me-2"></i>Instagram</li>
          <li><i class="fab fa-twitter text-info me-2"></i>Twitter/X</li>
        </ul>
        <p><strong>Horario de Atención:</strong> Lunes a Viernes de 9:00 a 18:00 hs.</p>
      </div>

      <!-- FORMULARIO -->
      <div class="col-md-7">
        <form class="row g-3 mt-2 shadow p-4 rounded bg-light" action="<?= base_url('enviar-consul') ?>" method="post" enctype="multipart/form-data">
          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre"
              value="<?= set_value('nombre', $nombre); ?>"
              placeholder="Nombre" autofocus>

              <?php if ($validation->hasError('nombre')): ?>
                  <div class="alert alert-danger mt-2">
                    <?= $validation->getError('nombre'); ?>
                </div>
              <?php endif; ?>
          </div>
          <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido"
              value="<?= set_value('apellido', $apellido); ?>"
              placeholder="Apellido" autofocus>

              <?php if ($validation->hasError('apellido')): ?>
                  <div class="alert alert-danger mt-2">
                    <?= $validation->getError('apellido'); ?>
                </div>
              <?php endif; ?>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" id="email"
              value="<?= set_value('email', $email); ?>"
              placeholder="Email" autofocus>

              <?php if ($validation->hasError('email')): ?>
                  <div class="alert alert-danger mt-2">
                    <?= $validation->getError('email'); ?>
                </div>
              <?php endif; ?>
          </div>
          <div class="col-md-6">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono">
          </div>
          <div class="col-12">
            <label for="mensaje" class="form-label">Mensaje</label>
            <input type="text" class="form-control" id="mensaje" placeholder="...">
          </div>
          <div id="alertaErrores" class="alert alert-danger d-none" role="alert">
          </div> <!--usamos bootstrap para que el mensaje de alerta de error en el envio de formulario tenga mas estilo
          y no sea tan brusco como un alert-->
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <br><br>
  
</body>

