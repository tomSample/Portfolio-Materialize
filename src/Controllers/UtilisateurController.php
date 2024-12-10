<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class UtilisateurController extends Controller {

    /**
     * @Route("/user", name="user_index")
     */
    public function index() {
        $userModel = new Utilisateur();
        $users = $userModel->getUsers();
        $this->render('user/index', [
            'users' => $users
        ]);
    }
}
?>