<?php

namespace App\Form;

use App\Entity\Endereco;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnderecoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('endereco',TextType::class,[
                'label'=>"Endereço",
                'attr'=>['class'=>'form-control']])
            ->add('bairro',TextType::class,[
                'label'=>"Bairro",
                'attr'=>['class'=>'form-control']])
            ->add('cep',TextType::class,[
                'label'=>"CEP",
                'attr'=>['class'=>'form-control']])
            ->add('estado',TextType::class,[
                'label'=>"Estado",
                'attr'=>['class'=>'form-control']])
            ->add('cidade',TextType::class,[
                'label'=>"Cidade",
                'attr'=>['class'=>'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Endereco::class,
        ]);
    }
}
