<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Função'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Excluir Função'), ['action' => 'delete', $role->id], ['confirm' => __('Tem certeza de que deseja excluir o cargo # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Funções'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Função'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles view content">
            <h3><?= h($role->description) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descrição') ?></th>
                    <td><?= h($role->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($role->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ativo?') ?></th>
                    <td><?= $role->is_active ? __('Sim') : __('Não'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Usuários Relacionados') ?></h4>
                <?php if (!empty($role->users)) : ?>
                    <div class="table-responsive">
                        <table style="text-wrap: nowrap;">
                            <tr>
                                <th><?= __('#') ?></th>
                                <th><?= __('Ativo?') ?></th>
                                <th><?= __('Criado') ?></th>
                                <th><?= __('Nome') ?></th>
                                <th><?= __('Sobrenome') ?></th>
                                <th><?= __('E-mail') ?></th>
                                <th class="actions"><?= __('Ações') ?></th>
                            </tr>
                            <?php foreach ($role->users as $users) : ?>
                                <tr>
                                    <td><?= h($users->id) ?></td>
                                    <td><?= h($users->is_active) ?></td>
                                    <td><?= h($users->created->format('d/m/Y H:i:s')) ?></td>
                                    <td><?= h($users->name) ?></td>
                                    <td><?= h($users->last_name) ?></td>
                                    <td><?= h($users->email) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                        <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                        <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Tem certeza de que deseja excluir o usuário # {0}?', $users->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>