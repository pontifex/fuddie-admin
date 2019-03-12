<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="v_external_id_UNIQUE", columns={"v_external_id"})}, indexes={@ORM\Index(name="fk_user_address1_idx", columns={"fk_address"})})
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="v_external_id", type="string", length=45, nullable=false)
     */
    private $vExternalId;

    /**
     * @var string
     *
     * @ORM\Column(name="v_name", type="string", length=45, nullable=false)
     */
    private $vName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_email", type="string", length=45, nullable=true)
     */
    private $vEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="v_phone", type="string", length=20, nullable=false)
     */
    private $vPhone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_gender", type="string", length=45, nullable=true)
     */
    private $vGender;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="d_birthday", type="date", nullable=true)
     */
    private $dBirthday;

    /**
     * @var string
     *
     * @ORM\Column(name="v_code", type="string", length=45, nullable=false)
     */
    private $vCode;

    /**
     * @var json|null
     *
     * @ORM\Column(name="j_settings", type="json", nullable=true)
     */
    private $jSettings;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_ranking", type="integer", nullable=true)
     */
    private $iRanking = '0';

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
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_address", referencedColumnName="id")
     * })
     */
    private $fkAddress;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Badge", inversedBy="user")
     * @ORM\JoinTable(name="user_has_badge",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="badge_id", referencedColumnName="id")
     *   }
     * )
     */
    private $badge;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="user")
     * @ORM\JoinTable(name="user_has_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id1", referencedColumnName="id")
     *   }
     * )
     */
    private $user1;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->badge = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user1 = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
