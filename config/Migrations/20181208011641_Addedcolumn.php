<?php
use Migrations\AbstractMigration;

class Addedcolumn extends AbstractMigration
{

    public function up()
    {

        $this->table('logs')
            ->addColumn('dumb_ass', 'string', [
                'after' => 'created_at',
                'default' => null,
                'length' => 45,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('logs')
            ->removeColumn('dumb_ass')
            ->update();
    }
}

