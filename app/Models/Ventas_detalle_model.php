<?php
namespace App\Models;
use CodeIgniter\Model;

class Ventas_detalle_model extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','venta_id','producto_id','cantidad','precio'];

    public function getBuilderDetalles($id = null){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_detalle');
        $builder->select('*');
        $builder->join('ventas_cabecera', 'ventas_cabecera.id = ventas_detalle.venta_id');
        $builder->join('productos', 'productos.id = ventas_detalle.producto_id');
        $builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id');
        
        
        if($id != null){
            $builder->where('ventas_cabecera.id', $id);
        }

        $query = $builder->get();
        return $query->getResultArray();
    }
    /*
    public function getVentas($id_usuario = null){
        if ($id_usuario == null){
            //Si el $id_usuario es null
            //La función getBuilderVentas_cabecera() devuelve el resultado de la consulta como array.
            return $this->getBuilderVentas_cabecera();
        } else {
            $db = \Config\Database::connect();
            $builder = $db->table('ventas_cabecera');
            $builder->select("*");
            $builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id');
            $builder->where('ventas_cabecera.usuario_id', $id_usuario);
            $query = $builder->get();
            return $query->getResultArray();
        }
    }*/
}
