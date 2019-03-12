<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table(name="payment", indexes={@ORM\Index(name="fk_payment_payment_method1_idx", columns={"fk_payment_method"})})
 * @ORM\Entity
 */
class Payment
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
     * @ORM\Column(name="v_gateway_code", type="string", length=45, nullable=true)
     */
    private $vGatewayCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="v_gateway_status", type="string", length=45, nullable=true)
     */
    private $vGatewayStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="d_total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $dTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="v_currency", type="string", length=45, nullable=false)
     */
    private $vCurrency;

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
     * @var \PaymentMethod
     *
     * @ORM\ManyToOne(targetEntity="PaymentMethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_payment_method", referencedColumnName="id")
     * })
     */
    private $fkPaymentMethod;


}
