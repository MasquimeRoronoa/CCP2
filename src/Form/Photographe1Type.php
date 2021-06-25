<?php

namespace App\Form;

use App\Entity\Photographe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Photographe1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomPhotographe', TextType::class, [
                'label'=>' '
            ])
            ->add('PrenomPhotographe', TextType::class, [
                'label'=>' '
            ])
            ->add('MailPhotographe', TextType::class, [
                'label'=>' '
            ])
            ->add('imageFile', FileType::class, [
                'required'=>'false',
                'label'=>' '
            ])
            ->add('DescPhotographe', TextType::class, [
                'label'=>' '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photographe::class,
        ]);
    }
}
