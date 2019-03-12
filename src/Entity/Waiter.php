<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Waiter
 *
 * @ORM\Table(name="waiter", indexes={@ORM\Index(name="fk_waiter_restaurant1_idx", columns={"fk_restaurant"})})
 * @ORM\Entity
 */
class Waiter
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
     * @ORM\Column(name="v_name", type="string", length=255, nullable=false)
     */
    private $vName;

    /**
     * @var string
     *
     * @ORM\Column(name="c_code", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $cCode;

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
     */
    private $dCreatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dUpdatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_deleted_at", type="string", length=45, nullable=true)
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
