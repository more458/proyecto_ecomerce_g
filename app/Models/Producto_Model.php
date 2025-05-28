<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_Model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stok_min', 'eliminado'];

    // Método para agregar un usuario
    public function agregarProducto($data)
    {
        return $this->insert($data);
    }

    // Método para obtener datos de un usuario para editar (por id)
    public function obtenerProducto($id)
    {
        return $this->find($id);
    }

    // Método para actualizar un usuario
    public function actualizarProducto($id, $data)
    {
        return $this->update($id, $data);
    }

    // Método para borrar un usuario
    public function borrarProducto($id)
    {
        return $this->delete($id);
    }
}
