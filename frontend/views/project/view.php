<?php

use common\models\Project;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            'description:ntext',
//            'active',
//            'creator_id',
//            'updater_id',
//            'created_at',
//            'updated_at',
            [
                'attribute' => 'active',
                'format' => 'raw',
                'value' => \common\models\Project::STATUS_LABELS[$model->active]
            ],
            [
                'attribute' => 'creator',
                'format' => 'raw',
                'value' => function (Project $model) {
                    return HTML::a($model->creator->username, ['user/view', 'id' => $model->creator->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'updater',
                'format' => 'raw',
                'value' => function (Project $model) {
                    return HTML::a($model->updater->username, ['user/view', 'id' => $model->updater->id]);
                },
                'format' => 'html',
             ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
