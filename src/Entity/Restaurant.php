<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant", indexes={@ORM\Index(name="fk_branch_company1_idx", columns={"fk_company"})})
 * @ORM\Entity
 */
class Restaurant
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
     * @var string|null
     *
     * @ORM\Column(name="v_website", type="string", length=1000, nullable=true)
     */
    private $vWebsite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_email", type="string", length=1000, nullable=true)
     */
    private $vEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_description", type="string", length=1000, nullable=true)
     */
    private $vDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="v_longitude", type="string", length=45, nullable=false)
     */
    private $vLongitude;

    /**
     * @var string
     *
     * @ORM\Column(name="v_latitude", type="string", length=45, nullable=false)
     */
    private $vLatitude;

    /**
     * @var json|null
     *
     * @ORM\Column(name="j_settings", type="json", nullable=true)
     */
    private $jSettings;

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

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_company", referencedColumnName="id")
     * })
     */
    private $fkCompany;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="restaurant")
     * @ORM\JoinTable(name="restaurant_has_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="restaurant_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
