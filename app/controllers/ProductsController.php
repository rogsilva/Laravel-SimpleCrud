<?php

class ProductsController extends AbstractController
{
    public function __construct()
    {
        $this->entity = new ProductsModel();
        $this->viewFolder = 'products';
        $this->indexRoute = 'admin/products';
        $this->numRowsResult = 15;
    }
}
