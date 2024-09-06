<?php
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    public function describe() {
        return "This is a vehicle.";
    }
}

class Car extends Vehicle {
    private $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year); 
        $this->doors = $doors;
    }

    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

final class Motorcycle extends Vehicle {
    public function describe() {
        return "This is a motorcycle.";
    }
}

interface ElectricVehicle {
    public function chargeBattery();
}

class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors); 
        $this->batteryLevel = $batteryLevel;
    }
    public function chargeBattery() {
        $this->batteryLevel = 100;
        return "The battery is fully charged.";
    }
    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

$car = new Car("Toyota", "Corolla", 2020, 4);
echo $car->getDetails() . PHP_EOL; 
echo $car->describe() . PHP_EOL;  

$motorcycle = new Motorcycle("Harley-Davidson", "Sportster", 2021);
echo $motorcycle->getDetails() . PHP_EOL; 
echo $motorcycle->describe() . PHP_EOL;   

$electricCar = new ElectricCar("Tesla", "Model 3", 2023, 4);
echo $electricCar->getDetails() . PHP_EOL; 
echo $electricCar->describe() . PHP_EOL;  
echo $electricCar->chargeBattery() . PHP_EOL; 
?>