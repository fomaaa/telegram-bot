<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Api extends Component
{
    private $token = '1426582351:AAEQwRpwfenmpR6e4xCg2BLI6RA_RbP__9w';

    public $bot;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $bot
     */
    public function setBot()
    {
        $this->bot = new \TelegramBot\Api\Client($this->getToken());
    }

    /**
     * @return mixed
     */
    public function getBot()
    {
        return $this->bot;
    }




}
