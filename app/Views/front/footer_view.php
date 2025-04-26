
<footer class="footer">
  <div class="footer-container">
    <div class="footer-column">
      <h3>Experiencia del cliente</h3>
      <ul>
        <li><a href="#">Hacenos tu consulta</a></li>
        <li>+54 12 3456 789<br><a href="#">Comprá por Whatsapp</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Información de compra</h3>
      <ul>
        <li><a href="#">Medios de pago</a></li>
        <li><a href="#">Información de envíos</a></li>
        <li><a href="#">Preguntas frecuentes</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Somos Sweet Vibes</h3>
      <ul>
        <li><a href="#">Sobre Nosotroa</a></li>
        <li><a href="#">Términos y Condiciones</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Conocenos</h3>
      <div class="redes">
        <a href="https://www.tiktok.com/" target="_blank" style="margin: 0 10px; color: #000; font-size: 24px;">
           <i class="fab fa-tiktok"></i>
        </a>
        <a href="https://www.instagram.com/" target="_blank" style="margin: 0 10px; color: #000; font-size: 24px;">
           <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/" target="_blank" style="margin: 0 10px; color: #000; font-size: 24px;">
        <i class="fab fa-facebook-f"></i>
        </a>

      </div>
      <div class="pais">
        <img src="https://flagcdn.com/ar.svg" alt="Argentina">
        <span>Argentina</span>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>

<!-- js para desplegar la tabla de comercializacion -->
<script>
        function toggleDropdown(el) {
            const container = el.parentElement;
            const content = container.querySelector('.expand-box');
            content.classList.toggle('open');
        }
</script>

<!-- script de terminos y usos-->
<script>
  function mostrarMensaje() {
    document.getElementById("mensajeAceptado").style.display = "block";
  }
</script>

<!--script de contacto donde validamos el formulario, todos los campos -->
<script src="assets/js/contacto.js"></script>

</footer>


</html>



