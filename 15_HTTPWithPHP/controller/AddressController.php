<?php

class AddressController extends Controller
{
    public function main()
    {

    }

    public function viewEmployeeAddress()
    {
        $a = new AddressesModel($this->db);
        $data = $a->getAddressOfEmployee($_GET['id']);
        $m = new MainController($this->db);
        $m->loadView('read_employee_address.php', $data);
    }
}