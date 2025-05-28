<?php
namespace App\Models;
use CodeIgniter\Model;

class categoria_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'activo'];

    
    public function agregarCategoria($data)
    {
        return $this->insert($data);
    }

    
    public function obtenerCategoria($id)
    {
        return $this->find($id);
    }

   
    public function actualizarCategoria($id, $data)
    {
        return $this->update($id, $data);
    }

    
    public function borrarCategoria($id)
    {
        return $this->delete($id);
    }
}
