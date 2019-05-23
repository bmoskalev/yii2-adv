<?php

namespace common\modules\chat\controllers;

use common\modules\chat\components\Chat;
use Ratchet\Server\IoServer;
use yii\console \Controller;

/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $server = IoServer::factory(
            new Chat(),
            8080
        );
        echo 'Server run' . PHP_EOL;
        $server->run();
        echo 'Server stop' . PHP_EOL;
    }
}
