<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHasPaymentGateway
 *
 * @ORM\Table(name="user_has_payment_gateway", indexes={@ORM\Index(name="fk_user_has_payment_gateway_user1_idx", columns={"fk_user"}), @ORM\Index(name="fk_user_has_payment_gateway_payment_gateway1_idx", columns={"fk_payment_gateway"})})
 * @ORM\Entity
 */
class UserHasPaymentGateway
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
     * @ORM\Column(name="v_code", type="string", length=45, nullable=false)
     */
    private $vCode;

    /**
     * @var string
     *
     * @ORM\Column(name="v_device_code", type="string", length=45, nullable=false)
     */
    private $vDeviceCode;

    /**
     * @var bool
     *
     * @ORM\Column(name="b_status", type="boolean", nullable=false)
     */
    private $bStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_created_at", type="datetime", nullable=false)
     */
    private $dCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false)
     */
    private $dUpdatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="d_deleted_at", type="datetime", nullable=true)
     */
    private $dDeletedAt;

    /**
     * @var \PaymentGateway
     *
     * @ORM\ManyToOne(targetEntity="PaymentGateway")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_payment_gateway", referencedColumnName="id")
     * })
     */
    private $fkPaymentGateway;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     * })
     */
    private $fkUser;


}
