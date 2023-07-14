<?php

namespace App\Entity;

use App\Repository\FruitsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FruitsRepository::class)]
class Fruits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $family = null;

    #[ORM\Column(length: 255)]
    private ?string $genus = null;

    #[ORM\Column(length: 255)]
    private ?string $order_name = null;

    #[ORM\Column(length: 255)]
    private ?string $calories = null;

    #[ORM\Column(length: 255)]
    private ?string $fat = null;

    #[ORM\Column(length: 255)]
    private ?string $sugar = null;

    #[ORM\Column(length: 255)]
    private ?string $carbohydrates = null;

    #[ORM\Column(length: 255)]
    private ?string $protein = null;
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

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(string $genus): self
    {
        $this->genus = $genus;

        return $this;
    }

    public function getOrderName(): ?string
    {
        return $this->order_name;
    }

    public function setOrderName(string $order_name): self
    {
        $this->order_name = $order_name;

        return $this;
    }

    /**
     * @param string|null $calories
     * @return Fruits
     */
    public function setCalories(?string $calories): Fruits
    {
        $this->calories = $calories;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCalories(): ?string
    {
        return $this->calories;
    }

    /**
     * @return string|null
     */
    public function getFat(): ?string
    {
        return $this->fat;
    }

    /**
     * @param string|null $fat
     */
    public function setFat(?string $fat): void
    {
        $this->fat = $fat;
    }

    /**
     * @return string|null
     */
    public function getSugar(): ?string
    {
        return $this->sugar;
    }

    /**
     * @param string|null $sugar
     */
    public function setSugar(?string $sugar): void
    {
        $this->sugar = $sugar;
    }

    /**
     * @return string|null
     */
    public function getCarbohydrates(): ?string
    {
        return $this->carbohydrates;
    }

    /**
     * @param string|null $carbohydrates
     */
    public function setCarbohydrates(?string $carbohydrates): void
    {
        $this->carbohydrates = $carbohydrates;
    }

    /**
     * @return string|null
     */
    public function getProtein(): ?string
    {
        return $this->protein;
    }

    /**
     * @param string|null $protein
     */
    public function setProtein(?string $protein): void
    {
        $this->protein = $protein;
    }
}
