<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order", indexes={@ORM\Index(name="fk_order_payment1_idx", columns={"fk_payment"}), @ORM\Index(name="fk_order_restaurant1_idx", columns={"fk_restaurant"}), @ORM\Index(name="fk_order_order_status1_idx", columns={"fk_order_status"}), @ORM\Index(name="fk_order_user1_idx", columns={"fk_user"})})
 * @ORM\Entity
 */
class Order
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
     * @ORM\Column(name="v_uuid", type="string", length=45, nullable=false)
     */
    private $vUuid;

    /**
     * @var string
     *
     * @ORM\Column(name="d_subtotal", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dSubtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="d_discount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dDiscount;

    /**
     * @var string
     *
     * @ORM\Column(name="d_fee", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dFee;

    /**
     * @var string
     *
     * @ORM\Column(name="d_total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="d_fee_percentage", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dFeePercentage;

    /**
     * @var string
     *
     * @ORM\Column(name="v_currency", type="string", length=45, nullable=false)
     */
    private $vCurrency;

    /**
     * @var string
     *
     * @ORM\Column(name="v_ip", type="string", length=45, nullable=false)
     */
    private $vIp;

    /**
     * @var string
     *
     * @ORM\Column(name="v_channel", type="string", length=45, nullable=false)
     */
    private $vChannel;

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
     * @var \OrderStatus
     *
     * @ORM\ManyToOne(targetEntity="OrderStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_order_status", referencedColumnName="id")
     * })
     */
    private $fkOrderStatus;

    /**
     * @var \Payment
     *
     * @ORM\ManyToOne(targetEntity="Payment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_payment", referencedColumnName="id")
     * })
     */
    private $fkPayment;

    /**
     * @var \Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_restaurant", referencedColumnName="id")
     * })
     */
    private $fkRestaurant;

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
