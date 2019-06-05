<?php


namespace common\services;


use Yii;
use yii\base\Component;

class EmailService extends Component
{
    public function send($to, $subject, $viewHTML, $viewText, $data)
    {
        Yii::$app
            ->mailer
            ->compose(
                ['html' => $viewHTML, 'text' => $viewText],
                ['data' => $data])
            ->setFrom([\Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($to)
            ->setSubject($subject)
            ->send();
    }
}