<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;
use DateTimeImmutable;

#[ApiResource]
#[ORM\Entity]
#[ORM\Index(columns: ["time"])]
#[ORM\HasLifecycleCallbacks]
class Consent
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'uuid')]
    private string $userUuid;

    #[ORM\Column(type: 'boolean')]
    private bool $consent;

    #[ORM\Column(type: 'integer')]
    private int $validFor;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $time;

    #[ORM\ManyToOne(targetEntity: 'Contract', cascade: ["all"], fetch: "EAGER")]
    #[ApiProperty]
    private Contract $contract;

    #[ORM\Column(type: 'uuid')]
    private string $createdBy;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConsent(): ?bool
    {
        return $this->consent;
    }

    public function setConsent(bool $consent): self
    {
        $this->consent = $consent;

        return $this;
    }

    public function getValidFor(): ?int
    {
        return $this->validFor;
    }

    public function setValidFor(int $validFor): self
    {
        $this->validFor = $validFor;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $guid): self
    {
        $this->createdBy = $guid;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface $updatedAt
     * @return Consent
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): Consent
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->setCreatedAt(new DateTimeImmutable());
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdateAtValue(): void
    {
        $this->setUpdatedAt(new DateTimeImmutable());
    }

    public function getUserUuid()
    {
        return $this->userUuid;
    }

    public function setUserUuid($userUuid): self
    {
        $this->userUuid = $userUuid;

        return $this;
    }

    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    public function setContract(?Contract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }
}
