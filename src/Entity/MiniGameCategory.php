<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiniGameCategory
 *
 * @ORM\Table(name="mini_game_category")
 * @ORM\Entity
 */
class MiniGameCategory
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
     * @ORM\Column(name="v_url_icon", type="string", length=255, nullable=false)
     */
    private $vUrlIcon;

    /**
     * @var string
     *
     * @ORM\Column(name="v_description", type="string", length=1000, nullable=false)
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
     * @var string|null
     *
     * @ORM\Column(name="d_deleted_at", type="string", length=45, nullable=true)
     */
    private $dDeletedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MiniGame", mappedBy="miniGameCategory")
     */
    private $miniGame;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miniGame = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
