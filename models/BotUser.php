<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bot_user".
 *
 * @property int $id
 * @property string $telegram_id
 * @property string|null $trello_token
 * @property string $role
 * @property string|null $name
 * @property string $status
 */
class BotUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram_id', 'status'], 'required'],
            [['role', 'status'], 'string'],
            [['telegram_id', 'trello_token', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_id' => 'Telegram ID',
            'trello_token' => 'Trello Token',
            'role' => 'Role',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
}
