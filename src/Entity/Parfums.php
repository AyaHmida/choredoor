<?php

namespace App\Entity;

use App\Repository\ParfumsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParfumsRepository::class)]
class Parfums
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prix = null;

    #[ORM\OneToMany(mappedBy: 'parfums', targetEntity: Category1::class)]
    private Collection $Category1;

    public function __construct()
    {
        $this->Category1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Category1>
     */
    public function getCategory1(): Collection
    {
        return $this->Category1;
    }

    public function addCategory1(Category1 $category1): self
    {
        if (!$this->Category1->contains($category1)) {
            $this->Category1->add($category1);
            $category1->setParfums($this);
        }

        return $this;
    }

    public function removeCategory1(Category1 $category1): self
    {
        if ($this->Category1->removeElement($category1)) {
            // set the owning side to null (unless already changed)
            if ($category1->getParfums() === $this) {
                $category1->setParfums(null);
            }
        }

        return $this;
    }
}
