<?php
class MyController extends Controller
{
    public function main()
    {
        include "view/header.php";
        include "view/main.php";
        switch($this->input){
            case 'sales':
                $this->viewSales();
                break;
            case 'add sale':
                $this->viewAddSale();
                break;
            case 'customers':
                $this->viewCustomers();
                break;
            case 'cars':
                $this->viewCars();
                break;
            case 'searchByMake':
                $this->viewSearchByMake();
                break;
            default:
                 include 'view/page_not_found.php';
        }
        include "view/footer.php";
    }

    public function viewSales()
    {
        $s = new SalesModel($this->db);
        $sales = $s->readAll();
        $sales_total = $s->readTotal();
        include "view/read_sales.php";
    }

    public function viewAddSale()
    {
        include 'view/add_sale.php';

        if(isset($_POST['addSale'])) {
            $car = new CarsModel($this->db, $_POST['make'], $_POST['model'], $_POST['year']);
            $car_id = $car->create();

            $customer = new CustomersModel($this->db, $_POST['firstName'], $_POST['familyName']);
            $customer_id = $customer->create();

            $sale = new SalesModel($this->db, $_POST['amount'], $car_id, $customer_id);
            $sale->create();

            include 'view/sale_added.php';
        }
    }

    public function viewCustomers()
    {
        $customer = New CustomersModel($this->db);
        $customersData = $customer->readAllCustomers();
        include 'view/read_customers.php';
    }

    public function viewCars()
    {
        $car = new CarsModel($this->db);
        $carsData = $car->readAllCars();
        include 'view/read_cars.php';
    }
}
