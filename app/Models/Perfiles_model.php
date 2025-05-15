<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfiles';
    protected $allowedFields = ['descripcion', 'id_usuario'];
}