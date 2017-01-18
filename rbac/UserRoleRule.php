<?php
namespace app\rbac;
use Yii;
use yii\rbac\Rule;

class UserRoleRule extends Rule
{
    public $name = 'userRole';

    public function execute($user, $item, $params)
    {
        $assignment = \Yii::$app->authManager->getAssignment('user', $user);
        if (!$assignment) {
            return false;
        }
        return true;
    }
}