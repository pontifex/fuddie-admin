<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParameterType
 *
 * @ORM\Table(name="parameter_type")
 * @ORM\Entity
 */
class ParameterType
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
     * @ORM\Column(name="v_type", type="string", length=45, nullable=false)
     */
    private $vType;

    /**
     * @var string
     *
     * @ORM\Column(name="v_description", type="string", length=255, nullable=false)
     */
    private $vDescription;

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
