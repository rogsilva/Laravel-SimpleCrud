<?php
 
abstract class AbstractController extends BaseController
{
    
    protected $entity;
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
        $inputs = Input::all();
        
        $validator = Validator::make($inputs, $this->entity->rules());        
        if($validator->fails()){
            return Redirect::to($this->indexRoute.'/new')
                            ->withErrors($validator)
                            ->withInput();
        }else{            
            if($this->entity->doInsert($inputs)){
                return Redirect::to($this->indexRoute)->with('message', "Cadastro realizado com sucesso");
            }                
        }      
    }
    
    public function getEdit($id)
    {
        $entity = $this->entity->getFind($id);
        return View::make("{$this->viewFolder}.edit", compact('entity'));
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
            if($this->entity->doUpdate($inputs, $id)){
                return Redirect::to($this->indexRoute)->with('message', "Cadastro alterado com sucesso");
            }                
        }
    }
    
    public function getDelete($id)
    {
        if($this->entity->doDelete($id)){
            return Redirect::to($this->indexRoute)->with('message', "Cadastro removido com sucesso");
        }
        
        return Redirect::to($this->indexRoute);
    }
    
}
