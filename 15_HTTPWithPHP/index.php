<?php
// Load DB
include "configs.php";

// Load core classes
include "core/Model.php";
include "core/Controller.php";

// Load model classes - they extend Model.php
include "model/AddressesModel.php";
include "model/EmployeesModel.php";
include "model/ProjectModel.php";

// Load Controller class - it extends Controller.php
include "controller/MainController.php";
include "controller/EmployeeController.php";
include "controller/AddressController.php";

$m = new MainController($db);
$m->route();