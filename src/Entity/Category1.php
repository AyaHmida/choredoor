<?php

namespace App\Entity;

use App\Repository\Category1Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Category1Repository::class)]
class Category1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

   

    #[ORM\ManyToOne(inversedBy: 'Category1')]
    private ?Parfums $parfums = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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


    public function getParfums(): ?Parfums
    {
        return $this->parfums;
    }

    public function setParfums(?Parfums $parfums): self
    {
        $this->parfums = $parfums;

        return $this;
    }
}
