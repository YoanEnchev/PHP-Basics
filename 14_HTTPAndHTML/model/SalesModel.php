<?php
class SalesModel extends Model{
	private $date_time;
	private $amount;
	private $car_id;
	private $customer_id;

	public function __construct($db, $amount = null, $car_id = null, $customer_id = null)
    {
        parent::__construct($db);
        $this->amount = $amount;
        $this->car_id = $car_id;
        $this->customer_id = $customer_id;
        $this->date_time = date('Y-m-d H:i:s');
    }

    public function create()
	{
        // Insert into sales
		try{
            $stmt = $this->db->prepare("
                INSERT INTO `sales`
                  (`sale_date`,`amount`,`car_id`,`customer_id`)
                VALUES 
                   (NOW(), ?, ?, ?)");
            $stmt->bindParam(1, $this->amount);
            $stmt->bindParam(2, $this->car_id);
            $stmt->bindParam(3, $this->customer_id);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            $this->db->commit();
            return($sale_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

	public function readAll()
	{
        try {
            $stmt = $this->db->prepare("
              SELECT *         
                FROM `salesData`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch(PDOException $e){
		    print "Error!: " . $e->getMessage() . "<br/>";
        }
	}
	
	public function readTotal()
	{
        $stmt = $this->db->prepare("
            SELECT SUM(`amount`) as `total_amount`
              FROM `sales`");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['total_amount'])
			return $row['total_amount'];
		else
			return false;
	}

}