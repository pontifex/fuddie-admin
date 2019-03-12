<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentMethod
 *
 * @ORM\Table(name="payment_method", indexes={@ORM\Index(name="fk_payment_method_payment_method_type1_idx", columns={"fk_payment_method_type"}), @ORM\Index(name="fk_payment_method_user_has_payment_gateway1_idx", columns={"fk_user_has_payment_gateway"})})
 * @ORM\Entity
 */
class PaymentMethod
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
     * @var string|null
     *
     * @ORM\Column(name="c_iin", type="string", length=6, nullable=true, options={"fixed"=true})
     */
    private $cIin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_last_4_digits", type="string", length=4, nullable=true, options={"fixed"=true})
     */
    private $cLast4Digits;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_token", type="string", length=45, nullable=true)
     */
    private $vToken;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_type_card", type="string", length=45, nullable=true)
     */
    private $vTypeCard;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_brand", type="string", length=100, nullable=true)
     */
    private $vBrand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_issuer", type="string", length=45, nullable=true)
     */
    private $vIssuer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_device_session_id", type="string", length=100, nullable=true)
     */
    private $vDeviceSessionId;

    /**
     * @var bool
     *
     * @ORM\Column(name="b_default", type="boolean", nullable=false)
     */
    private $bDefault;

    /**
     * @var bool
     *
     * @ORM\Column(name="b_status", type="boolean", nullable=false)
     */
    private $bStatus;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="d_expired_at", type="date", nullable=true)
     */
    private $dExpiredAt;

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
     * @var \PaymentMethodType
     *
     * @ORM\ManyToOne(targetEntity="PaymentMethodType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_payment_method_type", referencedColumnName="id")
     * })
     */
    private $fkPaymentMethodType;

    /**
     * @var \UserHasPaymentGateway
     *
     * @ORM\ManyToOne(targetEntity="UserHasPaymentGateway")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_user_has_payment_gateway", referencedColumnName="id")
     * })
     */
    private $fkUserHasPaymentGateway;


}
