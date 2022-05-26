<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Sonata\UserBundle\Entity\BaseGroup as BaseGroup;

/**
 * Группа пользователей
 * @ORM\Entity()
 * @ORM\Table(name="fos_user_group")
 */
class Group extends BaseGroup implements BaseEntityInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $syncId;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $sort;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private User $createdBy;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private DateTime $createdAt;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private User $updatedBy;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private DateTime $updatedAt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private string $code;

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set syncId
     *
     * @param integer $syncId
     *
     * @return Group
     */
    public function setSyncId($syncId): Group
    {
        $this->syncId = $syncId;

        return $this;
    }

    /**
     * Get syncId
     *
     * @return integer
     */
    public function getSyncId(): int
    {
        return $this->syncId;
    }

    /**
     * Set createdAt
     *
     * @param DateTime|null $createdAt
     *
     * @return Group
     */
    public function setCreatedAt(DateTime $createdAt = null): Group
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param DateTime|null $updatedAt
     *
     * @return Group
     */
    public function setUpdatedAt(DateTime $updatedAt = null): Group
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set createdBy
     *
     * @param User|null $createdBy
     *
     * @return Group
     */
    public function setCreatedBy(User $createdBy = null): Group
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return User
     */
    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param User|null $updatedBy
     *
     * @return Group
     */
    public function setUpdatedBy(User $updatedBy = null): Group
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return User
     */
    public function getUpdatedBy(): User
    {
        return $this->updatedBy;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Group
     */
    public function setCode(string $code): Group
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return Group
     */
    public function setSort($sort): Group
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort(): int
    {
        return $this->sort;
    }
}
