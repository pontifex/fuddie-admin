<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity
 */
class Address
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
     * @ORM\Column(name="v_street", type="string", length=45, nullable=false)
     */
    private $vStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="v_city", type="string", length=45, nullable=false)
     */
    private $vCity;

    /**
     * @var string
     *
     * @ORM\Column(name="v_state", type="string", length=45, nullable=false)
     */
    private $vState;

    /**
     * @var string
     *
     * @ORM\Column(name="v_country", type="string", length=45, nullable=false)
     */
    private $vCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="v_postal_code", type="string", length=45, nullable=false)
     */
    private $vPostalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_line1", type="string", length=45, nullable=true)
     */
    private $vLine1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_line2", type="string", length=45, nullable=true)
     */
    private $vLine2;

    /**
     * @var bool
     *
     * @ORM\Column(name="b_status", type="boolean", nullable=false)
     */
    private $bStatus;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVStreet(): ?string
    {
        return $this->vStreet;
    }

    public function setVStreet(string $vStreet): self
    {
        $this->vStreet = $vStreet;

        return $this;
    }

    public function getVCity(): ?string
    {
        return $this->vCity;
    }

    public function setVCity(string $vCity): self
    {
        $this->vCity = $vCity;

        return $this;
    }

    public function getVState(): ?string
    {
        return $this->vState;
    }

    public function setVState(string $vState): self
    {
        $this->vState = $vState;

        return $this;
    }

    public function getVCountry(): ?string
    {
        return $this->vCountry;
    }

    public function setVCountry(string $vCountry): self
    {
        $this->vCountry = $vCountry;

        return $this;
    }

    public function getVPostalCode(): ?string
    {
        return $this->vPostalCode;
    }

    public function setVPostalCode(string $vPostalCode): self
    {
        $this->vPostalCode = $vPostalCode;

        return $this;
    }

    public function getVLine1(): ?string
    {
        return $this->vLine1;
    }

    public function setVLine1(?string $vLine1): self
    {
        $this->vLine1 = $vLine1;

        return $this;
    }

    public function getVLine2(): ?string
    {
        return $this->vLine2;
    }

    public function setVLine2(?string $vLine2): self
    {
        $this->vLine2 = $vLine2;

        return $this;
    }

    public function getBStatus(): ?bool
    {
        return $this->bStatus;
    }

    public function setBStatus(bool $bStatus): self
    {
        $this->bStatus = $bStatus;

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

    public function __toString()
    {
        return $this->getVStreet() . ', ' . $this->getVPostalCode() . ' ' . $this->getVCity() . ', ' . $this->getVCountry();
    }
}
