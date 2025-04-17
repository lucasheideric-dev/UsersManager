<div class="roles index content" style="margin-top: 100px;">
    <?= $this->Html->link(__('Novo Registro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Funções') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'ID']) ?></th>
                    <th><?= $this->Paginator->sort('is_active', ['label' => 'Ativo?']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Data Criação']) ?></th>
                    <th><?= $this->Paginator->sort('description', ['label' => 'Função']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?= $this->Number->format($role->id) ?></td>
                        <td><?= $role->is_active ? 'Sim' : 'Não' ?></td>
                        <td><?= $role->created->format('d/m/Y H:i:s') ?></td>
                        <td><?= $role->description ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                '<i class="fas fa-eye"></i>',
                                ['action' => 'view', $role->id],
                                ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-sm btn-outline-primary']
                            ) ?>

                            <?= $this->Html->link(
                                '<i class="fas fa-edit"></i>',
                                ['action' => 'edit', $role->id],
                                ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-sm btn-outline-warning']
                            ) ?>

                            <?= $this->Form->postLink(
                                '<i class="fas fa-trash-alt"></i>',
                                ['action' => 'delete', $role->id],
                                [
                                    'escape' => false,
                                    'title' => __('Delete'),
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $role->id)
                                ]
                            ) ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator" style="margin-top: 15px;">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev(__('Retornar')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo')) ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, exibindo {{current}} registro(s) de um total de {{count}}')) ?></p>
    </div>
</div>