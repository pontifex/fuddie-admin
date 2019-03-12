<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RestaurantSchedule
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
     * @var \Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_restaurant", referencedColumnName="id")
     * })
     */
    private $fkRestaurant;


}
