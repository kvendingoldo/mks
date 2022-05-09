<?php

namespace App\Service;

interface FileNamingServiceInterface
{
    /**
     * Получение названия файла при скачивании
     *
     * @param DownloadableInterface $downloadable
     * @return string
     */
    public function createName(DownloadableInterface $downloadable);
}
