<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        
        <input type="text" class="form-control w-25" placeholder="Search..." id="searchInput">
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>fecha</th>
                <th>total de Venta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?= $venta->id  ?></td><!-- se le pasa el ide del producto pero mustra el ide de la categoria corregir -->
                    <td><?= $venta->fecha ?></td>
                    <td><?= number_format($venta->total_venta, 2) ?></td>
                    <td>
                        <a href="<?= base_url('editar/' . $venta->id ) ?>" class="btn btn-primary btn-sm">ver</a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>