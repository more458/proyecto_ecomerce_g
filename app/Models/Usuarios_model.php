<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'perfil_id', 'baja'];

    // Método para agregar un usuario
    public function agregarUsuario($data)
    {
        return $this->insert($data);
    }

    // Método para obtener datos de un usuario para editar (por id)
    public function obtenerUsuario($id)
    {
        return $this->find($id);
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $data)
    {
        return $this->update($id, $data);
    }

    // Método para borrar un usuario
    public function borrarUsuario($id)
    {
        return $this->delete($id);
    }
}
