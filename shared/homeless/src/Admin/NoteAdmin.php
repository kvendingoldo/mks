<?php

namespace App\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\FormatterBundle\Form\Type\SimpleFormatterType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NoteAdmin extends BaseAdmin
{
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'createdAt',
    );

    protected $translationDomain = 'App';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(TextType::class, SimpleFormatterType::class, [
                'label' => 'Текст',
                'required' => true,
                'format' => 'richhtml',
                'ckeditor_context' => 'homeless',
            ])
            ->add('important', null, [
                'label' => 'Важное',
                'required' => false,
            ]);
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('createdBy', null, [
                'label' => 'Кем добавлено',
            ])
            ->add('createdAt', 'date', [
                'label' => 'Когда добавлено',
            ])
            ->add(TextType::class, null, [
                'label' => 'Текст',
                'template' => '/admin/fields/note_text_list.html.twig',
            ])
            ->add('_action', null, [
                'label' => 'Действие',
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ]);
    }
}
