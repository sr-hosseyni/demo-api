<?php

namespace App\Entity;

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

    #[ORM\Column(type: 'guid')]
    private string $uuid;

    #[ORM\Column(type: 'boolean')]
    private bool $consent;

    #[ORM\Column(type: 'integer')]
    private int $validFor;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $time;

    #[ORM\ManyToOne(targetEntity: 'Contract', cascade: ["all"], fetch: "EAGER")]
    private Contract $consentContract;

    #[ORM\Column(type: 'guid')]
    private string $createdBy;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
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

    public function getConsentContract(): ?Contract
    {
        return $this->consentContract;
    }

    public function setConsentContract(?Contract $consentContract): self
    {
        $this->consentContract = $consentContract;

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
}
