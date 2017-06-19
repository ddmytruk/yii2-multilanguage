<?php

use yii\db\Migration;
use yii\db\Expression;

class m170619_113009_add_lang_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('lang', [
            'id'        => $this->primaryKey(),
            'url'       => $this->string(255)->unique()->notNull(),
            'local'     => $this->string(255)->unique()->notNull(),
            'name'      => $this->string(255)->unique()->notNull(),
            'default'   => $this->integer(6)->defaultValue(0),
            'created_at'=> $this->dateTime()->notNull(),
            'updated_at'=> $this->dateTime()->notNull(),
        ]);

        $now_date = new Expression('NOW()');

        $this->batchInsert('lang', ['url', 'local', 'name', 'default', 'created_at', 'updated_at'], [
            ['en', 'en-EN', 'English', 0, $now_date, $now_date],
            ['ru', 'ru-RU', 'Русский', 1, $now_date, $now_date],
            ['uk', 'uk-UA', 'Український', 0, $now_date, $now_date],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('lang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170619_113009_add_lang_table cannot be reverted.\n";

        return false;
    }
    */
}
