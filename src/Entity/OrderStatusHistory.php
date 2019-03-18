<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderStatusHistory.
 *
 * @ORM\Table(name="order_status_history", indexes={@ORM\Index(name="fk_order_status_history_order1_idx", columns={"fk_order"}), @ORM\Index(name="fk_order_status_history_order_status1_idx", columns={"fk_order_status"})})
 * @ORM\Entity
 */
class OrderStatusHistory
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
     * @var \DateTime
     *
     * @ORM\Column(name="d_created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Gedmo\Timestampable(on="create")
     */
    private $dCreatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \Order
     *
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_order", referencedColumnName="id")
     * })
     */
    private $fkOrder;

    /**
     * @var \OrderStatus
     *
     * @ORM\ManyToOne(targetEntity="OrderStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_order_status", referencedColumnName="id")
     * })
     */
    private $fkOrderStatus;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFkOrder(): ?Order
    {
        return $this->fkOrder;
    }

    public function setFkOrder(?Order $fkOrder): self
    {
        $this->fkOrder = $fkOrder;

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
}
