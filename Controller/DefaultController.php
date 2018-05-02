<?php

namespace Controller;

use Library\Controller;
use Library\JsonResponse;
use Library\Pagination\Pagination;
use Library\Password;
use Library\Request;
use Library\Session;

class DefaultController extends Controller
{
    const USERS_PER_PAGE = 5;

    public function indexAction(Request $request)
    {
        return $this->render('index.phtml');
    }

    public function showAction(Request $request)
    {
//        check if user's role is admin and deny access if it is not admin
        if (Session::get('role') == 'admin' ){
            $repository = $this->get('repository')->getRepository('User');
            if ($request->get('tag') ) {
                $tag = $request->get('tag');
            }elseif($request->post('tag')){
                $tag = $request->post('tag');
            };
//            getting all the user's data from database if the tag was not received or get data by tag if we have tag
        if (isset($tag) && $tag != '') {
                $currentPage = $request->get('page', 1);
                $count = $repository->countByTag($tag);
                $users = $repository->findByTag(($currentPage - 1) * self::USERS_PER_PAGE, self::USERS_PER_PAGE, $tag);
            }else{
                $currentPage = $request->get('page', 1);
                $count = $repository->count();
                $users = $repository->findAll(($currentPage - 1) * self::USERS_PER_PAGE, self::USERS_PER_PAGE);

            }
            $tag = isset($tag) ? $tag : '';
//        Pagination
            $pagination = new Pagination([
                'itemsCount' => $count,
                'itemsPerPage' => self::USERS_PER_PAGE,
                'currentPage' => $currentPage
            ]);
//            Data array that will be passed to the View
            $data = [
                'users' => $users,
                'pagination' => $pagination,
                'tag' => $tag,
            ];
            return $this->render('show.phtml',$data);
        }
            Session::setFlash('You are not allowed to access this page');
            return $this->render('index.phtml');

    }

    public function addAction(Request $request)
    {
        //adding new user to DB
        if ($request->post('name') ) {
            $name = $request->post('name');
            $email = $request->post('email');
            $password = new Password($request->post('password'));
            $role = $request->post('role');
            $repository = $this->get('repository')->getRepository('User');
            $repository->add($name,$email,$password,$role);
            $this->get('router')->redirect('/users');
        };

        return $this->get('router')->redirect('/users');
    }

    public function updateAction(Request $request)
    {
        //updating user's profile in DB
        if ($request->post('user_name') ){
            $user_id = $request->post('user_id');
            $name = $request->post('user_name');
            $email = $request->post('user_email');
            $role = $request->post('user_role');

            $repository = $this->get('repository')->getRepository('User');
            $repository->update($user_id, $name, $email, $role);

            if ($password = $request->post('user_password') ) {
                $password = new Password();
                $repository->updatePassword($user_id,$password);
            }
        };

        return $this->get('router')->redirect('/users');
    }

    public function deleteAction(Request $request)
    {
        //this Action is receiving request via AJAX to delete user row from DB by user_id
        if ($request->post('delete_user'))
        {
            $repository = $this->get('repository')->getRepository('User');
            $repository->delete($request->post('user_id') );
            $user_name = $request->post('user_name');
            $response = 'Користувача ' .$user_name. ' було видалено з бази даних.';
            $data = [
                'response' => $response
            ];
            $response = new JsonResponse($data);
            $response->send();
            return $response;
        }
    }

}