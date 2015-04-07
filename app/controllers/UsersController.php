<?php

class UsersController extends AbstractController
{
    public function __construct()
    {
        $this->entity = new UserModel();
        $this->viewFolder = 'users';
        $this->indexRoute = 'admin/users';
        $this->numRowsResult = 15;
    }
    
    
}
