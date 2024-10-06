<?php

namespace FoodItems;

class Fettuccine extends FoodItem{
    public function __construct()
    {
        parent::__construct(
            "Fettuccine",
            "This is a type of pasta popular in Roman cuisine.",
            25,
            20
        );   
    }
}
