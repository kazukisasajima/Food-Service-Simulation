<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem{
    public function __construct()
    {
        parent::__construct(
            "HawaiianPizza",
            "Hawaiian pizza is a pizza originating in Canada,traditionally topped with pineapple, tomato sauce, cheese, and either ham or bacon. ",
            15.0,
            10
        );
    }
}
