<?php
namespace App\Models;
use CodeIgniter\Model;

class Ventas_detalle_model extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','venta_id','producto_id','cantidad','precio'];

    public function getBuilderDetalles($id = null, $id_usuario = null){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_detalle');
        $builder->select('*');
        $builder->join('ventas_cabecera', 'ventas_cabecera.id = ventas_detalle.venta_id');
        $builder->join('productos', 'productos.id = ventas_detalle.producto_id');
        //$builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id');
        
        
        /*if($id != null){
            $builder->where('ventas_cabecera.id', $id);
        }*/

       // $query = $builder->get();
       // return $query->getResultArray();
       return $builder;
    }

    public function getVentas($id = null){
    /*   $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();*/
        $builder = $this->getBuilderDetalles();
        

        if ($id !== null) {
            $builder->where('ventas_detalle.id', $id);
            $query = $builder->get();
            return $query->getResult(); 
        } else {
            //hay que cambiar esto por un mensaje de error
            $query = $builder->get();
            return $query->getRow(); 
            
        }
    }
}
