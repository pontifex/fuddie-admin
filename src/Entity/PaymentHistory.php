<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @Gedmo\Timestampable(on="create")
     */
    private $dCreatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d_updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="update")
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVGatewayStatus(): ?string
    {
        return $this->vGatewayStatus;
    }

    public function setVGatewayStatus(string $vGatewayStatus): self
    {
        $this->vGatewayStatus = $vGatewayStatus;

        return $this;
    }

    public function getTRequest(): ?string
    {
        return $this->tRequest;
    }

    public function setTRequest(string $tRequest): self
    {
        $this->tRequest = $tRequest;

        return $this;
    }

    public function getTResponse(): ?string
    {
        return $this->tResponse;
    }

    public function setTResponse(string $tResponse): self
    {
        $this->tResponse = $tResponse;

        return $this;
    }

    public function getDCreatedAt(): ?\DateTimeInterface
    {
        return ($this->dCreatedAt instanceof \DateTimeInterface || is_null($this->dCreatedAt))
            ? $this->dCreatedAt : new \DateTime();
    }

    public function setDCreatedAt(\DateTimeInterface $dCreatedAt): self
    {
        $this->dCreatedAt = $dCreatedAt;

        return $this;
    }

    public function getDUpdatedAt(): ?\DateTimeInterface
    {
        return ($this->dUpdatedAt instanceof \DateTimeInterface || is_null($this->dUpdatedAt))
            ? $this->dUpdatedAt : new \DateTime();
    }

    public function setDUpdatedAt(\DateTimeInterface $dUpdatedAt): self
    {
        $this->dUpdatedAt = $dUpdatedAt;

        return $this;
    }

    public function getDDeletedAt(): ?\DateTimeInterface
    {
        return $this->dDeletedAt;
    }

    public function setDDeletedAt(?\DateTimeInterface $dDeletedAt): self
    {
        $this->dDeletedAt = $dDeletedAt;

        return $this;
    }

    public function getFkPayment(): ?Payment
    {
        return $this->fkPayment;
    }

    public function setFkPayment(?Payment $fkPayment): self
    {
        $this->fkPayment = $fkPayment;

        return $this;
    }


}
