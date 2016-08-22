<?php
/**
 * @author: dep
 * Date: 08.07.16
 */

namespace demmonico\models;

use demmonico\behaviors\SanitizeBehavior;
use demmonico\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;


/**
 * Common for any ActiveRecord models
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    const DATETIME_FORMAT = 'Y-m-d H:i:s';
    const SCENARIO_SEARCH = 'search';

    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), $this->getSanitizeRules());
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            SanitizeBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($this->hasErrors()){
            \Yii::error($this->collectErrors(), 'db');
        }
    }

    /**
     * @return string
     */
    public function collectErrors()
    {
        return 'An error occurred while saving model '.get_called_class().'.'.PHP_EOL.
            'Model attributes: '.Json::encode($this->getAttributes()).PHP_EOL.
            'Model errors: '.Json::encode($this->getErrors()).PHP_EOL;
    }

}

