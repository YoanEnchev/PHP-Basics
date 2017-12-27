<?php

class Sale
{
    private $make;
    private $model;
    private $yearManifacture;
    private $buyerFirstName;
    private $buyerLastName;
    private $amount;

    public function __construct(string $make, string $model, int $yearManifacture, string $buyerFirstName,
    string $buyerLastName, float $amount)
    {
        $this->setMake($make);
        $this->setModel($model);
        $this->setYearManifacture($yearManifacture);
        $this->setBuyerFirstName($buyerFirstName);
        $this->setBuyerLastName($buyerLastName);
        $this->setAmount($amount);
    }

    public function insertIntoDB(PDO $db)
    {
        try {
            $make = $this->getMake();
            $model = $this->getModel();
            $year = $this->getYearManifacture();
            $amount = $this->getAmount();
            $customerFirstName = $this->getBuyerFirstName();
            $customerFamilyName = $this->getBuyerLastName();

            $db->beginTransaction();
            //Insert into cars
            $stmt = $db->prepare("INSERT INTO cars(car_id, make, model ,year_production)
            VALUES(NULL, :make, :model, :year)");
            $stmt->bindParam('make', $make);
            $stmt->bindParam('model', $model);
            $stmt->bindParam('year', $year);
            $stmt->execute();
            $carId = $db->lastInsertId();

            //Insert into customers
            $stmt = $db->prepare("INSERT INTO customers(customer_id, first_name,family_name)
            VALUES(NULL, :firstName, :familyName)");
            $stmt->bindParam('firstName', $customerFirstName);
            $stmt->bindParam('familyName', $customerFamilyName);
            $stmt->execute();
            $customerId = $db->lastInsertId();

            //Insert into sales
            $stmt = $db->prepare("INSERT INTO sales(sale_id, car_id, customer_id, amount)
              VALUES(NULL, :carId, :customerId, :amount);");
            $stmt->bindParam('carId', $carId);
            $stmt->bindParam('customerId', $customerId);
            $stmt->bindParam('amount', $amount);
            $stmt->execute();

            $db->commit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $db->rollBack();
        }
    }


    public function getMake()
    {
        return $this->make;
    }

    public function setMake($make)
    {
        $this->make = $make;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getYearManifacture()
    {
        return $this->yearManifacture;
    }

    public function setYearManifacture($yearManifacture)
    {
        $this->yearManifacture = $yearManifacture;
    }

    public function getBuyerFirstName()
    {
        return $this->buyerFirstName;
    }

    public function setBuyerFirstName($buyerFirstName)
    {
        $this->buyerFirstName = $buyerFirstName;
    }

    public function getBuyerLastName()
    {
        return $this->buyerLastName;
    }

    public function setBuyerLastName($buyerLastName)
    {
        $this->buyerLastName = $buyerLastName;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}