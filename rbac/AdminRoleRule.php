<?php
namespace app\rbac;
use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use app\models\User;

class AdminRoleRule extends Rule
{
    public $name = 'adminRole';

    public function execute($user, $item, $params)
    {
        $assignment = \Yii::$app->authManager->getAssignment('admin', $user);
        if (!$assignment) {
            return false;
        }
        return true;
    }

}