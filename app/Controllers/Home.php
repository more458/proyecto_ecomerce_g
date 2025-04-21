<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $tituloVar['titulo'] = 'principal';
        echo view('front/header_view', $tituloVar);
        //echo view('front/nav_view');
        echo view('front/plantilla');
        echo view('front/footer_view');
    }

    public function quienes_somos()
 {
       $tituloVar['titulo']='quienes somos';
       echo view ('front/header_view',$tituloVar);
    	//echo view ('front/nav_view');
    	echo view ('front/quienesSomos');
    	echo view ('front/footer_view');
 }
}
