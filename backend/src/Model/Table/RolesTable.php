<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class RolesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('entities.roles');
        $this->setPrimaryKey('id');
        $this->setDisplayField('description');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'role_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
