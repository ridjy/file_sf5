<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class ExcelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('fichier', FileType::class, [
            'label' => 'Import des comptes (fichier excel)',
            'mapped' => false,//n'est pas associé à une entité; il s'agit d'un import simple
            'required' => true,//il faut téléverser un fichier avant de soumettre le formulaire
            'constraints' => [
                new File([
                    'maxSize' => '1024k',//taille fichier max 1Mo 
                    'mimeTypes' => [
                        'application/vnd.ms-excel',
                        'application/excel', 
                        'application/vnd.msexcel', 
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    ],
                    'mimeTypesMessage' => 'Veuiller importer un fichier excel valide',
                ])
            ],
        ])
        ->add('send', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
