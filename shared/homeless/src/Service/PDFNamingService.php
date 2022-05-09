<?php

namespace App\Service;

class PDFNamingService implements FileNamingServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function createName(DownloadableInterface $downloadable)
    {
        return $downloadable->getNamePrefix() . '-' . $downloadable->getId() . '.pdf';
    }
}
