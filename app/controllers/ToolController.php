<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;

class ToolController
{
    public function index(Router $router)
    {
        $products = [
            [
                'id'           => 1,
                'name'         => 'Martillo',
                'category'     => 'Contucion',
                'stock_total'  => 42,
                'stock_actual' => 32
            ],
            [
                'id'           => 2,
                'name'         => 'Tester',
                'category'     => 'Electronica',
                'stock_total'  => 10,
                'stock_actual' => 3
            ],
            [
                'id'           => 3,
                'name'         => 'Nunchacos',
                'category'     => 'Karate',
                'stock_total'  => 1,
                'stock_actual' => 1
            ],
            [
                'id'           => 4,
                'name'         => 'Camioneta',
                'category'     => 'Vehiculo',
                'stock_total'  => 40,
                'stock_actual' => 33
            ],
            [
                'id'           => 5,
                'name'         => 'Rascacielo',
                'category'     => 'Edificio',
                'stock_total'  => 2,
                'stock_actual' => 1
            ],
            [
                'id'           => 3,
                'name'         => 'Escoba',
                'category'     => 'Aseo',
                'stock_total'  => 3,
                'stock_actual' => 3
            ]
        ];
        $router->renderView('tool/index', [
            'products' => $products
        ]);
    }

    public function add(Router $router)
    {
        echo "Add Page";
    }

    public function update(Router $router)
    {
        echo "Update Page";
    }

    public function remove(Router $router)
    {
        echo "Delete Page";
    }
}
