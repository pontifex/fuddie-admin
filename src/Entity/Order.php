<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Order.
 *
 * @ORM\Table(name="`order`", indexes={@ORM\Index(name="fk_order_payment1_idx", columns={"fk_payment"}), @ORM\Index(name="fk_order_restaurant1_idx", columns={"fk_restaurant"}), @ORM\Index(name="fk_order_order_status1_idx", columns={"fk_order_status"}), @ORM\Index(name="fk_order_user1_idx", columns={"fk_user"})})
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
     * @var \OrderStatus
     *
     * @ORM\ManyToOne(targetEntity="OrderStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_order_status", referencedColumnName="id")
     * })
     */
    private $fkOrderStatus;

    /**
     * Many Orders have one Payment. This is the owning side.
     *
     * @ORM\ManyToOne(targetEntity="Payment", inversedBy="orders")
     * @ORM\JoinColumn(name="fk_payment", referencedColumnName="id")
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVUuid(): ?string
    {
        return $this->vUuid;
    }

    public function setVUuid(string $vUuid): self
    {
        $this->vUuid = $vUuid;

        return $this;
    }

    public function getDSubtotal()
    {
        return $this->dSubtotal;
    }

    public function setDSubtotal($dSubtotal): self
    {
        $this->dSubtotal = $dSubtotal;

        return $this;
    }

    public function getDDiscount()
    {
        return $this->dDiscount;
    }

    public function setDDiscount($dDiscount): self
    {
        $this->dDiscount = $dDiscount;

        return $this;
    }

    public function getDFee()
    {
        return $this->dFee;
    }

    public function setDFee($dFee): self
    {
        $this->dFee = $dFee;

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

    public function getDFeePercentage()
    {
        return $this->dFeePercentage;
    }

    public function setDFeePercentage($dFeePercentage): self
    {
        $this->dFeePercentage = $dFeePercentage;

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

    public function getVIp(): ?string
    {
        return $this->vIp;
    }

    public function setVIp(string $vIp): self
    {
        $this->vIp = $vIp;

        return $this;
    }

    public function getVChannel(): ?string
    {
        return $this->vChannel;
    }

    public function setVChannel(string $vChannel): self
    {
        $this->vChannel = $vChannel;

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

    public function getFkOrderStatus(): ?OrderStatus
    {
        return $this->fkOrderStatus;
    }

    public function setFkOrderStatus(?OrderStatus $fkOrderStatus): self
    {
        $this->fkOrderStatus = $fkOrderStatus;

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

    public function getFkRestaurant(): ?Restaurant
    {
        return $this->fkRestaurant;
    }

    public function setFkRestaurant(?Restaurant $fkRestaurant): self
    {
        $this->fkRestaurant = $fkRestaurant;

        return $this;
    }

    public function getFkUser(): ?User
    {
        return $this->fkUser;
    }

    public function setFkUser(?User $fkUser): self
    {
        $this->fkUser = $fkUser;

        return $this;
    }

    public function __toString()
    {
        return $this->getVUuid().' ('.$this->getId().')';
    }
}
