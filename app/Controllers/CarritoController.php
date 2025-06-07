<?php

namespace App\Controllers;

use App\Models\Producto_Model;
use CodeIgniter\Controller;

class CarritoController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
        // Asegúrate de que la sesión esté cargada. CodeIgniter lo hace automáticamente si está en Config/Autoload.php
        // pero puedes forzarla aquí si es necesario: service('session');
    }

    // Muestra la vista del carrito
    public function index()
    {
        $session = session();
        $data['cart_items'] = $session->get('cart') ?? []; // Obtiene los ítems del carrito o un array vacío

        $dato['titulo'] = 'Mi Carrito';
        echo view('front/header_view', $dato);
        echo view('front/nav_view');
        echo view('back/carrito/carrito_view', $data); // La vista que crearemos
        echo view('front/footer_view');
    }

    // Agrega un producto al carrito
    public function agregar()
    {
        $session = session();
        $request = service('request');
        $productoModel = new Producto_Model();

        $producto_id = $request->getPost('product_id');
        $quantity = (int) $request->getPost('quantity');

        if ($producto_id && $quantity > 0) {
            $producto = $productoModel->getProductoById($producto_id);

            if ($producto) {
                // Verificar stock
                if ($producto->stock < $quantity) {
                    $session->setFlashdata('error', 'No hay suficiente stock para la cantidad solicitada de ' . $producto->nombre_prod . '. Stock disponible: ' . $producto->stock);
                    return redirect()->back();
                }

                $cart = $session->get('cart') ?? [];
                $found = false;

                // Si el producto ya está en el carrito, actualizar la cantidad
                foreach ($cart as $key => $item) {
                    if ($item['producto_id'] == $producto_id) {
                        // Verificar stock al añadir más
                        if ($producto->stock < ($item['quantity'] + $quantity)) {
                             $session->setFlashdata('error', 'No se puede añadir más: stock limitado para ' . $producto->nombre_prod . '. Stock disponible: ' . $producto->stock);
                             return redirect()->back();
                        }
                        $cart[$key]['quantity'] += $quantity;
                        $found = true;
                        break;
                    }
                }

                // Si el producto no está en el carrito, añadirlo
                if (!$found) {
                    $cart[] = [
                        'producto_id'   => $producto->producto_id, // Usamos producto_id por el alias en el modelo
                        'nombre_prod'   => $producto->nombre_prod,
                        'precio_vta'    => $producto->precio_vta,
                        'imagen'        => $producto->imagen,
                        'stock'         => $producto->stock, // Para futuras validaciones
                        'quantity'      => $quantity,
                    ];
                }

                $session->set('cart', $cart);
                $session->setFlashdata('success', $producto->nombre_prod . ' añadido al carrito.');
            } else {
                $session->setFlashdata('error', 'Producto no encontrado.');
            }
        } else {
            $session->setFlashdata('error', 'Cantidad inválida o producto no especificado.');
        }

        return redirect()->back(); // Redirige a la página anterior (catálogo)
    }

    // Actualiza la cantidad de un producto en el carrito
    public function actualizar()
    {
        $session = session();
        $request = service('request');
        $productoModel = new Producto_Model();

        $producto_id = $request->getPost('producto_id');
        $new_quantity = (int) $request->getPost('quantity');

        $cart = $session->get('cart') ?? [];

        foreach ($cart as $key => $item) {
            if ($item['producto_id'] == $producto_id) {
                if ($new_quantity > 0) {
                    // Validar stock antes de actualizar
                    $producto_info = $productoModel->getProductoById($producto_id);
                    if ($producto_info && $producto_info->stock < $new_quantity) {
                        $session->setFlashdata('error', 'Stock insuficiente para ' . $item['nombre_prod'] . '. Disponible: ' . $producto_info->stock);
                        return redirect()->back();
                    }
                    $cart[$key]['quantity'] = $new_quantity;
                    $session->setFlashdata('success', 'Cantidad de ' . $item['nombre_prod'] . ' actualizada.');
                } else {
                    // Si la cantidad es 0 o menos, eliminar el producto
                    unset($cart[$key]);
                    $session->setFlashdata('success', 'Producto ' . $item['nombre_prod'] . ' eliminado del carrito.');
                }
                break;
            }
        }

        // Reindexar el array si se eliminaron elementos
        $session->set('cart', array_values($cart));

        return redirect()->to(base_url('carrito'));
    }

    // Elimina un producto del carrito
    public function eliminar($producto_id = null)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if ($producto_id !== null) {
            foreach ($cart as $key => $item) {
                if ($item['producto_id'] == $producto_id) {
                    $nombre_prod = $item['nombre_prod'];
                    unset($cart[$key]);
                    $session->setFlashdata('success', 'Producto ' . $nombre_prod . ' eliminado del carrito.');
                    break;
                }
            }
            // Reindexar el array
            $session->set('cart', array_values($cart));
        }

        return redirect()->to(base_url('carrito'));
    }

    // Vacía todo el carrito
    public function vaciar()
    {
        $session = session();
        $session->remove('cart');
        $session->setFlashdata('success', 'El carrito ha sido vaciado.');
        return redirect()->to(base_url('carrito'));
    }

    public function devolver_carrito()
    {
        $session = session();
        return $session->get('cart') ?? [];
    }

    // Proceso de checkout (ejemplo básico, se puede expandir con Stripe, Mercado Pago, etc.)
    public function checkout()
    {
        $session = session();
        $cart_items = $session->get('cart') ?? [];

        if (empty($cart_items)) {
            $session->setFlashdata('error', 'El carrito está vacío. Añade productos para proceder con la compra.');
            return redirect()->to(base_url('carrito'));
        }

        /*CODIGO DE GEMINI QUE ME RECOMENDO PARA EL CHECKOUT*/
        // Aquí iría la lógica real de la compra:
        // 1. Validar stock final
        // 2. Crear un registro en la tabla de ventas (Ventas_cabecera y Ventas_detalle)
        // 3. Actualizar el stock de los productos
        // 4. Limpiar el carrito

        // Ejemplo:
        // if (session()->get('isLoggedIn')) { // Solo si el usuario está logueado
        //    $userId = session()->get('id');
        //    $ventaCabeceraModel = new Ventas_cabecera_model();
        //    $ventaDetalleModel = new Ventas_detalle_model();
        //    $productoModel = new Producto_Model();
        //    $total_venta = 0;
        //    foreach ($cart_items as $item) {
        //         $total_venta += $item['precio_vta'] * $item['quantity'];
        //    }
        //    // Insertar en Ventas_cabecera
        //    $ventaCabeceraData = [
        //        'fecha' => date('Y-m-d H:i:s'),
        //        'usuario_id' => $userId,
        //        'total_venta' => $total_venta,
        //        // Agrega otros campos necesarios como 'metodo_pago', 'estado', etc.
        //    ];
        //    $ventaCabeceraModel->insert($ventaCabeceraData);
        //    $venta_id = $ventaCabeceraModel->insertID();
        //    // Insertar en Ventas_detalle y actualizar stock
        //    foreach ($cart_items as $item) {
        //        $ventaDetalleData = [
        //            'venta_id' => $venta_id,
        //            'producto_id' => $item['producto_id'],
        //            'cantidad' => $item['quantity'],
        //            'precio_unitario' => $item['precio_vta'],
        //        ];
        //        $ventaDetalleModel->insert($ventaDetalleData);
        //        // Actualizar stock del producto
        //        $currentProduct = $productoModel->getProductoById($item['producto_id']);
        //        if ($currentProduct) {
        //            $newStock = $currentProduct->stock - $item['quantity'];
        //            $productoModel->update($item['producto_id'], ['stock' => $newStock]);
        //        }
        //    }
        //    $session->remove('cart'); // Vaciar carrito después de la compra
        //    $session->setFlashdata('success', '¡Compra realizada con éxito! Su número de pedido es: ' . $venta_id);
        //     return redirect()->to(base_url('mis_compras')); // Redirigir a una página de mis compras
        //} else {
        //    $session->setFlashdata('error', 'Debes iniciar sesión para completar la compra.');
        //    return redirect()->to(base_url('login'));
        //}
        /*Por ahora, solo un mensaje de éxito simulado
        $session->remove('cart'); // Vaciar el carrito
        $session->setFlashdata('success', '¡Proceso de compra simulado con éxito! Tu carrito ha sido vaciado.');
        return redirect()->to(base_url('/')); // Redirigir a la página principal*/
    }
}