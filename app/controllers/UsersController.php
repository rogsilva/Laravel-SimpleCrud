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
    
    
    public function postNew()
    {      
        $inputs = Input::all();   
        
        $validator = Validator::make($inputs, $this->entity->rules());        
        if($validator->fails()){
            return Redirect::to($this->indexRoute.'/new')
                            ->withErrors($validator)
                            ->withInput();
        }else{
            
            $inputs['password'] = Hash::make($inputs['password']);
            $inputs['remember_token'] = Hash::make($inputs['email'].date('Y-m-d'));
            
            if($this->entity->doInsert($inputs)){
                return Redirect::to($this->indexRoute)->with('message', "Cadastro realizado com sucesso");
            }                
        }      
    }
    
    public function postEdit($id)
    {
        $inputs = Input::all();        
        
        $validator = Validator::make($inputs, $this->entity->rulesEdit($id));        
        if($validator->fails()){
            return Redirect::to($this->indexRoute.'/edit/'.$id)
                            ->withErrors($validator)
                            ->withInput();
        }else{     
            if( isset($inputs['password'] ) && $inputs['password'] != '' ){
                $inputs['password'] = Hash::make($inputs['password']);
            }else{
                unset($inputs['password']);
            }
            if($this->entity->doUpdate($inputs, $id)){
                return Redirect::to($this->indexRoute)->with('message', "Cadastro alterado com sucesso");
            }                
        }
    }
}
