<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * RestaurantHasMiniGame.
 *
 * @ORM\Table(name="restaurant_has_mini_game", indexes={@ORM\Index(name="fk_restaurant_has_game_game1_idx", columns={"fk_game"}), @ORM\Index(name="fk_restaurant_has_game_restaurant1_idx", columns={"fk_restaurant"}), @ORM\Index(name="fk_restaurant_has_game_discount_type1_idx", columns={"fk_discount_type"})})
 * @ORM\Entity
 */
class RestaurantHasMiniGame
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
     * @ORM\Column(name="d_amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dAmount;

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
     * @var \DiscountType
     *
     * @ORM\ManyToOne(targetEntity="DiscountType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_discount_type", referencedColumnName="id")
     * })
     */
    private $fkDiscountType;

    /**
     * @var \MiniGame
     *
     * @ORM\ManyToOne(targetEntity="MiniGame")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_game", referencedColumnName="id")
     * })
     */
    private $fkGame;

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

    public function getDAmount()
    {
        return $this->dAmount;
    }

    public function setDAmount($dAmount): self
    {
        $this->dAmount = $dAmount;

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

    public function getFkDiscountType(): ?DiscountType
    {
        return $this->fkDiscountType;
    }

    public function setFkDiscountType(?DiscountType $fkDiscountType): self
    {
        $this->fkDiscountType = $fkDiscountType;

        return $this;
    }

    public function getFkGame(): ?MiniGame
    {
        return $this->fkGame;
    }

    public function setFkGame(?MiniGame $fkGame): self
    {
        $this->fkGame = $fkGame;

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
