<?php

namespace FoodItems;

class CheeseBurger extends FoodItem{
    public function __construct()
    {
        parent::__construct(
            "CheeseBurger",
            "This is a  hamburger with a slice of melted cheese on top of the meat patty.",
            10.0,
            3
        );
    }
}
