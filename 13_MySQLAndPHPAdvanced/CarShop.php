<?php

class CarShop
{
    public function getSumOfSales(PDO $db): float
    {
        $stmt = $db->prepare("SET @sum=0;
        CALL get_sales(@sum);");
        $stmt->execute();

        $stmt = $db->prepare("SELECT @sum;");
        $stmt->execute();

        $sumData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sumData[0]['@sum'];
    }

    public function getAllSales(PDO $db): array
    {
        $stmt = $db->prepare("SELECT * FROM salesData");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}