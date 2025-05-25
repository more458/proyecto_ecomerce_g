<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Usuario_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\categoria_model;
use CodeIgniter\Controller;

class Productocontroller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
        $session=session();
    }

    // mostrar los productos en lista
    public function index()
    {
        $productoModel = new Producto_Model();
        // realizo la consulta para mostrar todos los productos
        $data['producto'] = $productoModel->getProductoAll(); //funcion en el modelo

        $dato['titulo']='Crud_productos';
        echo view('front/head_view_crud', $dato);
        echo view('front/nav_view');
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_model();
        $data['categorias'] = $categoriasmodel->getCategorias(); // traer las categorias desde la db

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $data['titulo']='Alta producto';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view', $data);
        echo view('front/footer_view');
    }


    public function store() {
    // construimos las reglas de validación
    $input = $this->validate([
        'nombre_prod' => 'required|min_length[3]',
        'categoria' => 'is_not_unique[categorias.id]',
        'precio' => 'required|numeric',
        'precio_vta' => 'required|numeric',
        'stock' => 'required',
        'stock_min' => 'required',
        'imagen' => 'uploaded[imagen]'
    ]);

    $productoModel = new Producto_Model(); // se instancia el modelo

    if (!$input) {
        $categoria_model = new categoria_model();
        $data['categorias'] = $categoria_model->getCategorias();
        $data['validation'] = $this->validator;

        $dato['titulo'] = 'Alta';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view', $data);

    }

    $img = $this->request->getFile('imagen');
    //este código genera un nombre aleatorio para el archivo
    $nombre_aleatorio = $img->getRandomName();
    //mueve el archivo de imagen a una ubicación específica en el servidor metodo move(). en carpeta assets/uploads
    $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

    $data = [
        'nombre_prod' => $this->request->getVar('nombre_prod'),
        //Aquí se obtiene el nombre del archivo de imagen (sin la ruta) utilizando el metodo getName() del objeto &img
        'imagen' => $img->getName(),
        // completar con los demás campos
        'categoria_id' => $this->request->getVar('categoria'),
        'precio' => $this->request->getVar('precio'),
        'precio_vta' => $this->request->getVar('precio_vta'),
        'stock' => $this->request->getVar('stock'),
        'stock_min' => $this->request->getVar('stock_min'),
        //'eliminado' => NO
    ];

    $producto = new Producto_Model();
    $producto->insert($data);
    session()->setFlashdata('success', 'Alta Exitosa...');
    return $this->response->redirect(site_url('crear'));
    }

}
