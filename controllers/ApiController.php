<?php

namespace app\controllers;

use app\models\Logs;

/**
 * Class ApiController
 * @package app\controllers
 */
class ApiController extends \yii\web\Controller
{
    private $bot;

    private $logs;

    public function beforeAction($action)
    {
        $logs = new Logs();
        $logs->request = file_get_contents('php://input');
        $this->setLogs($logs);

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        $logs = $this->getLogs();
        $logs->response = json_encode($result);
        $logs->save(false);

        return $result;
    }

    public function start()
    {
        $bot = $this->bot = \Yii::$app->getBot();

        $this->bot->command('start', function ($message) use ($bot) {
            $answer = 'Добро пожаловать! твой чат id - ' . $message->getChat()->getId();
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });

    }

    /**
     * @return mixed
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * @param mixed $logs
     */
    public function setLogs($logs)
    {
        $this->logs = $logs;
    }


}
