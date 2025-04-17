<div class="dashboard index content" style="margin-top: 100px;">
    <h2>Dashboard</h2>
    <hr>
    <div class="row" style="margin-top: 35px;">
        <div class="column column-50">
            <h3>Usuários</h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>E-mail</th>
                            <th>Cargo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= h($user->id) ?></td>
                                <td><?= h($user->name) ?></td>
                                <td><?= h($user->last_name) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->role->description ?? 'Sem cargo') ?></td>
                                <td><?= $user->is_active ? 'Ativo' : 'Inativo' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="column column-50">
            <h3>Cargos</h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($roles as $role): ?>
                            <tr>
                                <td><?= h($role->id) ?></td>
                                <td><?= h($role->description) ?></td>
                                <td><?= $role->is_active ? 'Ativo' : 'Inativo' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>