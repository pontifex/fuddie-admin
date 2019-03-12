<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVCode(): ?string
    {
        return $this->vCode;
    }

    public function setVCode(string $vCode): self
    {
        $this->vCode = $vCode;

        return $this;
    }

    public function getVDeviceCode(): ?string
    {
        return $this->vDeviceCode;
    }

    public function setVDeviceCode(string $vDeviceCode): self
    {
        $this->vDeviceCode = $vDeviceCode;

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

    public function getFkPaymentGateway(): ?PaymentGateway
    {
        return $this->fkPaymentGateway;
    }

    public function setFkPaymentGateway(?PaymentGateway $fkPaymentGateway): self
    {
        $this->fkPaymentGateway = $fkPaymentGateway;

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


}
