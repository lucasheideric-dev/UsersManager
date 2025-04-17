<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public function testIndex()
    {
        $this->session(['Auth.User' => [
            'id' => 1,
            'name' => 'Lucas',
            'last_name' => 'Heideric',
            'email' => 'lucas@gmail.com',
            'password' => '$2y$10$phh7xbfTwsGsnsetR.4pjuamrBQNFc1Vy3X38qqTNGqVC8SoFKNau',
            'role' => '1',
        ]]);

        $this->get('/users');
        $this->assertResponseOk();
    }

    public function testLogout()
    {
        $this->session(['Auth.User' => [
            'id' => 1,
            'name' => 'Lucas',
            'last_name' => 'Heideric',
            'email' => 'lucas@gmail.com',
            'password' => '$2y$10$phh7xbfTwsGsnsetR.4pjuamrBQNFc1Vy3X38qqTNGqVC8SoFKNau',
            'role' => '1',
        ]]);

        // Faz a requisição para a ação de logout
        $this->get('/users/logout');

        // Verifica se a sessão foi destruída (espera que a variável de sessão 'Auth.User' não exista mais)
        $this->assertSession(null, 'Auth.User');

        // Verifica se houve redirecionamento para a página de login
        $this->assertRedirect(['action' => 'login']);
    }
}
