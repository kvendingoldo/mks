<?php

namespace App\Entity;

use App\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryDownload
 *
 * @ORM\Table(name="history_download")
 * @ORM\Entity(repositoryClass="App\Repository\HistoryDownloadRepository")
 */
class HistoryDownload
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \App\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * Тип сертификата
     * @ORM\ManyToOne(targetEntity="App\Entity\CertificateType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="certificate_type_id", referencedColumnName="id")
     * })
     */
    private $certificateType;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set client
     *
     * @param \App\Entity\Client $client
     *
     * @return HistoryDownload
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \App\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return HistoryDownload
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return HistoryDownload
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set certificate
     *
     * @param \App\Entity\Certificate $certificateType
     *
     * @return HistoryDownload
     */
    public function setCertificateType($certificateType)
    {
        $this->certificateType = $certificateType;

        return $this;
    }

    /**
     * Get certificate
     *
     * @return \App\Entity\Certificate
     */
    public function getCertificateType()
    {
        return $this->certificateType;
    }
}
