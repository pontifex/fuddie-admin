<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * RestaurantSchedule.
 *
 * @ORM\Table(name="restaurant_schedule", indexes={@ORM\Index(name="fk_restaurant_schedule_restaurant1_idx", columns={"fk_restaurant"})})
 * @ORM\Entity
 */
class RestaurantSchedule
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
     * @var string
     *
     * @ORM\Column(name="i_day", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $iDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_open_at", type="time", nullable=false)
     */
    private $dOpenAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_close_at", type="time", nullable=false)
     */
    private $dCloseAt;

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
     * @var \Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_restaurant", referencedColumnName="id")
     * })
     */
    private $fkRestaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDay(): ?string
    {
        return $this->iDay;
    }

    public function setIDay(string $iDay): self
    {
        $this->iDay = $iDay;

        return $this;
    }

    public function getDOpenAt(): ?\DateTimeInterface
    {
        return $this->dOpenAt;
    }

    public function setDOpenAt(\DateTimeInterface $dOpenAt): self
    {
        $this->dOpenAt = $dOpenAt;

        return $this;
    }

    public function getDCloseAt(): ?\DateTimeInterface
    {
        return $this->dCloseAt;
    }

    public function setDCloseAt(\DateTimeInterface $dCloseAt): self
    {
        $this->dCloseAt = $dCloseAt;

        return $this;
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

    public function getFkRestaurant(): ?Restaurant
    {
        return $this->fkRestaurant;
    }

    public function setFkRestaurant(?Restaurant $fkRestaurant): self
    {
        $this->fkRestaurant = $fkRestaurant;

        return $this;
    }
}
