#Yii2 models library
##Description
Yii2 models library which used in web-application development.



##Composition
###ActiveRecord

ActiveRecord model overload parent `\yii\db\ActiveRecord`. 
This add features:
 - sanitize rules (see [https://github.com/demmonico/yii2-behaviors](https://github.com/demmonico/yii2-behaviors))
 - TimestampBehavior for autocomplete create and update date fields if they exists in any child model
 - autocollect model saving errors at application logs.

#####Usage:

```php
class AnyModel extends \demmonico\models\ActiveRecord {...}
```

###Model
Model model overload parent `\yii\base\Model`. 
This add features:
 - sanitize rules (see [https://github.com/demmonico/yii2-behaviors](https://github.com/demmonico/yii2-behaviors))
 - perform ajax validation method (see [https://github.com/demmonico/yii2-traits](https://github.com/demmonico/yii2-traits)).
 
So sanitize rule can inherits by any form.  

#####Usage:

in model 

```php
class AnyForm extends \demmonico\models\Model {...}
```

in controller use ajax validation

```php
if (!is_null($validate = $model->performAjaxValidation()))
            return $validate;
```
