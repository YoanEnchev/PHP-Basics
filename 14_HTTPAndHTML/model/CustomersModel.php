<?php
class CustomersModel extends Model
{
	private $name;
	private $family;

    public function __construct($db, $name = null, $family = null)
    {
        parent::__construct($db);
        $this->table = "customers";
        $this->name = $name;
        $this->family = $family;
    }
	
	public function create()
	{
		// Insert into customers
		try{
            $stmt = $this->db->prepare("
              INSERT INTO `".$this->table."`
                (`first_name`, `family_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->family);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            return($customer_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

	public function readAllCustomers()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM customers");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}