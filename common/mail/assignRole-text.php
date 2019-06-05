<?php
use yii\helpers\Html;
/* @var $project common\models\Project
 * @var $user common\models\User
 * @var $role string
 */
?>

Привет <?= Html::encode($data['user']->username) ?>

Тебе назначили должность <?= $data['role'] ?> в проекте <?= $data['project']->title ?>

