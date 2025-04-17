<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('entities.users');
        $this->setPrimaryKey('id');
        $this->setDisplayField('name');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('email', 'Email é obrigatório')
            ->email('email', 'Email inválido')
            ->notEmptyString('password', 'Senha é obrigatória');

        return $validator;
    }
}
