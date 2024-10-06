<?php
namespace Persons\Customers;
use Invoices\Invoice;
use Persons\Person;
use Restaurants\Restaurant;

class Customer extends Person{
    protected array $interestedTastesMap = [];

    public function __construct(string $name, int $age, string $address, array $interestedTastesMap){
        parent::__construct(
            $name,
            $age,
            $address
        );
        $this->interestedTastesMap = $interestedTastesMap;
    }

    public function interestedCategories(){
        $foodList = "";
        
        foreach($this->interestedTastesMap as $food => $num){
            $foodList .= $food.", ";
        }
        echo $this->getName()." wanted to eat ".substr($foodList,0,strlen($foodList)-2).".\n";
    }

    public function order(Restaurant $restaurant,): Invoice{
        $employees = $restaurant->getEmployees();
        $name = $this->getName();
        $menu = $restaurant->getMenu();
        
        $finalPrice = 0;
        $foodOrderStr = "";
        $foodNameMenu = array_fill(0,count($menu),"");
        $foorOrderMap = array();

        $this->interestedCategories();
        
        for($i = 0;$i < count($menu);$i++){
            $foodNameMenu[$i] = $menu[$i]->getName();
        }

        foreach($this->interestedTastesMap as $food => $num){
            $index = array_search($food,$foodNameMenu);

            if($index !== false){
                $foorOrderMap[$food] = $num;
                $foodOrderStr .= $food." ✕ ".$num.", ";
            }
        }

        echo $name." was looking at the menu, and order".substr($foodOrderStr,0,strlen($foodOrderStr)-2).".\n";

        for($i = 0;$i < count($employees);$i++){
            if(get_class($employees[$i]) == "Persons\Employees\Cashier"){
                $cashier = $employees[$i];
                $finalPrice = $cashier->generateOrder($restaurant, $foorOrderMap, $foodNameMenu);
                $cashier->generateInvoice();
            }
        }
        return new Invoice($finalPrice);
    }
}