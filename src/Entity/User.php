<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * User.
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="v_external_id_UNIQUE", columns={"v_external_id"})}, indexes={@ORM\Index(name="fk_user_address1_idx", columns={"fk_address"})})
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="v_external_id", type="string", length=45, nullable=false)
     */
    private $vExternalId;

    /**
     * @var string
     *
     * @ORM\Column(name="v_name", type="string", length=45, nullable=false)
     */
    private $vName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_email", type="string", length=45, nullable=true)
     */
    private $vEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="v_phone", type="string", length=20, nullable=false)
     */
    private $vPhone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_gender", type="string", length=45, nullable=true)
     */
    private $vGender;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="d_birthday", type="date", nullable=true)
     */
    private $dBirthday;

    /**
     * @var string
     *
     * @ORM\Column(name="v_code", type="string", length=45, nullable=false)
     */
    private $vCode;

    /**
     * @var json|null
     *
     * @ORM\Column(name="j_settings", type="json", nullable=true)
     */
    private $jSettings;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_ranking", type="integer", nullable=true)
     */
    private $iRanking = '0';

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
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_address", referencedColumnName="id")
     * })
     */
    private $fkAddress;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Badge", inversedBy="user")
     * @ORM\JoinTable(name="user_has_badge",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="badge_id", referencedColumnName="id")
     *   }
     * )
     */
    private $badge;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="user")
     * @ORM\JoinTable(name="user_has_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id1", referencedColumnName="id")
     *   }
     * )
     */
    private $user1;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->badge = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user1 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVExternalId(): ?string
    {
        return $this->vExternalId;
    }

    public function setVExternalId(string $vExternalId): self
    {
        $this->vExternalId = $vExternalId;

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

    public function getVEmail(): ?string
    {
        return $this->vEmail;
    }

    public function setVEmail(?string $vEmail): self
    {
        $this->vEmail = $vEmail;

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

    public function getVGender(): ?string
    {
        return $this->vGender;
    }

    public function setVGender(?string $vGender): self
    {
        $this->vGender = $vGender;

        return $this;
    }

    public function getDBirthday(): ?\DateTimeInterface
    {
        return $this->dBirthday;
    }

    public function setDBirthday(?\DateTimeInterface $dBirthday): self
    {
        $this->dBirthday = $dBirthday;

        return $this;
    }

    public function getVCode(): ?string
    {
        return $this->vCode;
    }

    public function setVCode(string $vCode): self
    {
        $this->vCode = $vCode;

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

    public function getIRanking(): ?int
    {
        return $this->iRanking;
    }

    public function setIRanking(?int $iRanking): self
    {
        $this->iRanking = $iRanking;

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

    public function getFkAddress(): ?Address
    {
        return $this->fkAddress;
    }

    public function setFkAddress(?Address $fkAddress): self
    {
        $this->fkAddress = $fkAddress;

        return $this;
    }

    /**
     * @return Collection|Badge[]
     */
    public function getBadge(): Collection
    {
        return $this->badge;
    }

    public function addBadge(Badge $badge): self
    {
        if (!$this->badge->contains($badge)) {
            $this->badge[] = $badge;
        }

        return $this;
    }

    public function removeBadge(Badge $badge): self
    {
        if ($this->badge->contains($badge)) {
            $this->badge->removeElement($badge);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser1(): Collection
    {
        return $this->user1;
    }

    public function addUser1(self $user1): self
    {
        if (!$this->user1->contains($user1)) {
            $this->user1[] = $user1;
        }

        return $this;
    }

    public function removeUser1(self $user1): self
    {
        if ($this->user1->contains($user1)) {
            $this->user1->removeElement($user1);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getVEmail().' ('.$this->getId().')';
    }
}
