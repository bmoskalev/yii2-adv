<?php

use common\models\Project;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'title',
                'value' => function (Project $model) {
                    return HTML::a($model->title, ['project/view', 'id' => $model->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => Project::RELATION_PROJECT_USERS . '.role',
                'value' => function (Project $model) {
                    return join(',', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'active',
                'filter' => Project::STATUS_LABELS,
                'value' => function (Project $model) {
                    return Project::STATUS_LABELS[$model->active];
                },
            ],
            'description:ntext',
            'active',
            [
                'attribute' => 'creator_id',
                'value' => function (Project $model) {
                    return HTML::a($model->creator->username, ['user/view', 'id' => $model->creator->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'updater_id',
                'value' => function (Project $model) {
                    return HTML::a($model->updater->username, ['user/view', 'id' => $model->updater->id]);
                },
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datetime',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
