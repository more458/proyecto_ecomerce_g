
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
        <form class="row g-3 mt-2 shadow p-4 rounded bg-light" onsubmit="validarFormulario(event)">
          <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" id="inputNombre">
          </div>
          <div class="col-md-6">
            <label for="inputApellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" placeholder="Apellido" id="inputApellido">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="col-md-6">
            <label for="inputMotivo" class="form-label">Motivo de consulta</label>
            <input type="text" class="form-control" id="inputMotivoConsulta">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">Provincia</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Ciudad</label>
            <select id="inputState" class="form-select">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-12">
            <label for="inputDescripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="inputDescripcion" placeholder="...">
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

