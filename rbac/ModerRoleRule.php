<?php
namespace app\rbac;
use Yii;
use yii\rbac\Rule;

class ModerRoleRule extends Rule
{
    public $name = 'moderRole';

    public function execute($user, $item, $params)
    {
        $assignment = \Yii::$app->authManager->getAssignment('moder', $user);
        if (!$assignment) {
            return false;
        }
        return true;
    }
}