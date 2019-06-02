<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
/* @var $users array */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList(\common\models\Project::STATUS_LABELS) ?>

    <?= $form->field($model, \common\models\Project::RELATION_PROJECT_USERS)
        ->widget(\unclead\multipleinput\MultipleInput::class, [
            'id' => 'project-user-widget',
            'min' => 0,
            'max' => 10,
            'addButtonPosition' => \unclead\multipleinput\MultipleInput::POS_HEADER,
            'columns' => [
                [
                    'name' => 'project_id',
                    'type' => 'hiddenInput',
                    'defaultValue' => $model->id,
                ],
                [
                    'name' => 'user_id',
                    'type' => 'dropDownList',
                    'title' => 'User',
                    'items' => $users,
                ],
                [
                    'name' => 'role',
                    'type' => 'dropDownList',
                    'title' => 'Role',
                    'items' => \common\models\ProjectUser::ROLE_LABELS,
                ],
            ]
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
