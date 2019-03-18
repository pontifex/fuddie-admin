<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Restaurant.
 *
 * @ORM\Table(name="restaurant", indexes={@ORM\Index(name="fk_branch_company1_idx", columns={"fk_company"})})
 * @ORM\Entity
 */
class Restaurant
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
     * @ORM\Column(name="v_name", type="string", length=45, nullable=false)
     */
    private $vName;

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
     * @var string|null
     *
     * @ORM\Column(name="v_website", type="string", length=1000, nullable=true)
     */
    private $vWebsite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_email", type="string", length=1000, nullable=true)
     */
    private $vEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_description", type="string", length=1000, nullable=true)
     */
    private $vDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="v_longitude", type="string", length=45, nullable=false)
     */
    private $vLongitude;

    /**
     * @var string
     *
     * @ORM\Column(name="v_latitude", type="string", length=45, nullable=false)
     */
    private $vLatitude;

    /**
     * @var json|null
     *
     * @ORM\Column(name="j_settings", type="json", nullable=true)
     */
    private $jSettings;

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

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_company", referencedColumnName="id")
     * })
     */
    private $fkCompany;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="restaurant")
     * @ORM\JoinTable(name="restaurant_has_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="restaurant_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $category;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVWebsite(): ?string
    {
        return $this->vWebsite;
    }

    public function setVWebsite(?string $vWebsite): self
    {
        $this->vWebsite = $vWebsite;

        return $this;
    }

    public function getVEmail(): ?string
    {
        return $this->vEmail;
    }

    public function setVEmail(?string $vEmail): self
    {
        $this->vEmail = $vEmail;

        return $this;
    }

    public function getVDescription(): ?string
    {
        return $this->vDescription;
    }

    public function setVDescription(?string $vDescription): self
    {
        $this->vDescription = $vDescription;

        return $this;
    }

    public function getVLongitude(): ?string
    {
        return $this->vLongitude;
    }

    public function setVLongitude(string $vLongitude): self
    {
        $this->vLongitude = $vLongitude;

        return $this;
    }

    public function getVLatitude(): ?string
    {
        return $this->vLatitude;
    }

    public function setVLatitude(string $vLatitude): self
    {
        $this->vLatitude = $vLatitude;

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

    public function getFkCompany(): ?Company
    {
        return $this->fkCompany;
    }

    public function setFkCompany(?Company $fkCompany): self
    {
        $this->fkCompany = $fkCompany;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getVName().' ('.$this->getId().')';
    }
}
