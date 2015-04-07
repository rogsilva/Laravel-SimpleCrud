<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserModel extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        protected $fillable = array('first_name', 'last_name', 'email', 'password');




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
            $user = new UserModel();
            $input['password'] = Hash::make($input['password']);
            $input['remember_token'] = Hash::make($input['email'].date('Y-m-d'));
            $user->fill($input);
            if($user->save())
                return $user;
            
            return FALSE;
        }
        
        public function doUpdate($id)
        {
            $input = Input::all();
            if( isset($input['password']) ){
                $input['password'] = Hash::make($input['password']);
            }            
            $user = self::find($id);
            $user->fill($input);
            $user->updated_at = new \DateTime('now');
            if($user->save())
                return $user;
            
            return FALSE;
        }
        
        public function doDelete($id)
        {          
            $user = self::find($id);
            if($user)
                return $user->delete();
            
            return false;
        }

        

        public function roles()
        {
            return array(
                'first_name' => 'required|min:3|max:45',
                'last_name' => 'required|min:3|max:100',
                'email' => "required|max:150|unique:{$this->table}|email",
                'password' => 'required|confirmed',
            );
        }
        
        public function rolesEdit($id = null)
        {
            return array(
                'first_name' => 'required|min:3|max:45',
                'last_name' => 'required|min:3|max:100',
                'email' => "required|max:150|unique:{$this->table},email,{$id}|email",
            );
        }

}
