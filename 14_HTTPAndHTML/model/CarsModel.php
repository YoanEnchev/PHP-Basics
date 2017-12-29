<?php
class CarsModel extends Model
{
	
	private $make;
	private $model;
	private $year;
	
	public function __construct($db, $make = null, $model = null, $year = null)
	{
	    parent::__construct($db);
		$this->table = "cars";
		$this->make = $make;
		$this->model = $model;
		$this->year = $year;
	}
	
	public function create(){
		try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `".$this->table."`
                (`make`, `model`, `year_production`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
			return $car_id;
		 } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

    public function readAllCars()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM cars");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function searchByMake($make)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM salesdata
        WHERE make=?");
            $stmt->bindParam(1, $make);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}