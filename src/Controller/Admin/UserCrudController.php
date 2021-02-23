<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * Class UserCrudController
 * @package App\Controller\Admin
 */
class UserCrudController extends AbstractCrudController
{
    /**
     * @param Crud $crud
     * @return Crud
     */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('Users')
            ->setEntityLabelInSingular(
                function (?User $user) {
                    return $user ? $user->toString() : 'User';
                }
            )
            ->setEntityLabelInPlural(function (?User $user, string $pageName = null) {
                return 'edit' === $pageName ? $user->toString() : 'Users';
            })
            ->setEntityPermission('ROLE_ADMIN');
    }

    /**
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        $resetPassword = Action::new('resetPassword', 'Reset password', 'fa fa-unlock-alt')
            ->linkToRoute('app_forgot_password_request');

        return $actions
            ->add(Crud::PAGE_INDEX, $resetPassword)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ;
    }

    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
}