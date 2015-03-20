<?php
// interfaz a implementar
use Illuminate\Auth\UserInterface;

Class Usuarios extends Eloquent implements UserInterface{
    
    protected $table = 'usuarios';
    protected $fillable = array('nombre', 'correo', 'password');
    protected $primaryKey = 'id';
    protected $hidden = array('password');    

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
    
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }  
}
