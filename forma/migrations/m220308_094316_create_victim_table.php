<?php

use yii\db\Migration;

/**
 * Handles the creation of table `victim`.
 */
class m220308_094316_create_victim_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('victim', [
            'id' => $this->primaryKey(),
            'fullname' =>  $this->text(), #  ФИО
            'birthday' => $this->date(),  # Дата рождения
            'is_child' => $this->tinyInteger(1),  # Ребенок ли?
            'place_of_residence' => $this->text(),  # Адрес прописки
            'second_residence' => $this->text(),  # Вторая прописка
            'name_where_to_settle' => $this->text(),  # Где поселят
            'settlement_address' => $this->text(),  # settlement_address ???
            'phone' => $this->text(),  # Телефон
            'registered_at' => $this->date(),  # ДАТА Реєстрації
            'stay_for' => $this->text(),  # Час перебування - текст (не время)
            'questions' => $this->text(),  # Порушені питання
            'specialization' => $this->text(),  #Специализация
            'destination' => $this->text(), # Куди хоче потрапити
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('victim');
    }
}
