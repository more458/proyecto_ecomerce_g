<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
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
            ]);
            // Flashdata funciona solo en redirigir la funcion en el controlador a la vista de carga
            session()->setFlashdata('succes', 'Usuario registrado con exito');
            return redirect()->to(base_url('registro'));
        }
    }
}