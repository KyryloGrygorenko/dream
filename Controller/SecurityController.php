<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Password;
use Library\Session;
use Model\Form\LoginForm;

class SecurityController extends Controller
{
    public function loginAction(Request $request)   {

        $form = new LoginForm($request);


        if ($request->isPost()) {
            if ($form->isValid()) {
                $repo = $this->get('repository')->getRepository('User');
                $password = new Password($form->password);
                $user = $repo->find($form->email, $password);
                if ($user){
                        Session::set('user', $user->getEmail());
                        Session::set('role', $user->getRole());
                        Session::setFlash('Logged in');
                        $this->get('router')->redirect('/');
                    }
                Session::setFlash('User not found');
                $this->get('router')->redirect('/login');
            }
            
            Session::setFlash('Fill the fields');
        }
        
        return $this->render('login.phtml');
    }
    
    public function logoutAction()
    {
        Session::remove('user');
        Session::remove('admin');
        Session::remove('role');

        $this->get('router')->redirect('/');
    }
    
    public function registerAction()
    {
        
    }
}