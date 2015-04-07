<?php
 
abstract class AbstractController extends BaseController
{
    
    protected $entity;
    protected $controller;
    protected $viewFolder;
    protected $indexRoute;
    protected $numRowsResult;

    public function getIndex()
    {
        $result = $this->entity->getAll($this->numRowsResult);        
        return View::make("{$this->viewFolder}.index", compact('result'));
    }
    
    public function getNew()
    {
        return View::make("{$this->viewFolder}.new");
    }
    
    public function postNew()
    {      
        $validator = Validator::make(Input::all(), $this->entity->roles());        
        if($validator->fails()){
            return Redirect::to('admin/'.$this->controller.'/new')
                            ->withErrors($validator)
                            ->withInput();
        }else{            
            if($this->entity->doInsert()){
                return Redirect::to($this->indexRoute)->with('message', "Cadastro realizado com sucesso");
            }                
        }      
    }
    
    public function getEdit($id)
    {
        
    }
    
    public function postEdit()
    {
        
    }
    
    public function getDelete($id)
    {
        
    }
    
    public function postDelete()
    {
        
    }
    
}
