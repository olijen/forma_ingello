<?php

use yii\db\Migration;

/**
 * Class m220309_132601_add_table_volunteers
 */
class m220309_132601_add_table_volunteers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('volunteer', [
            'id' => $this->primaryKey(),
            'status' => $this->tinyInteger(1), #Статус
            'full_name' => $this->string(100), #ФИО
            'phone' => $this->string(50), #Номер телефона
            'support_type' => $this->tinyInteger(8), #Тип помощи - мультиселект из вариантов
            'comment' => $this->text(),  #Комментарий
            'capacity' => $this->tinyInteger(3),  #Вместимость
            'options' => $this->text(),  #Опции
            'created_at' => $this->datetime()->defaultValue(date('Y-m-d H:i:s')), #Когда создано
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('volunteer');
    }
}
