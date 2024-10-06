<?php
namespace Persons\Employees;
use Restaurants\Restaurant;


class Chef extends Employee{
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary){
        parent::__construct(
            $name,
            $age,
            $address,
            $employeeId,
            $salary
        );
    }

    public function prepareFood(Restaurant $restaurant, array $foorOrderMap, array $foodNameMenu): float{
        $name = $this->getName();
        $menu = $restaurant->getMenu();
        $total = 0;
        $finalPrice = 0.0;

        foreach($foorOrderMap as $food => $num){
            $index = array_search($food,$foodNameMenu);

            if($index !== false){
                for($j = 0;$j < $num;$j++){
                    $finalPrice += $menu[$index]->getPrice();
                    $total += $menu[$index]->getCookingTime();
                    echo $name." was cooking ".$food.".\n";

                }
            }
        }
        echo $name." took ".$total." minutes to cook.\n";
        return $finalPrice;
    }
}