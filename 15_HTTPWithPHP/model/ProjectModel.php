<?php

class ProjectModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = "projects";
    }

    public function create($name, $description, $startDate, $endDate)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO projects (name, description, start_date, end_date)
                          VALUES(:name, :description, :start_date, :end_date)");
            $stmt->bindParam('name', $name);
            $stmt->bindParam('description', $description);
            $stmt->bindParam('start_date', $startDate);
            $stmt->bindParam('end_date', $endDate);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function readAll()
    {

    }

    public function matchEmpAndProjectIds($employeeId, $projectId)
    {
        $stmt = $this->db->prepare("INSERT INTO employees_projects(employee_id, project_id)
                    VALUES($employeeId, $projectId)");
        $stmt->bindParam('employee_id', $employeeId);
        $stmt->bindParam('project_id', $projectId);
        $stmt->execute();
    }

    public function getProjectsOfEmployee($employeeId)
    {
        $stmt = $this->db->prepare("SELECT name, description, start_date, end_date
                        FROM $this->table
                        INNER JOIN employees_projects ON $this->table.project_id = employees_projects.project_id
                        WHERE employee_id = :employee_id");
        $stmt->bindParam('employee_id', $employeeId);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}