<?php

class Usuario_model extends CI_Model {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       }
       
	public function obtener_todos(){
		$query = $this->db->get('usuario');
		
		if($query->num_rows>0){
			foreach ($query->result() as $fila) {
				$data[] = $fila;
			}
			return $data;
		}
	}
	
	public function comprobar_usuario ($usuario = false)
	{
	    
	    if ($usuario === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('cod')
                           ->where('usuario', $usuario)
                           ->limit(1)
                           ->get('usuario');
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}
		
	public function comprobar_email ($email = false)
	{
	    
	    if ($email === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('cod')
                           ->where('email', $email)
                           ->limit(1)
                           ->get('usuario');
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}
	
public function registrar ($usuario = false, $password = false, $email = false)
	{
	    
	    if ($usuario === false || $password === false || $email === false)
	    {
	        return false;
	    }
	    
	    // Convertir pass a md5
	    $this->load->library('encrypt');
		$password =  $this->encrypt->encode($password);
		
        // Tabla usuario
		$data = array('usuario' => $usuario, 
					  'password' => $password, 
					  'email'    => $email);
		  
		$this->db->insert('usuario', $data);
		
		return ($this->db->affected_rows() > 0) ? true : false;
	}
	
	public function login ($usuario= false, $password = false)
	{
	    
	    if ($usuario === false || $password === false)  
	    {	 // NOTA: ¿Falta comprobar si esta identificado ya ?
	        return false;
	    }
	    
	    $query = $this->db->select('id, password')
                    	   ->where('usuario', $usuario)
                    	   ->limit(1)
                    	   ->get('usuario');
	    
        $result = $query->row(); // ->row() Devuelve el resultado de la consulta
        if ($query->num_rows() == 1) // Si se encuentra el usuario
        {
 			// Desencriptacion MD5
            $this->load->library('encrypt');
            $password_db = $this->encrypt->decode($result->password);
           
    		if ( $password_db === $password)
    		{
    		    $this->session->set_userdata('id',  $result->id);
    		    return true;
    		}
        }
        
		return false;		
	}
	
	public function logout(){
		$this->session->sess_destroy();
	}
}
?>