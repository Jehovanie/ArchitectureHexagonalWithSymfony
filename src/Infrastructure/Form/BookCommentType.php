<?php

declare(strict_types=1);

namespace App\Infrastructure\Form;

use App\Application\DTO\BookCommentDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PostSubmitEvent;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('comment', TextareaType::class, [
                'label' => null,
                'required' => true,
                'attr' => [
                    'rows' => 5, // Nombre de lignes
                    'cols' => 50, // Nombre de colonnes (optionnel)
                    'placeholder' => 'Commentaire',
                ],
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, $this->attacheTimestamps(...));

    }

    public function attacheTimestamps(PostSubmitEvent $event): void
    {
        $data = $event->getData();

        $data->updatedAt = new \DateTimeImmutable();
        $data->createdAt = new \DateTimeImmutable();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookCommentDTO::class,
            'csrf_protection' => true, // Active la protection CSRF
        ]);
    }
}
