<?php $title = 'Developer Heideric'; ?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<style>
    .navbar-project {
        background-color: #002A51;
        width: 100%;
    }
</style>

<body>
    <div class="navbar-project">
        <nav class="top-nav">
            <div class="top-nav-title">
                <a href="<?= $this->Url->build('/') ?>"><i class="fa-solid fa-code"></i> <span style="color: white;">Developer </span>Heideric</a>
            </div>
            <div class="top-nav-links">
                <a class="link-nav" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']); ?>">Dashboard</a>
                <a class="link-nav" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>">Usuários</a>
                <a class="link-nav" href="<?= $this->Url->build(['controller' => 'Roles', 'action' => 'index']); ?>">Funções</a>
                <a class="link-nav" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Sair</a>
            </div>
    </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>