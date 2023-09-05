<?php


namespace App\Repositories\Order;


use App\Models\Order;
use App\Repositories\BaseRepositories;
use App\Repositories\RepositoriesInterface;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
    }
}
