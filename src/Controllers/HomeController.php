<?php
namespace App\Controllers;

class HomeController extends Controller {
    
    /**
     * @Route("/", name="home_index")
     */
    public function index() {
        $this->render('home/index', [
            'controller_name' => 'HomeController',
        ]);
    }
}
?>