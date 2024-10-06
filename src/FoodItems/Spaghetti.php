<?php

namespace FoodItems;

class Spaghetti extends FoodItem{
    public function __construct()
    {
        parent::__construct(
            "Spaghetti",
            "This is a long, thin, solid, cylindrical pasta.",
            20,
            25
        );
    }
}
