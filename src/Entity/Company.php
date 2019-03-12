<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="v_name", type="string", length=200, nullable=false)
     */
    private $vName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_website", type="string", length=1000, nullable=true)
     */
    private $vWebsite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_logo", type="string", length=1000, nullable=true)
     */
    private $vLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="v_address", type="string", length=45, nullable=false)
     */
    private $vAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="v_phone", type="string", length=45, nullable=false)
     */
    private $vPhone;

    /**
     * @var json|null
     *
     * @ORM\Column(name="j_settings", type="json", nullable=true)
     */
    private $jSettings;

    /**
     * @var bool
     *
     * @ORM\Column(name="b_status", type="boolean", nullable=false, options={"default"="1"})
     */
    private $bStatus = '1';

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
