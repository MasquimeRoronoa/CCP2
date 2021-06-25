<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Photographe;
use App\Entity\Photos;
use App\Entity\Techniques;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                'required'=>'false',
                'label'=>' '
            ])
            ->add('TitrePhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('DimensionPhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('DatePhoto', DateTimeType::class, [
                'label'=>' '

            ])
            ->add('VitessePhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('OuverturePhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('IsoPhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('FocalePhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('ObjectifPhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('AppareilPhoto', TextType::class, [
                'label'=>' '
            ])
            ->add('categories', EntityType::class, [
                'class'=>Categories::class,
                'label'=>' ',
                'choice_label'=>'NomCategories'
            ])
            ->add('techniques', EntityType::class, [
                'class'=>Techniques::class,
                'label'=>' ',
                'choice_label'=>'NomTechnique'
            ])
            ->add('photographe', EntityType::class, [
                'class'=>Photographe::class,
                'label'=>' ',
                'choice_label'=>'NomPhotographe'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photos::class,
        ]);
    }
}
