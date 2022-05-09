<?php

namespace App\Form\Type;

/**
 * Class AppDocumentFileType
 * @package App\Form\Type
 */
class AppDocumentFileType extends AppPhotoType
{
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_document_file';
    }
}