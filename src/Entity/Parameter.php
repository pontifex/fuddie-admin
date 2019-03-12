<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parameter
 *
 * @ORM\Table(name="parameter", indexes={@ORM\Index(name="fk_parameter_parameter_type1_idx", columns={"fk_parameter_type"})})
 * @ORM\Entity
 */
class Parameter
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
     * @ORM\Column(name="v_description", type="string", length=45, nullable=false)
     */
    private $vDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="v_value", type="string", length=45, nullable=false)
     */
    private $vValue;

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
     * @var \ParameterType
     *
     * @ORM\ManyToOne(targetEntity="ParameterType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_parameter_type", referencedColumnName="id")
     * })
     */
    private $fkParameterType;


}
