<?php

namespace App\Form;

use App\Entity\Adoptant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mail', EmailType::class)
            ->add('motDePasse', PasswordType::class)
            ->add('telephone', TelType::class)
            ->add('ville')
            ->add('departement')
            ->add('nom')
            ->add('prenom')
            ->add("submit", SubmitType::class, [
                'label' => "Valider",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adoptant::class,
        ]);
    }
}
