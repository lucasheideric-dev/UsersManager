<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Usuário'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Excluir Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza de que deseja excluir o cargo # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Usuário'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->description) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descrição') ?></th>
                    <td><?= h($user->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ativo?') ?></th>
                    <td><?= $user->is_active ? __('Sim') : __('Não'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>