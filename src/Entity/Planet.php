<?php

namespace App\Entity;

use App\Repository\PlanetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanetRepository::class)
 */
class Planet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $englishName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPlanet;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $mass;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $diameter;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gravity;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $density;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $meanTemperature;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $semimajorAxis;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $orbitalPeriod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $orbitalSpeed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $moonsCount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discoveredBy;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $discoveredDate;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getEnglishName(): ?string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): self
    {
        $this->englishName = $englishName;

        return $this;
    }

    public function isIsPlanet(): ?bool
    {
        return $this->isPlanet;
    }

    public function setIsPlanet(bool $isPlanet): self
    {
        $this->isPlanet = $isPlanet;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(?float $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getDiameter(): ?float
    {
        return $this->diameter;
    }

    public function setDiameter(?float $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getGravity(): ?float
    {
        return $this->gravity;
    }

    public function setGravity(?float $gravity): self
    {
        $this->gravity = $gravity;

        return $this;
    }

    public function getDensity(): ?float
    {
        return $this->density;
    }

    public function setDensity(?float $density): self
    {
        $this->density = $density;

        return $this;
    }

    public function getMeanTemperature(): ?int
    {
        return $this->meanTemperature;
    }

    public function setMeanTemperature(?int $meanTemperature): self
    {
        $this->meanTemperature = $meanTemperature;

        return $this;
    }

    public function getSemimajorAxis(): ?float
    {
        return $this->semimajorAxis;
    }

    public function setSemimajorAxis(?float $semimajorAxis): self
    {
        $this->semimajorAxis = $semimajorAxis;

        return $this;
    }

    public function getOrbitalPeriod(): ?float
    {
        return $this->orbitalPeriod;
    }

    public function setOrbitalPeriod(?float $orbitalPeriod): self
    {
        $this->orbitalPeriod = $orbitalPeriod;

        return $this;
    }

    public function getOrbitalSpeed(): ?float
    {
        return $this->orbitalSpeed;
    }

    public function setOrbitalSpeed(?float $orbitalSpeed): self
    {
        $this->orbitalSpeed = $orbitalSpeed;

        return $this;
    }

    public function getMoonsCount(): ?int
    {
        return $this->moonsCount;
    }

    public function setMoonsCount(?int $moonsCount): self
    {
        $this->moonsCount = $moonsCount;

        return $this;
    }

    public function getDiscoveredBy(): ?string
    {
        return $this->discoveredBy;
    }

    public function setDiscoveredBy(?string $discoveredBy): self
    {
        $this->discoveredBy = $discoveredBy;

        return $this;
    }

    public function getDiscoveredDate(): ?string
    {
        return $this->discoveredDate;
    }

    public function setDiscoveredDate(?string $discoveredDate): self
    {
        $this->discoveredDate = $discoveredDate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
