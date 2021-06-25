<?php

namespace App\Form;

use App\Entity\Techniques;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechniquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomTechnique', TextType::class, [
                'label'=>' '
            ])
            ->add('DescCourteTechnique', TextType::class, [
                'label'=>' '
            ])
            ->add('DescLongueTechnique', TextType::class, [
                'label'=>' '
            ])
            ->add('imageFile', FileType::class, [
                'required'=>'false',
                'label'=>' '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techniques::class,
        ]);
    }
}
