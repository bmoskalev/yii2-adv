<?php

namespace frontend\modules\api\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\api\models\Project]].
 *
 * @see \frontend\modules\api\models\Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\modules\api\models\Project[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\modules\api\models\Project|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
