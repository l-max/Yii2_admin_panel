<?php
namespace app\commands;
use Yii;
use yii\console\Controller;
use app\rbac\UserRoleRule;
use app\rbac\ModerRoleRule;
use app\rbac\AdminRoleRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $rule = new UserRoleRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $auth->add($user);

        $moderRule = new ModerRoleRule();
        $auth->add($moderRule);

        $moder = $auth->createRole('moder');
        $moder->description = 'Модератор';
        $moder->ruleName = $moderRule->name;
        $auth->add($moder);

        $adminRule = new AdminRoleRule();
        $auth->add($adminRule);

        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $adminRule->name;
        $auth->add($admin);

        $auth->assign($admin, 1);
        $auth->assign($moder, 2);
        $auth->assign($user, 3);
    }

}