<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $streetAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commune;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timeStart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeEnd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $organisationName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="activities")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStreetAddress(): ?string
    {
        return $this->streetAddress;
    }

    public function setStreetAddress(string $streetAddress): self
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getTimeStart(): ?\DateTimeInterface
    {
        return $this->timeStart;
    }

    public function setTimeStart(\DateTimeInterface $timeStart): self
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function getTimeEnd(): ?string
    {
        return $this->timeEnd;
    }

    public function setTimeEnd(?string $timeEnd): self
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getOrganisationName(): ?string
    {
        return $this->organisationName;
    }

    public function setOrganisationName(?string $organisationName): self
    {
        $this->organisationName = $organisationName;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
