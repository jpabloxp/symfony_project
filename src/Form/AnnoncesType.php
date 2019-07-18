<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre', TextType::class, ['label'=>'Modele de voiture'])
        ->add('prix', MoneyType::class, ['label'=>'Prix de voiture'])
        ->add('description', TextareaType::class, ['label'=>'Description detaillee'])
        ->add('photo', UrlType::class, ['label'=>'Photo obligatoire'])
        ->add('submit', SubmitType::class, ['label'=>'Sauvegarder', 'attr' => ['class' => 'btn btn-primary', 'style' => 'float: right']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
