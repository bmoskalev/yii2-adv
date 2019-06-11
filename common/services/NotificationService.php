<?php


namespace common\services;


use common\models\Project;
use common\models\User;
use yii\base\Component;

class NotificationService extends Component
{
    private $emailService;

    public function __construct(EmailServiceInterface $emailService, array $config = [])
    {
        parent::__construct($config);
        $this->emailService = $emailService;
    }

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
        $this->emailService->send($to, $subject, $viewHTML, $viewText, $data);
    }
}