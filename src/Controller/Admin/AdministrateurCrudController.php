<?php

namespace App\Controller\Admin;

use App\Entity\Administrateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdministrateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Administrateur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email'),
            ChoiceField::new('roles')
                ->setChoices([
                    'ROLE_ADMIN',
                    'ROLE_ADOPTANT',
                    'ROLE_USER',
                    'ROLE_SPA',
                ])
                ->allowMultipleChoices(),
            TextField::new('plainPassword'),
        ];
    }
}