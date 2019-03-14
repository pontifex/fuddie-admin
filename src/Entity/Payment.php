<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @var \PaymentMethod
     *
     * @ORM\ManyToOne(targetEntity="PaymentMethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_payment_method", referencedColumnName="id")
     * })
     */
    private $fkPaymentMethod;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Order", mappedBy="fkPayment")
     */
    private $orders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVGatewayCode(): ?string
    {
        return $this->vGatewayCode;
    }

    public function setVGatewayCode(?string $vGatewayCode): self
    {
        $this->vGatewayCode = $vGatewayCode;

        return $this;
    }

    public function getVGatewayStatus(): ?string
    {
        return $this->vGatewayStatus;
    }

    public function setVGatewayStatus(?string $vGatewayStatus): self
    {
        $this->vGatewayStatus = $vGatewayStatus;

        return $this;
    }

    public function getDTotal()
    {
        return $this->dTotal;
    }

    public function setDTotal($dTotal): self
    {
        $this->dTotal = $dTotal;

        return $this;
    }

    public function getVCurrency(): ?string
    {
        return $this->vCurrency;
    }

    public function setVCurrency(string $vCurrency): self
    {
        $this->vCurrency = $vCurrency;

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

    public function getFkPaymentMethod(): ?PaymentMethod
    {
        return $this->fkPaymentMethod;
    }

    public function setFkPaymentMethod(?PaymentMethod $fkPaymentMethod): self
    {
        $this->fkPaymentMethod = $fkPaymentMethod;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrders(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
        }

        return $this;
    }

    public function removeOrders(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getDTotal() . ' ' . $this->getVCurrency() . ' (' . $this->getId() . ')';
    }


}
