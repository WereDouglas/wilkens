<?php
use Migrations\AbstractMigration;

class Addedthis extends AbstractMigration
{

    public function up()
    {

        $this->table('departments')
            ->addColumn('fuck_this', 'string', [
                'after' => 'company_id',
                'default' => null,
                'length' => 45,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('departments')
            ->removeColumn('fuck_this')
            ->update();
    }
}

