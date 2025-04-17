<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Tem certeza de que deseja função o cargo # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Usuário') ?></legend>
                <?php
                echo $this->Form->control('is_active', ['label' => 'Ativo?']);
                echo $this->Form->control('name', ['label' => 'Nome']);
                echo $this->Form->control('last_name', ['label' => 'Sobrenome']);
                echo $this->Form->control('email', ['label' => 'E-mail']);
                echo $this->Form->control('password', ['label' => 'Senha', 'value' => '', 'required' => false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>