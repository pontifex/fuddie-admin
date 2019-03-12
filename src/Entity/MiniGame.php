<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiniGame
 *
 * @ORM\Table(name="mini_game", indexes={@ORM\Index(name="fk_game_badge1_idx", columns={"fk_badge"})})
 * @ORM\Entity
 */
class MiniGame
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
     * @ORM\Column(name="v_code", type="string", length=45, nullable=false)
     */
    private $vCode;

    /**
     * @var int
     *
     * @ORM\Column(name="i_badge_goal", type="integer", nullable=false)
     */
    private $iBadgeGoal = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="v_description", type="string", length=45, nullable=false)
     */
    private $vDescription;

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
     * @var \Badge
     *
     * @ORM\ManyToOne(targetEntity="Badge")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_badge", referencedColumnName="id")
     * })
     */
    private $fkBadge;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MiniGameCategory", inversedBy="miniGame")
     * @ORM\JoinTable(name="mini_game_has_mini_game_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mini_game_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="mini_game_category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $miniGameCategory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miniGameCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
