<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Request;
use App\Commands\Installation;
use App\Core\Logger;


class RequestController extends Controller
{
    public function indexAction() : mixed
    {
        if (!Installation::checkIfTableExists()) return $this->view->redirect('/install');

        $requests = new Request;
        $requests = $requests->getAll();
        return $this->view->render('requests/list', $requests);
    }

    public function createAction($request = []) : mixed
    {
        $requestRooms = new Request;
        $requestRooms = $requestRooms->getRooms();
        $data = [
            'rooms' => $requestRooms,
            'request' => $request['data'] ?? [],
        ];

        return $this->view->render('requests/create', $data, $request['errors'] ?? []);
    }

    public function addAction() : mixed
    {
        $errors = $this->validation($_POST);

        if (!empty($errors)) {
            return $this->createAction([
                'data' => $_POST,
                'errors' => $errors
            ]);
        }
        
        $request = new Request;
        $pdo = $request->addReserve($_POST);
        
        return $this->view->redirect('/');
    }

    public function installAction() : mixed
    {
        Logger::store((Installation::installFiles()) ? 'Database installed' : 'Database is already installed');
        return $this->view->render('requests/install');
    }

    private function validation(array $request) : array
    {
        $errors = [];

        $check = new Request;
        if (!$check->checkAvailiable($request)) $errors[] = [
            'type' => 'danger',
            'message' => 'This room is already reserved, please choose another one!'
        ];

        return $errors;
    }
}