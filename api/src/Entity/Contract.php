<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
class Contract
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'guid')]
    private string $createdBy;

    #[ORM\Column(type: 'string', length: 255)]
    private string $companyName;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $address;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $phone;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $contractStart;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $contractEnd;

    #[ORM\Column(type: 'string', length: 255)]
    private string $consentRequiredOn;

    #[ORM\Column(type: 'integer')]
    private int $maxConsentDays;

    #[ORM\Column(type: 'boolean')]
    private bool $mandatory;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $contactEmail;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $category;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $ftp;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $ftpDir;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $programmaticName;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getContractStart(): ?DateTimeInterface
    {
        return $this->contractStart;
    }

    public function setContractStart(DateTimeInterface $contractStart): self
    {
        $this->contractStart = $contractStart;

        return $this;
    }

    public function getContractEnd(): ?DateTimeInterface
    {
        return $this->contractEnd;
    }

    public function setContractEnd(?DateTimeInterface $contractEnd): self
    {
        $this->contractEnd = $contractEnd;

        return $this;
    }

    public function getConsentRequiredOn(): ?string
    {
        return $this->consentRequiredOn;
    }

    public function setConsentRequiredOn(string $consentRequiredOn): self
    {
        $this->consentRequiredOn = $consentRequiredOn;

        return $this;
    }

    public function getMaxConsentDays(): ?int
    {
        return $this->maxConsentDays;
    }

    public function setMaxConsentDays(int $maxConsentDays): self
    {
        $this->maxConsentDays = $maxConsentDays;

        return $this;
    }

    public function getMandatory(): ?bool
    {
        return $this->mandatory;
    }

    public function setMandatory(bool $mandatory): self
    {
        $this->mandatory = $mandatory;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getFtp(): ?bool
    {
        return $this->ftp;
    }

    public function setFtp(?bool $ftp): self
    {
        $this->ftp = $ftp;

        return $this;
    }

    public function getFtpDir(): ?bool
    {
        return $this->ftpDir;
    }

    public function setFtpDir(?bool $ftpDir): self
    {
        $this->ftpDir = $ftpDir;

        return $this;
    }

    public function getProgrammaticName(): ?string
    {
        return $this->programmaticName;
    }

    public function setProgrammaticName(?string $programmaticName): self
    {
        $this->programmaticName = $programmaticName;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
