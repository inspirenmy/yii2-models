<?php
/**
 * @author: dep
 * Date: 08.07.16
 */

namespace inspirenmy\models;
use inspirenmy\behaviors\SanitizeBehavior;
use inspirenmy\traits\AjaxValidationTrait;
use yii\helpers\ArrayHelper;


/**
 * Common for any Model e.g. Form.
 * Apply sanitize rules and ajax validation trait to Model class
 */
class Model extends \yii\base\Model
{
    use AjaxValidationTrait;



    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            SanitizeBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), $this->getSanitizeRules());
    }


}