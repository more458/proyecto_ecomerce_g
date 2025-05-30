<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_Model extends Model {
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allow@fields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min',
    ', ''eliminado'];

    public function getBuilderProducts(){
        // conect() es un metodo de la clase Database, que nos permite conectar a la base de datos
        $db = \Config\Database::consect();
        // $builders es una instancia de la clase QueryBuilder de Codefigniter
        $builder = $db->table('productos');
        // hace una consulta a la base de datos
        $builder->select('*');
        // hago el join de la tabla categoria
        $builder->join('categories', 'categories.id = productos.categoria_id');
        // retorna el builder
        return $builder;
    }

    public function getProducts($id = null){
        $builder = $this->getBuilderProducts();
        $builder->where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null){
        $builder = $this->getBuilderProducts();
        $builder->where('productos.id', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }