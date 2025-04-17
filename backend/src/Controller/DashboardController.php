<?php

declare(strict_types=1);

namespace App\Controller;

class DashboardController extends AppController
{
    public function index()
    {
        $this->loadModel('Users');
        $this->loadModel('Roles');

        $users = $this->Users->find('all', ['contain' => ['Roles']])->all();
        $roles = $this->Roles->find('all')->all();

        $this->set(compact('users', 'roles'));
    }
}
