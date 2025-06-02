<div class="container mt-5">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($productos as $producto): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <?php
                // ¡CAMBIO AQUÍ! Usa $producto->producto_id en lugar de $producto->id
                $imagenPath = 'assets/img/productos/producto_'.$producto->producto_id.'.jpg';
                $imagenDefault = 'assets/img/productos/default.jpg';
                $imagenFinal = file_exists(FCPATH.$imagenPath) ? $imagenPath : $imagenDefault;
                ?>
                <img src="<?= base_url($imagenFinal) ?>"
                     class="card-img-top p-3"
                     alt="<?= esc($producto->nombre_prod) ?>"
                     style="height: 200px; object-fit: contain;">

                <div class="position-absolute top-0 end-0 m-2">
                    <?php if($producto->stock <= $producto->stock_min): ?>
                        <span class="badge bg-danger">Últimas unidades</span>
                    <?php elseif($producto->precio_vta < $producto->precio): ?>
                        <span class="badge bg-warning text-dark">Oferta</span>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= esc($producto->nombre_prod) ?></h5>
                    <p class="card-text text-muted"><?= esc($producto->descripcion ?? 'Descripción no disponible') ?></p>

                    <div class="mb-2">
                        <span class="h5 text-primary">$<?= number_format($producto->precio_vta, 2) ?></span>
                        <?php if($producto->precio_vta < $producto->precio): ?>
                            <small class="text-decoration-line-through text-muted ms-2">$<?= number_format($producto->precio, 2) ?></small>
                        <?php endif; ?>
                    </div>

                    <form method="post" action="<?= site_url('carrito/agregar') ?>">
                        <input type="hidden" name="product_id" value="<?= $producto->producto_id ?>">
                        <div class="input-group mb-3" style="max-width: 150px;">
                            <button class="btn btn-outline-secondary" type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                            <input type="number" class="form-control text-center" name="quantity" value="1" min="1" max="<?= $producto->stock ?>">
                            <button class="btn btn-outline-secondary" type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">
                            <i class="fas fa-cart-plus me-2"></i>Añadir al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
