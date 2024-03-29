<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Company.
 *
 * @ORM\Table(name="company")
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="v_name", type="string", length=200, nullable=false)
     */
    private $vName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_website", type="string", length=1000, nullable=true)
     */
    private $vWebsite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_logo", type="string", length=1000, nullable=true)
     */
    private $vLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="v_address", type="string", length=45, nullable=false)
     */
    private $vAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="v_phone", type="string", length=45, nullable=false)
     */
    private $vPhone;

    /**
     * @var json|null
     *
     * @ORM\Column(name="j_settings", type="json", nullable=true)
     */
    private $jSettings;

    /**
     * @var bool
     *
     * @ORM\Column(name="b_status", type="boolean", nullable=false, options={"default"="1"})
     */
    private $bStatus = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="create")
     */
    private $dCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="update")
     */
    private $dUpdatedAt;

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

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getVName(): ?string
    {
        return $this->vName;
    }

    public function setVName(string $vName): self
    {
        $this->vName = $vName;

        return $this;
    }

    public function getVWebsite(): ?string
    {
        return $this->vWebsite;
    }

    public function setVWebsite(?string $vWebsite): self
    {
        $this->vWebsite = $vWebsite;

        return $this;
    }

    public function getVLogo(): ?string
    {
        return $this->vLogo;
    }

    public function setVLogo(?string $vLogo): self
    {
        $this->vLogo = $vLogo;

        return $this;
    }

    public function getVAddress(): ?string
    {
        return $this->vAddress;
    }

    public function setVAddress(string $vAddress): self
    {
        $this->vAddress = $vAddress;

        return $this;
    }

    public function getVPhone(): ?string
    {
        return $this->vPhone;
    }

    public function setVPhone(string $vPhone): self
    {
        $this->vPhone = $vPhone;

        return $this;
    }

    public function getJSettings(): ?array
    {
        return $this->jSettings;
    }

    public function setJSettings(?array $jSettings): self
    {
        $this->jSettings = $jSettings;

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
        return $this->getVName().' ('.$this->getId().')';
    }
}
