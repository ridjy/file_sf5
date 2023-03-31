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
            // unmapped means that this field is not associated to any entity property
            'mapped' => false,
            // make it optional so you don't have to re-upload the PDF file
            // every time you edit the Product details
            'required' => true,
            // unmapped fields can't define their validation using annotations
            // in the associated entity, so you can use the PHP constraint classes
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/vnd.ms-excel', 
                        'application/x-csv', 
                        'application/csv', 
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
