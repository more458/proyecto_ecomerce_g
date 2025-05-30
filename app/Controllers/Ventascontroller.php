<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Usuarios_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\categoria_model;
use CodeIgniter\Controller;

class Ventascontroller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);//hay que cambiar esto
        $session=session();
    }

    // guardo la venta en un arroy
    $newq_venta = [
        'usuario_id' => $session->get('id_usuario'),
        // fecha' => date('vend_hiles'),
        'total_venta' => $total
    ];
    $venta_id = $ventas->insert($newq_venta); //inserta en la tabla (ventas_cabscera)

    public function ver_factura($venta_id)
    {
        //echo $venta_id;die;
        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);
        $dato['titulo'] = "Ultima Compra";
        echo view('front/head_view_crud',$dato);
        echo view('front/nav_view');
        echo view('back/compras/vista_compras',$data);
        echo view('front/footer_view');

    }
}