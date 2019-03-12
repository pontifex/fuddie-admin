<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Reward
 *
 * @ORM\Table(name="reward", indexes={@ORM\Index(name="fk_reward_waiter1_idx", columns={"fk_waiter"})})
 * @ORM\Entity
 */
class Reward
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="create")
     */
    private $dCreatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="update")
     */
    private $dUpdatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="d_deleted_at", type="datetime", nullable=true)
     */
    private $dDeletedAt;

    /**
     * @var \Waiter
     *
     * @ORM\ManyToOne(targetEntity="Waiter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_waiter", referencedColumnName="id")
     * })
     */
    private $fkWaiter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDCreatedAt(): ?\DateTimeInterface
    {
        return ($this->dCreatedAt instanceof \DateTimeInterface || is_null($this->dCreatedAt))
            ? $this->dCreatedAt : new \DateTime();
    }

    public function setDCreatedAt(\DateTimeInterface $dCreatedAt): self
    {
        $this->dCreatedAt = $dCreatedAt;

        return $this;
    }

    public function getDUpdatedAt(): ?\DateTimeInterface
    {
        return ($this->dUpdatedAt instanceof \DateTimeInterface || is_null($this->dUpdatedAt))
            ? $this->dUpdatedAt : new \DateTime();
    }

    public function setDUpdatedAt(\DateTimeInterface $dUpdatedAt): self
    {
        $this->dUpdatedAt = $dUpdatedAt;

        return $this;
    }

    public function getDDeletedAt(): ?\DateTimeInterface
    {
        return $this->dDeletedAt;
    }

    public function setDDeletedAt(?\DateTimeInterface $dDeletedAt): self
    {
        $this->dDeletedAt = $dDeletedAt;

        return $this;
    }

    public function getFkWaiter(): ?Waiter
    {
        return $this->fkWaiter;
    }

    public function setFkWaiter(?Waiter $fkWaiter): self
    {
        $this->fkWaiter = $fkWaiter;

        return $this;
    }


}
