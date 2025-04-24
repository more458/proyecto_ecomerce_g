<?php
$tituloVar = "titulo";
$$tituloVar = "¡Como comercializamos!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "assets/css/comer.css">
    <title><?php echo $$tituloVar; ?></title>
</head>
<body>

<h1 class="text-center mb-4 titulo-bienvenida"><?php echo $$tituloVar; ?></h1>
<!-- tipos de entregas -->
    <div class="expand-container">
        <div class="expand-toggle" onclick="toggleDropdown(this)">📦 Tipos de Entregas</div>
        <div class="expand-box">
            <ul>
                <li>🚚 Entrega estándar (3 a 7 días hábiles)</li>
                <li>⚡ Entrega express (24 a 48 horas)</li>
                <li>🏬 Retiro en tienda (sin costo adicional)</li>
            </ul>
        </div>
    </div>

<!-- formas de envio -->
    <div class="expand-container">
        <div class="expand-toggle" onclick="toggleDropdown(this)">✈️ Formas de Envío</div>
        <div class="expand-box">
            <ul>
                <li>📮 Correo nacional e internacional</li>
                <li>🛵 Mensajería privada en zonas urbanas</li>
                <li>🏠 Logística propia para entregas locales</li>
            </ul>
        </div>
    </div>

<!-- formas de pago -->
    <div class="expand-container">
        <div class="expand-toggle" onclick="toggleDropdown(this)">💳 Formas de Pago</div>
        <div class="expand-box">
            <ul>
                <li>💳 Tarjeta de crédito y débito</li>
                <li>🏦 Transferencia bancaria</li>
                <li>💻 Plataformas digitales (Mercado Pago, PayPal)</li>
            </ul>
        </div>
    </div>


<!-- informacion adicional -->
    <div class="expand-container">
        <div class="expand-toggle" onclick="toggleDropdown(this)">📌 Información Adicional</div>
        <div class="expand-box">
            <ul>
                <li>🔁 Cambios y devoluciones dentro de los 7 días</li>
                <li>🤝 Atención personalizada al cliente</li>
                <li>📦 Seguimiento en tiempo real del pedido</li>
            </ul>
        </div>
    </div>

    <!-- js para desplegar la tabla -->
    <script>
        function toggleDropdown(el) {
            const container = el.parentElement;
            const content = container.querySelector('.expand-box');
            content.classList.toggle('open');
        }
    </script>
</body>
</html>