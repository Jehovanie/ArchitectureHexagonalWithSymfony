<?php

declare(strict_types=1);

namespace App\Infrastructure\Form;

use App\Application\DTO\BookDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PostSubmitEvent;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Votre nom de livre',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de votre livre',
                'required' => true,
                'attr' => [
                    'rows' => 10, // Nombre de lignes
                    'cols' => 50, // Nombre de colonnes (optionnel)
                ],
            ])
            ->add('page', IntegerType::class, [
                'label' => 'Nombre de page',
                'required' => true,
            ])
            ->add('version', TextType::class, [
                'label' => 'Version',
                'required' => true,
            ])
            ->add('author', TextType::class, [
                'label' => 'Auteur',
                'required' => false,
            ])
            ->add('language', TextType::class, [
                'label' => 'langue',
                'required' => false,
            ])
            ->add('createdAt', DateType::class, [
                'label' => 'Date de sortie',
                'widget' => 'single_text',
                'required' => false,
                'label' => '',
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, $this->attacheTimestamps(...));

    }

    public function attacheTimestamps(PostSubmitEvent $event): void
    {
        $data = $event->getData();

        $data->uploadedAt = new \DateTimeImmutable();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookDTO::class,
            'csrf_protection' => true, // Active la protection CSRF
        ]);
    }
}
