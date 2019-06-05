<?php


namespace common\services;


use common\models\Project;
use common\models\User;
use Yii;

class NotificationService
{
    public function sendAboutNewProjectRole(Project $project, User $user, $role)
    {
        $to = $user->email;
        $data = [
            'project' => $project,
            'user' => $user,
            'role' => $role];
        $subject = 'У вас новая должность.';
        $viewHTML = 'assignRole-html';
        $viewText = 'assignRole-text';
        Yii::$app->emailService->send($to, $subject, $viewHTML, $viewText, $data);
    }
}