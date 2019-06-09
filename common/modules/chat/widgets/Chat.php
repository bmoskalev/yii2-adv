<?php

namespace common\modules\chat\widgets;

use common\modules\chat\widgets\assets\ChatAsset;
use yii\bootstrap\Widget;

class Chat extends Widget
{
    public $wsPort = 8080;
    public $username;
    public $avatar;
    public function init()
    {
        $this->view->registerJsVar('wsPort', $this->wsPort);
        $this->view->registerJsVar('username', $this->username);
        $this->view->registerJsVar('avatar', $this->avatar);
        ChatAsset::register($this->view);
    }

    public function run()
    {
        return $this->render('chat');
    }
}