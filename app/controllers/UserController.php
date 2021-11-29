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
        $this->userRepository = new UserRepositoryMariaDB(
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
            $user = $this->repository->getByCriteria($name);
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
                    new User(
                        null, 
                        $_POST['name'],
                        $_POST['password'],
                        $_POST['rut'],
                        $_POST['role_id']
                    )
                );
            } catch (Exception | PDOException $e) {
                $router->renderView('exception', [
                    'errors' => $e->getMessage()
                ]);
                exit;
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
        Auth::canEdit();

        $id = (int) $_GET['id'] ?? ''; // no existe 
        $user = $this->repository->getById($id);

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->update(
                    new User(
                        $_POST['id'], 
                        $_POST['name'], 
                        $_POST['rut'] ,      
                        $_POST['role_id'], 
                        $_POST['is_active']
                    )
                );
            } catch (exception | pdoexception $e) {
                $router->renderView('exception', [
                    'errors' => $e->getmessage()
                ]);
                exit;
            }

            header('Location: /user');
            exit;
        }

        $roles = $this->rolerepository->getAll();

        $router->renderView('user/update', [
            'user' => $user->toPrimitives(),
            'errors' => $errors,
            'roles' => $roles
        ]);

    }

    public function updatePassword(Router $router)
    {
        Auth::canEdit();

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // TODO: Obtain user from database (To fill correctly the constructor)
                $this->repository->updatePassword(
                    new User(
                        $_POST['id'], 
                        $_POST['password']
                    )
                );
                $newUser = $this->repository->getById($_POST['id']);

                $newUser->changePassword($_POST['password']);

                $this->repository->updatePassword($newUser);

            } catch (exception | pdoexception $e) {
                $router->renderView('exception', [
                    'errors' => $e->getmessage()
                ]);
                exit;
            }

            header('Location: /user');
            exit;
        }
        $id = (int) $_GET['id'] ?? ''; // no existe 
        $user = $this->repository->getById($id);

        $router->renderView('user/updatePassword', [
            'user' => $user->toPrimitives(),
            'errors' => $errors
        ]);

    }

    public function remove(Router $router)
    {
        echo 'Remove User Page';
    }

    public function login(Router $router)
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $userId = $this->repository->login(
                    $_POST['rut'],
                    $_POST['password']
                );

                if (!$userId) {
                    throw new Exception('No se encuentra el usuario en nuestra base de datos');
                }

                session_start();

                $_SESSION['userId'] = $userId;
                $_SESSION['isActive'] = true;

                header('Location: /');
                exit;
            } catch (Exception $e) {
                $router->renderView('exception', [
                    'errors' => $e->getMessage()
                ]);
                exit;
            } catch (PDOException $e) {
                $router->renderView('exception', [
                    'errors' => $e->getMessage()
                ]);
                exit;
            }
        }

        $router->renderView('user/login', [
            'errors' => $errors
        ]);
    }

    public function logout(Router $router)
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /');
        exit;
    }


    public function UserGrafic(Router $router){
        
        $router->renderView('user/userGrafic');


    }
}
