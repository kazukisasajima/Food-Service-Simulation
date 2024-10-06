<?php
namespace Persons\Employees;
use Restaurants\Restaurant;

class Cashier extends Employee{
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary){
        parent::__construct(
            $name,
            $age,
            $address,
            $employeeId,
            $salary
        );
    }

    public function generateOrder(Restaurant $restaurant, array $foorOrderMap, array $foodNameMenu): float{
        $employees = $restaurant->getEmployees();
        $finalPrice = 0.0;

        echo $this->getName()." received the order.\n";
        for($i = 0;$i < count($employees);$i++){
            if(get_class($employees[$i]) == "Persons\Employees\Chef"){
                $chef = $employees[$i];
                $finalPrice = $chef->prepareFood($restaurant, $foorOrderMap, $foodNameMenu);
            }
        }
        return $finalPrice;
    }

    public function generateInvoice(){
        echo $this->getName()." made the invoice\n";
    }
}