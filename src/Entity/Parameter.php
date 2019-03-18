<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Parameter.
 *
 * @ORM\Table(name="parameter", indexes={@ORM\Index(name="fk_parameter_parameter_type1_idx", columns={"fk_parameter_type"})})
 * @ORM\Entity
 */
class Parameter
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
     * @ORM\Column(name="v_name", type="string", length=45, nullable=false)
     */
    private $vName;

    /**
     * @var string
     *
     * @ORM\Column(name="v_description", type="string", length=45, nullable=false)
     */
    private $vDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="v_value", type="string", length=45, nullable=false)
     */
    private $vValue;

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
     * @var \ParameterType
     *
     * @ORM\ManyToOne(targetEntity="ParameterType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_parameter_type", referencedColumnName="id")
     * })
     */
    private $fkParameterType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVName(): ?string
    {
        return $this->vName;
    }

    public function setVName(string $vName): self
    {
        $this->vName = $vName;

        return $this;
    }

    public function getVDescription(): ?string
    {
        return $this->vDescription;
    }

    public function setVDescription(string $vDescription): self
    {
        $this->vDescription = $vDescription;

        return $this;
    }

    public function getVValue(): ?string
    {
        return $this->vValue;
    }

    public function setVValue(string $vValue): self
    {
        $this->vValue = $vValue;

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

    public function getFkParameterType(): ?ParameterType
    {
        return $this->fkParameterType;
    }

    public function setFkParameterType(?ParameterType $fkParameterType): self
    {
        $this->fkParameterType = $fkParameterType;

        return $this;
    }
}
