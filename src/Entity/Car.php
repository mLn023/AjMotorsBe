<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Brand = null;

    #[ORM\Column(length: 255)]
    private ?string $Model = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Category = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FirstRegistration = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $TechnicalControl = null;

    #[ORM\Column(nullable: true)]
    private ?int $mileage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Energy = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Gearbox = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ColorOutside = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ColorInside = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $NumOfDoors = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $NumOfSeats = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isFirstHand = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $FiscalPower = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $HorsePower = null;

    #[ORM\Column(nullable: true)]
    private ?float $CO2Emission = null;

    #[ORM\Column(nullable: true)]
    private ?float $Consumption = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $Options = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(?string $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getFirstRegistration(): ?\DateTimeInterface
    {
        return $this->FirstRegistration;
    }

    public function setFirstRegistration(?\DateTimeInterface $FirstRegistration): self
    {
        $this->FirstRegistration = $FirstRegistration;

        return $this;
    }

    public function getTechnicalControl(): ?\DateTimeInterface
    {
        return $this->TechnicalControl;
    }

    public function setTechnicalControl(?\DateTimeInterface $TechnicalControl): self
    {
        $this->TechnicalControl = $TechnicalControl;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getEnergy(): ?string
    {
        return $this->Energy;
    }

    public function setEnergy(?string $Energy): self
    {
        $this->Energy = $Energy;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->Gearbox;
    }

    public function setGearbox(string $Gearbox): self
    {
        $this->Gearbox = $Gearbox;

        return $this;
    }

    public function getColorOutside(): ?string
    {
        return $this->ColorOutside;
    }

    public function setColorOutside(string $ColorOutside): self
    {
        $this->ColorOutside = $ColorOutside;

        return $this;
    }

    public function getColorInside(): ?string
    {
        return $this->ColorInside;
    }

    public function setColorInside(string $ColorInside): self
    {
        $this->ColorInside = $ColorInside;

        return $this;
    }

    public function getNumOfDoors(): ?int
    {
        return $this->NumOfDoors;
    }

    public function setNumOfDoors(?int $NumOfDoors): self
    {
        $this->NumOfDoors = $NumOfDoors;

        return $this;
    }

    public function getNumOfSeats(): ?int
    {
        return $this->NumOfSeats;
    }

    public function setNumOfSeats(?int $NumOfSeats): self
    {
        $this->NumOfSeats = $NumOfSeats;

        return $this;
    }

    public function isIsFirstHand(): ?bool
    {
        return $this->isFirstHand;
    }

    public function setIsFirstHand(?bool $isFirstHand): self
    {
        $this->isFirstHand = $isFirstHand;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->FiscalPower;
    }

    public function setFiscalPower(?int $FiscalPower): self
    {
        $this->FiscalPower = $FiscalPower;

        return $this;
    }

    public function getHorsePower(): ?int
    {
        return $this->HorsePower;
    }

    public function setHorsePower(?int $HorsePower): self
    {
        $this->HorsePower = $HorsePower;

        return $this;
    }

    public function getCO2Emission(): ?float
    {
        return $this->CO2Emission;
    }

    public function setCO2Emission(?float $CO2Emission): self
    {
        $this->CO2Emission = $CO2Emission;

        return $this;
    }

    public function getConsumption(): ?float
    {
        return $this->Consumption;
    }

    public function setConsumption(?float $Consumption): self
    {
        $this->Consumption = $Consumption;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->Options;
    }

    public function setOptions(?array $Options): self
    {
        $this->Options = $Options;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
