<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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


}
