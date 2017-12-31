<?php

class EmployeesModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = "employees";
    }

    public function readAll(PDO $db)
   {
       $stmt = $this->db->prepare("SELECT employee_id ,first_name, last_name, job_title, salary, name AS dep_name
       FROM $this->table
       INNER JOIN departments ON departments.department_id = $this->table.department_id");
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
   }

    public function changeAddressId($employeeId, $newAddressId)
    {
        $stmt = $this->db->prepare("UPDATE $this->table
        SET address_id = :newAddressId
        WHERE employee_id = :employeeId");
        $stmt->bindParam('newAddressId', $newAddressId);
        $stmt->bindParam('employeeId', $employeeId);
        $stmt->execute();
    }
}