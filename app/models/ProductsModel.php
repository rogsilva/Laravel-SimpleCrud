<?php


class ProductsModel extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
        
        protected $fillable = array('code', 'description');




        public function getAll($numRegs)
        {
            return self::paginate($numRegs);
        }
        
        public function getFind($id)
        {
            return self::find($id);
        }
        
        
        public function doInsert()
        {
            $input = Input::all();
            $product = new ProductsModel();
            $product->fill($input);
            if($product->save())
                return $product;
            
            return FALSE;
        }
        
        public function doUpdate($id)
        {
            $input = Input::all();         
            $product = self::find($id);
            $product->fill($input);
            $product->updated_at = new \DateTime('now');
            if($product->save())
                return $product;
            
            return FALSE;
        }
        
        public function doDelete($id)
        {          
            $product = self::find($id);
            if($product)
                return $product->delete();
            
            return false;
        }

        

        public function roles()
        {
            return array(
                'code' => 'required|min:6|max:6',
                'description' => 'required|min:3|max:100',
            );
        }
        
        public function rolesEdit($id = null)
        {
            return $this->roles();
        }

}
