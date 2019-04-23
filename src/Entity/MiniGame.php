<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MiniGame.
 *
 * @ORM\Table(name="mini_game", indexes={@ORM\Index(name="fk_game_badge1_idx", columns={"fk_badge"})})
 * @ORM\Entity
 */
class MiniGame
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
     * @var string
     *
     * @ORM\Column(name="v_code", type="string", length=45, nullable=false)
     */
    private $vCode;

    /**
     * @var int
     *
     * @ORM\Column(name="i_badge_goal", type="integer", nullable=false)
     */
    private $iBadgeGoal = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="v_description", type="string", length=45, nullable=false)
     */
    private $vDescription;

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

    /**
     * @var Badge
     *
     * @ORM\ManyToOne(targetEntity="Badge")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_badge", referencedColumnName="id", nullable=false)
     * })
     *
     * @Assert\NotNull
     */
    private $fkBadge;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MiniGameCategory", inversedBy="miniGame")
     * @ORM\JoinTable(name="mini_game_has_mini_game_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mini_game_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="mini_game_category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $miniGameCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurant")
     * @ORM\JoinTable(name="restaurant_has_mini_game",
     *      joinColumns={@ORM\JoinColumn(name="fk_game", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fk_restaurant", referencedColumnName="id")}
     *      )
     */
    private $restaurants;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->miniGameCategory = new \Doctrine\Common\Collections\ArrayCollection();
        $this->restaurants = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getVCode(): ?string
    {
        return $this->vCode;
    }

    public function setVCode(string $vCode): self
    {
        $this->vCode = $vCode;

        return $this;
    }

    public function getIBadgeGoal(): ?int
    {
        return $this->iBadgeGoal;
    }

    public function setIBadgeGoal(int $iBadgeGoal): self
    {
        $this->iBadgeGoal = $iBadgeGoal;

        return $this;
    }

    public function getVDescription(): ?string
    {
        return $this->vDescription;
    }

    public function setVDescription(string $vDescription): self
    {
        $this->vDescription = $vDescription;

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

    public function getFkBadge(): ?Badge
    {
        return $this->fkBadge;
    }

    public function setFkBadge(?Badge $fkBadge): self
    {
        $this->fkBadge = $fkBadge;

        return $this;
    }

    /**
     * @return Collection|MiniGameCategory[]
     */
    public function getMiniGameCategory(): Collection
    {
        return $this->miniGameCategory;
    }

    public function addMiniGameCategory(MiniGameCategory $miniGameCategory): self
    {
        if (!$this->miniGameCategory->contains($miniGameCategory)) {
            $this->miniGameCategory[] = $miniGameCategory;
        }

        return $this;
    }

    public function removeMiniGameCategory(MiniGameCategory $miniGameCategory): self
    {
        if ($this->miniGameCategory->contains($miniGameCategory)) {
            $this->miniGameCategory->removeElement($miniGameCategory);
        }

        return $this;
    }

    /**
     * @return Collection|MiniGameCategory[]
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function __toString()
    {
        return $this->getVName().' ('.$this->getId().')';
    }
}
