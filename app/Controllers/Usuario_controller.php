<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Perfiles_model;
use App\Models\consulta_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller{
    public function __construct()
    {
        helper(['form', 'url']); 
    }

    public function create(){
        $dato['titulo']='Registro'; 
        echo view('front/header_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }

    public function formValidation(){
        $input = $this->validate([
            'nombre'    => 'required|min_length[3]',      
            'apellido'  => 'required|min_length[3]|max_length[50]',
            'usuario'   => 'required|min_length[3]',
            'email'     => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'      => 'required|min_length[3]|max_length[10]'

        ],
        );

        $formModel = new Usuarios_model();

        if (!$input) {
            $data['titulo'] = 'registro';
            echo view('front/header_view', $data);
            echo view('front/nav_view');
            echo view('back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
            

        } else {
            $formModel->save([
                'nombre'    => $this->request->getVar('nombre'),
                'apellido'  => $this->request->getVar('apellido'),
                'usuario'   => $this->request->getVar('usuario'),
                'email'     => $this->request->getVar('email'),
                'pass'      => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                //pasword_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de unico sentido
                'perfil_id'  => 2
            ]);
            // Flashdata funciona solo en redirigir la funcion en el controlador a la vista de carga
            session()->setFlashdata('succes', 'Usuario registrado con exito');
            return redirect()->to(base_url('registro'));
        }
    }

    public function modoAdmin(){
        $usuarios = new Usuarios_model();
        $dato['usuarios'] = $usuarios->getUsuarioAll();
        
        $data['titulo'] = 'Crud de usuarios';
        echo view('front/header_view', $data);
        echo view('front/nav_view');
        echo view('back/usuario/crud_usuario', $dato);
        echo view('front/footer_view');
    }

    public function usuariosEliminados(){
        $usuarios = new Usuarios_model();
        $dato['usuarios'] = $usuarios->getUsuarioElimAll();
        
        $data['titulo'] = 'Usuarios baneados';
        echo view('front/header_view', $data);
        echo view('front/nav_view');
        echo view('back/usuario/usuarios_ban', $dato);
        echo view('front/footer_view');
    }

    public function deleteUsuario($id)
    {
        $usuarioModel = new Usuarios_model();
        // CAMBIO: Solo necesitamos actualizar el campo 'eliminado', no recuperar todo el objeto si no es necesario
        $data = ['baja' => 'SI']; // Array directamente con el campo a actualizar
        $usuarioModel->actualizarUsuario($id, $data);
        session()->setFlashdata('success', 'Usuario baneado.'); // Mensaje de éxito
        return $this->response->redirect(site_url('/usuarios')); // Redirigir a la lista de productos
    }

    public function activarUsuario($id)
    {
        $usuarioModel = new Usuarios_model();
        // CAMBIO: Solo necesitamos actualizar el campo 'eliminado'
        $data = ['baja' => 'NO']; // Array directamente con el campo a actualizar
        $usuarioModel->actualizarUsuario($id, $data);
        session()->setFlashdata('success', 'Usuario activado exitosamente.');
        return $this->response->redirect(site_url('/baneados')); // CAMBIO: Redirigir a la lista de productos activos
    }

    /*
    public function singleUsuario($id = null){
        $usuarioModel = new Usuarios_model();
        // Usamos getProductoById para asegurarnos de que cargamos un objeto con el alias 'producto_id'
        $data['old'] = $usuarioModel->getUsuarioAll($id);

        if (empty($data['old'])){
            // Lanzar una excepción de página no encontrada es una buena práctica
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se ha seleccionado un producto para editar.');
        }

        $data['titulo']='Editar Producto'; // CAMBIO: Título más apropiado para la vista de edición
        echo view('front/header_view', $data);
        echo view('front/nav_view');
        echo view('back/usario/editar_usuario', $data); // Carga la vista de edición
        echo view('front/footer_view');
    }*/

    /*MANEJAMOS LAS CONSULATAS */
    public function listar_consultas(){
        // instanciO
        $consultas = new consulta_model();

        //TRAEMOS TODO
        $data['consultas'] = $consultas->getConsultas();
        $dato['titulo'] = 'Gestion-Consultas';

        echo view('front/header_view', $dato);
        echo view('front/nav_view');
        echo view('back/consultas/listar_consultas', $data);
        echo view('front/footer_view');
    }

    public function atender_consulta($id = null){
        // instancio 
        $consultasM = new consulta_model();
        // tomamos por id
        $consultasM->getConsulta($id);
        /*actualizado*/
        $consultasM->update($id, ['respuesta' => 'SI']);
        return redirect()->to(base_url('listar_consultas'));
    }
    
    public function eliminar_consulta($id = null){
        // instancio
        $model = new consulta_model();
        $model->getConsulta($id);
        $model->delete($id);
        
        return redirect()->to(base_url('listar_consultas'));
    }

    public function Contact($id = null){
        $usuario = new Usuarios_model();
        // Usamos getProductoById para asegurarnos de que cargamos un objeto con el alias 'producto_id'
        $data['old'] = $usuario->getUsuarioAll($id);

        if (empty($data['old'])){
            // Lanzar una excepción de página no encontrada es una buena práctica
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se ha seleccionado un producto para editar.');
        }


        $dato['titulo']='Informacion de Contacto'; // CAMBIO: Título más apropiado para la vista de edición
        echo view('front/header_view', $dato);
        echo view('front/nav_view');
        echo view('front/info_Contact', $data); // Carga la vista de edición
        echo view('front/footer_view');
    }






    public function consultasValidation(){
        $input = $this->validate([
            'nombre'    => 'required|min_length[3]',      
            'apellido'  => 'required|min_length[3]|max_length[50]',
            'email'     => 'required|min_length[4]|max_length[100]',
            'telefono'  => 'required|min_length[4]|max_length[35]',
            'mensaje'   => 'required|min_length[5]|max_length[250]'

        ],
        );

        $consulta = new consulta_model();

        if (!$input) {
            $dato['titulo']='Informacion de Contacto'; // CAMBIO: Título más apropiado para la vista de edición
            echo view('front/header_view', $dato);
            echo view('front/nav_view');
            echo view('front/info_Contact', ['validation' => $this->validator]); // Carga la vista de edición
            echo view('front/footer_view');
            
            

        } else {
            $consulta->save([
                'nombre'    => $this->request->getVar('nombre'),
                'apellido'  => $this->request->getVar('apellido'),
                'email'     => $this->request->getVar('email'),
                'telefono'  => $this->request->getVar('telefono'),
                'mensaje'   => $this->request->getVar('mensaje')
                
            ]);
            // Flashdata funciona solo en redirigir la funcion en el controlador a la vista de carga
            session()->setFlashdata('succes', 'Consulta registrada con exito');
            return redirect()->to(base_url('Casa'));
        }
    }
} 
?>