<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCIin(): ?string
    {
        return $this->cIin;
    }

    public function setCIin(?string $cIin): self
    {
        $this->cIin = $cIin;

        return $this;
    }

    public function getCLast4Digits(): ?string
    {
        return $this->cLast4Digits;
    }

    public function setCLast4Digits(?string $cLast4Digits): self
    {
        $this->cLast4Digits = $cLast4Digits;

        return $this;
    }

    public function getVToken(): ?string
    {
        return $this->vToken;
    }

    public function setVToken(?string $vToken): self
    {
        $this->vToken = $vToken;

        return $this;
    }

    public function getVTypeCard(): ?string
    {
        return $this->vTypeCard;
    }

    public function setVTypeCard(?string $vTypeCard): self
    {
        $this->vTypeCard = $vTypeCard;

        return $this;
    }

    public function getVBrand(): ?string
    {
        return $this->vBrand;
    }

    public function setVBrand(?string $vBrand): self
    {
        $this->vBrand = $vBrand;

        return $this;
    }

    public function getVIssuer(): ?string
    {
        return $this->vIssuer;
    }

    public function setVIssuer(?string $vIssuer): self
    {
        $this->vIssuer = $vIssuer;

        return $this;
    }

    public function getVDeviceSessionId(): ?string
    {
        return $this->vDeviceSessionId;
    }

    public function setVDeviceSessionId(?string $vDeviceSessionId): self
    {
        $this->vDeviceSessionId = $vDeviceSessionId;

        return $this;
    }

    public function getBDefault(): ?bool
    {
        return $this->bDefault;
    }

    public function setBDefault(bool $bDefault): self
    {
        $this->bDefault = $bDefault;

        return $this;
    }

    public function getBStatus(): ?bool
    {
        return $this->bStatus;
    }

    public function setBStatus(bool $bStatus): self
    {
        $this->bStatus = $bStatus;

        return $this;
    }

    public function getDExpiredAt(): ?\DateTimeInterface
    {
        return $this->dExpiredAt;
    }

    public function setDExpiredAt(?\DateTimeInterface $dExpiredAt): self
    {
        $this->dExpiredAt = $dExpiredAt;

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

    public function getFkPaymentMethodType(): ?PaymentMethodType
    {
        return $this->fkPaymentMethodType;
    }

    public function setFkPaymentMethodType(?PaymentMethodType $fkPaymentMethodType): self
    {
        $this->fkPaymentMethodType = $fkPaymentMethodType;

        return $this;
    }

    public function getFkUserHasPaymentGateway(): ?UserHasPaymentGateway
    {
        return $this->fkUserHasPaymentGateway;
    }

    public function setFkUserHasPaymentGateway(?UserHasPaymentGateway $fkUserHasPaymentGateway): self
    {
        $this->fkUserHasPaymentGateway = $fkUserHasPaymentGateway;

        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->getId();
    }
}
