<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\user\domain\User;
use LosYuntas\user\domain\UserRepository;
use LosYuntas\role\domain\RoleRepository;
use LosYuntas\user\infrastructure\UserRepositoryMariaDB;
use LosYuntas\role\infrastructure\RoleRepositoryMariaDB;
use Exception;
use PDOException;


final class UserController
{

    private UserRepository $repository;
    private RoleRepository $rolerepository;

    public function __construct()
    {
        $this->repository = new UserRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );

        $this->rolerepository = new RoleRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );
    } 

    public function index(Router $router)
    {
        Auth::canEdit();

        $name = $_GET['search'] ?? '';
        if (!$name) {
            $user = $this->repository->getAll();
        } else {
            $user = $this->repository->getByName($name);
        }

        $roles = $this-> rolerepository -> getAll();

        $router->renderView('user/index', [
            'user' => $user,
            'roles' => $roles
        ]);
    }


    public function add(Router $router)
    {
        Auth::canEdit();
      
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            try {
                $this->repository->add(
                    new User($_POST['name'],$_POST['password'],$_POST['rut'],$_POST['role_id'])
                );
            } catch (Exception | PDOException $e) {
                $errors[] = $e->getMessage();
            }
        }

        $roles = $this-> rolerepository -> getAll();
        $user = $this->repository->getAll();

        $router->renderView('user/index', [
            'user' => $user,
            'errors' => $errors,
            'roles' => $roles
        ]);
    }

    public function update(Router $router)
    {
        
        // Auth::canEdit();
      
        // $errors = [];
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        //     try {
        //         $this->repository->update(
        //             new User($_POST['role_id'])
        //         );
        //     } catch (Exception | PDOException $e) {
        //         $errors[] = $e->getMessage();
        //     }
        // }

        // $user = $this->repository->getAll();

        // $router->renderView('user/index', [
        //     'user' => $user,
        // ]);

    }

    public function remove(Router $router)
    {
        echo 'Remove User Page';
    }
}
