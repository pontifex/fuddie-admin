<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscountType
 *
 * @ORM\Table(name="discount_type")
 * @ORM\Entity
 */
class DiscountType
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="v_unit", type="string", length=5, nullable=false)
     */
    private $vUnit;

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
