<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MiniGameCategory
 *
 * @ORM\Table(name="mini_game_category")
 * @ORM\Entity
 */
class MiniGameCategory
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
     * @ORM\Column(name="v_url_icon", type="string", length=255, nullable=false)
     */
    private $vUrlIcon;

    /**
     * @var string
     *
     * @ORM\Column(name="v_description", type="string", length=1000, nullable=false)
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
    private $dCreatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="update")
     */
    private $dUpdatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_deleted_at", type="string", length=45, nullable=true)
     */
    private $dDeletedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MiniGame", mappedBy="miniGameCategory")
     */
    private $miniGame;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miniGame = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getVUrlIcon(): ?string
    {
        return $this->vUrlIcon;
    }

    public function setVUrlIcon(string $vUrlIcon): self
    {
        $this->vUrlIcon = $vUrlIcon;

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

    public function getDDeletedAt(): ?string
    {
        return $this->dDeletedAt;
    }

    public function setDDeletedAt(?string $dDeletedAt): self
    {
        $this->dDeletedAt = $dDeletedAt;

        return $this;
    }

    /**
     * @return Collection|MiniGame[]
     */
    public function getMiniGame(): Collection
    {
        return $this->miniGame;
    }

    public function addMiniGame(MiniGame $miniGame): self
    {
        if (!$this->miniGame->contains($miniGame)) {
            $this->miniGame[] = $miniGame;
            $miniGame->addMiniGameCategory($this);
        }

        return $this;
    }

    public function removeMiniGame(MiniGame $miniGame): self
    {
        if ($this->miniGame->contains($miniGame)) {
            $this->miniGame->removeElement($miniGame);
            $miniGame->removeMiniGameCategory($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getVName() . ' (' . $this->getId() . ')';
    }


}
