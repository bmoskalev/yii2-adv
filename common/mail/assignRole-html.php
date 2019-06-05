<?php
use yii\helpers\Html;

 /* @var $project common\models\Project
 * @var $user common\models\User
 * @var $role string
 */
?>
<div>
    <p>Привет <?= Html::encode($data['user']->username) ?></p>
    <p>Тебе назначили должность <?= $data['role'] ?> в проекте <?= $data['project']->title ?></p>
</div>
