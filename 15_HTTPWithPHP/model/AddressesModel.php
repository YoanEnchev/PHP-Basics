<?php

class AddressesModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = "addresses";
    }

    public function getAddressOfEmployee($employeeId)
    {
        $stmt = $this->db->prepare("
            SELECT  address_text, towns.name
            FROM $this->table
            INNER JOIN towns ON towns.town_id = $this->table.town_id
            INNER JOIN employees ON employees.address_id = $this->table.address_id
            WHERE employee_id = :id");
        $stmt->bindParam('id', $employeeId);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateEmployeeAdress($employeeId ,$newTown, $newAddress)
    {
        try {
            $this->db->beginTransaction();

            //get input town data
            $stmt = $this->db->prepare("SELECT * FROM towns WHERE name=:townName");
            $stmt->bindParam('townName', $newTown);
            $stmt->execute();
            $data_town = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //determine townId and add town if it has not existed
            if (sizeof($data_town) == 0) { //if town is not registered in DB
                $stmt = $this->db->prepare("INSERT INTO towns(name)
            VALUES(:townName)");
                $stmt->bindParam('townName', $newTown);
                $stmt->execute();
                $townId = $this->db->lastInsertId();
            } else { //if town is registered
                $townId = $data_town[0]['town_id'];
            }

            //get input address data
            $stmt = $this->db->prepare("SELECT * FROM $this->table
        WHERE address_text = :address
        AND town_id = :townId");
            $stmt->bindParam('address', $newAddress);
            $stmt->bindParam('townId', $townId);
            $stmt->execute();
            $data_address = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //determine addressId and insert address if not registered
            if (sizeof($data_address) == 0) //if address is not registered.
            {
                $stmt = $this->db->prepare("INSERT INTO $this->table(address_text, town_id)
            VALUES(:address, :townId)");
                $stmt->bindParam('address', $newAddress);
                $stmt->bindParam('townId', $townId);
                $stmt->execute();

                $addressId = $this->db->lastInsertId();
            } else {
                $addressId = $data_address[0]['address_id'];
            }

            $em = new EmployeesModel($this->db);
            $em->changeAddressId($employeeId, $addressId);

            $this->db->commit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}