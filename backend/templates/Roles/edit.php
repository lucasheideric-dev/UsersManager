<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $role->id],
                ['confirm' => __('Tem certeza de que deseja função o cargo # {0}?', $role->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Funções'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles form content">
            <?= $this->Form->create($role) ?>
            <fieldset>
                <legend><?= __('Editar Função') ?></legend>
                <?php
                echo $this->Form->control('is_active', ['label' => 'Ativo?']);
                echo $this->Form->control('description', ['label' => 'Descrição']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>