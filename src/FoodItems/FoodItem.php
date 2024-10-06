<?php

namespace FoodItems;

abstract class FoodItem{
    protected string $name;
    protected string $description;
    protected float $price;
    protected int $cookingTime;

    public function __construct(string $name,string $description, float $price, int $cookingTime)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->cookingTime = $cookingTime;        
    }

    public function getName():string{
        return $this->name;
    }

    public function getDescription():string{
        return $this->description;
    }

    public function getPrice():float{
        return $this->price;
    }

    public function getCookingTime():int{
        return $this->cookingTime;
    }

}