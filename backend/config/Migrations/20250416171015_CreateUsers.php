<?php

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('is_active', 'boolean', ['default' => true, 'null' => false])
            ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => false])
            ->addColumn('name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('last_name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 300, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 300, 'null' => false])
            ->addColumn('role_id', 'integer', ['null' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}
