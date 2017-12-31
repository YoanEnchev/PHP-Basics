<?php

class EmployeeController extends Controller
{
    public function main()
    {

    }

    public function viewAll()
    {
        $m = new EmployeesModel($this->db);
        $employeeData = $m->readAll($this->db);
        $this->loadView("read_all_employees.php", $employeeData);
    }

    public function addProject()
    {
        try {
            $m = new MainController($this->db);
            $m->loadView('add_project_to_employee.php');

            if (isset($_POST['sendData']) && isset($_POST['name']) && isset($_POST['description'])
                && isset($_POST['start_date']) && isset($_POST['end_date'])) {
                if (DateTime::createFromFormat('Y-m-d', $_POST['start_date']) &&
                    DateTime::createFromFormat('Y-m-d', $_POST['end_date'])) {
                    $p = new ProjectModel($this->db);
                    $p->create($_POST['name'], $_POST['description'], $_POST['start_date'], $_POST['end_date']);
                    $projectId = $this->db->lastInsertId();
                    $employeeId = $_GET['id'];
                    $p->matchEmpAndProjectIds($employeeId, $projectId);

                    $m = new MainController($this->db);
                    $m->addToPage('project_added.php');
                } else {
                    echo "Invalid date";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function viewProjects()
    {
        $p = new ProjectModel($this->db);
        $data = $p->getProjectsOfEmployee($_GET['id']);
        $m = new MainController($this->db);
        $m->loadView('read_projects_of_employee.php', $data);
    }

    public function changeAddress()
    {
        $m = new MainController($this->db);
        $m->loadView('change_employee_address.php');

        if (isset($_POST['changeAddress']) && isset($_POST['newAddress']) && isset($_POST['newTown']) && isset($_GET['id'])) {
            $a = new AddressesModel($this->db);
            $a->updateEmployeeAdress($_GET['id'], $_POST['newTown'], $_POST['newAddress']);

            $m = new MainController($this->db);
            $m->addToPage('changed-employee-address.php');
        }
    }
}