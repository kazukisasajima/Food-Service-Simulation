<?php

namespace Restaurants;

class Restaurant{
    protected array $menu = [];
    protected array $employees = [];

    public function __construct(array $menu,array $employees)
    {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function getMenu():array{
        return $this->menu;
    }

    public function getEmployees():array{
        return $this->employees;
    }
}