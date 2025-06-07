<?php
namespace App\Models;
use CodeIgniter\Model;

class Ventas_cabecera_model extends Model{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','fecha','usuario_id','total_venta'];


    public function getBuilderCabecera($id = null, $id_usuario = null){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_cabecera');
        $builder->select('*');
        $builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id');
        
        
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
        $builder = $this->getBuilderCabecera();
        

        if ($id !== null) {
            $builder->where('ventas_cabecera.id', $id);
            $query = $builder->get();
            return $query->getResult(); 
        } else {
            //hay que cambiar esto por un mensaje de error
            $query = $builder->get();
            return $query->getRow(); 
            
        }
    }
}