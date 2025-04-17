<style>
    .navbar-project {
        display: none !important;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f6f9;
    }

    .login-card {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .login-card h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-login {
        width: 100%;
        background-color: #002A51;
        border-color: #002A51;
        color: white;
        font-size: 16px;
    }

    .btn-login:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .forgot-password {
        text-align: center;
        margin-top: 10px;
    }

    .forgot-password a {
        color: #007bff;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    .logo {
        font-size: 2.4rem;
        color: #002A51;
        text-align: center;
        margin-bottom: 15px;
    }

    .logo span {
        font-family: system-ui;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <?= $this->Form->create() ?>
        <div class="logo"><i class="fa-solid fa-code"> <span>Login</span></i></div>
        <fieldset>
            <?= $this->Form->control('email', ['label' => 'E-mail', 'class' => 'form-control', 'required' => true]) ?>
            <?= $this->Form->control('password', ['label' => 'Senha', 'type' => 'password', 'class' => 'form-control', 'required' => true]) ?>
        </fieldset>
        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-login']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>