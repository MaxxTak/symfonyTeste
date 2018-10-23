<?php

namespace App\Form;

use App\Entity\Empresa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpresaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome',TextType::class,[
                'label'=>"Titulo",
                'attr'=>['class'=>'form-control']])
            ->add('telefone',TextType::class,[
                'label'=>"Telefone",
                'attr'=>['class'=>'form-control']])

            ->add('endereco', EnderecoFormType::class, [
                'label'=>false
            ])

            ->add('descricao',TextareaType::class,[
                'label'=>"Descrição",
                'attr'=>['class'=>'form-control']])
            ->add('categoria',EntityType::class,[
                'class'=>'App\Entity\Categoria',
                'choice_label'=>"nome_categoria",
                'placeholder'=>"Selecione",
                'label'=>"Categoria",
                'attr'=>['class'=>'form-control']])
            ->add('enviar',SubmitType::class,[
                'label'=>"Salvar",

                'attr'=>['class'=>'btn btn-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //'data_class' => Empresa::class,
        ]);
    }
}
