<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentHistory
 *
 * @ORM\Table(name="payment_history", indexes={@ORM\Index(name="fk_payment_history_payment1_idx", columns={"fk_payment"})})
 * @ORM\Entity
 */
class PaymentHistory
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
     * @ORM\Column(name="v_gateway_status", type="string", length=45, nullable=false)
     */
    private $vGatewayStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="t_request", type="text", length=65535, nullable=false)
     */
    private $tRequest;

    /**
     * @var string
     *
     * @ORM\Column(name="t_response", type="text", length=65535, nullable=false)
     */
    private $tResponse;

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
     * @var \Payment
     *
     * @ORM\ManyToOne(targetEntity="Payment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_payment", referencedColumnName="id")
     * })
     */
    private $fkPayment;


}
