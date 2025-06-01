<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Usuarios_Model;
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
        $data['productos'] = $productoModel->getProductoAll(); //funcion en el modelo

        $dato['titulo']='Crud_productos';
        echo view('front/header_view', $dato); 
        echo view('front/nav_view');
        echo view('back/productos/producto_nuevo_view', $data); 
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_model();
        $data['categorias'] = $categoriasmodel->getCategorias(); // traer las categorias desde la db

        $productoModel = new Producto_Model();
        $data['productos'] = $productoModel->orderBy('id', 'DESC')->findAll();

        $dato['titulo']='Alta producto';
        echo view('front/header_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/form_alta', $data);
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
        echo view('front/header_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/form_alta', $data);

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
        'categoria_id' => $this->request->getVar('categoria_id'),
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

    // Show single producto (mostrar un producto por id)
    public function singleproducto($id = null){
        $productoModel = new Producto_Model();
        $data['old'] = $productoModel->where('id', $id)->first();
        if (empty($data['old'])){
            // Lanzar error
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se seleccionado');
        }
        // Instancio el modelo de categorías
        $categoríasN = new categoria_model();
        $data['categorías'] = $categoríasN->getCategorías(); //traigo cate

        $data['titulo']='Cruq_productos';
        echo view('front/header_view', $data);
        echo view('front/nav_view');
        echo view('back/productos/edit', $data);
        echo view('front/footer_view');
    }



    public function modified($id){
        $productModel = new Producto_Model();
        $prod = $productModel->where('id', $id)->first();
        $img = $this->request->getFile('imagen');
        
        // Verifica si se cargó un archivo de imagen válido
        if ($img && $img->isValid()) {
            // Se cargó una imagen válida correctamente
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $nombre_aleatorio,
                // Completar con los demás campos
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
                // eliminado -> NO;
            ];
        } else {
            // No se cargó una nueva imagen, solo actualiza los datos del producto sin sobrescribir
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                // Completar con los demás campos
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
                // eliminado -> NO;
            ];
        }

        $productModel->update($id, $data);
        return redirect()->to('/productos');
    }

    //eliminar logicamente
    public function deleteproducto($id)
    {
        $productoModel = new Producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'SI';
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('crear'));
    }

    public function eliminados()
    {
        $productoModel = new Producto_Model();
        $data['productosElim'] = $productoModel->getProductoElimAll();
        //$data['productosElim'] = $productoModel->orderBy('id', 'DESC')->findAll();
        $data['titulo']='Crud_products'; 
        echo view('front/header_view', $data); 
        echo view('front/nav_view'); 
        echo view('back/productos/producto_eliminado', $data); 
        echo view('front/footer_view');
    }

    public function activarproducto($id)
    {
        $productoModel = new Producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'NO';
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Activacion Exitosa...');
        return $this->response->redirect(site_url('/crear'));
        // return $this->response->redirect(site_url('crear'));
    }

}
