<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RestaurantHasMiniGame
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
     */
    private $dCreatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
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


}
