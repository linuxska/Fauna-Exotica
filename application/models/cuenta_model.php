<?php
/*
 * CUENTA_MODEL 
 * Contiene las funciones necesarias para registro y login
 * además de comprobaciones y modificaciones de datos en usuario de la BD
 * 
 */

class Cuenta_model extends CI_Model {

		/* Constructor */
		public function __construct(){
            parent::__construct();
            // Your own constructor code
        	$this->load->database();
		}
       
		public function obtener_todo($cod_usuario){
			$query = $this->db->where('id', $cod_usuario)
								->get('usuario');
			
			if($query->num_rows>0){
				return $query->row();
			}
		}
	
	
		// Obtener un campo específico
		public function obtener($campo, $cod_usuario){
			$query = $this->db->select($campo)
								->where('id', $cod_usuario)
								->get('usuario');
			$dato = $query->row()->$campo;
			
			return $dato;
		}
	
		// Comprobar si el usuario ya existe en la BD
       	public function existe_usuario ($usuario) {
	        if ($usuario === false) return false;
		    		    
		    $query = $this->db->select('id')
	                           ->where('usuario', $usuario)
	                           ->limit(1)
	                           ->get('usuario');
			
			if ($query->num_rows() == 1){
				return true;
			} else return false;   	
		}
       
		// Comprobar si el email ya existe en la BD
		public function existe_email ($email = false){  
	    	if ($email === false)return false;
	    
	    
	    	$query = $this->db->select('id')
                           	->where('email', $email)
                           	->limit(1)
                           	->get('usuario');
		
			if ($query->num_rows() == 1){
				return true;
			} else return false;
		}

	
		// Actualizar en la BD los campos de usuarios pasados por array
		public function actualizar_usuario ($datos, $cod_usuario){
			$this->db->where('id', $cod_usuario)
					  ->update('usuario', $datos); 
					
			return ($this->db->affected_rows() > 0) ? true : false;		
		}

	
		/* PARA LOGIN */
		// Comprueba si la password y el usuario coinciden
		public function comprobar_password ($usuario, $password) {
			if ($usuario === false || $password === false) return false;
		    		    
		    $query = $this->db->select('id, nombre, email, password')
	                    	   ->where('usuario', $usuario)
	                    	   ->limit(1)
	                    	   ->get('usuario');
		    
	        $result = $query->row(); // ->row() Devuelve el resultado de la consulta
	        if ($query->num_rows() == 1) // Si se encuentra el usuario
	        {
	    		if ($result->password === $password) {	    
	    		    return true;
	    		} else return false;
	        }
	        
			return false;	 	
       }
       
		public function comprobar_password_recuperacion ($usuario, $password) {
			if ($usuario === false || $password === false) return false;
		    		    
		    $query = $this->db->select('id, nombre, email, password_recuperacion')
	                    	   ->where('usuario', $usuario)
	                    	   ->limit(1)
	                    	   ->get('usuario');
		    
	        $result = $query->row(); // ->row() Devuelve el resultado de la consulta
	        if ($query->num_rows() == 1) // Si se encuentra el usuario
	        {
	    		if ($result->password_recuperacion === $password) {	    
	    		    return true;
	    		} else return false;
	        }
	        
			return false;	 	
       }
       
		public function login ($usuario= false, $password = false){
	    
	    	if ($usuario === false || $password === false) return false;
	    
	    
	   		 $query = $this->db->select('id, nombre, email, password, password_recuperacion, tipo')
	                    	   ->where('usuario', $usuario)
	                    	   ->limit(1)
	                    	   ->get('usuario');
	    
	        $result = $query->row(); // ->row() Devuelve el resultado de la consulta
	        if ($query->num_rows() == 1) {        	
	        	if ($result->password_recuperacion === NULL){
	        		// Inicio normal, comparando contraseñas
	    			if ($result->password === $password){
		    			$data = array('id'		=> $result->id,
					                   'nombre'  => $result->nombre,
		    						   'usuario' => $usuario,
					                   'email'     => $result->email,
					                   'logged_in' => TRUE,
		    						   'tipo' => $result->tipo
		               				);
		               				
						// Establece los datos de la sesión
		    		    $this->session->set_userdata($data);
		    		    
		    		    return true;
	    			} else return false;
	        	} else {
	        		// El usuario solicitó recuperacion de contraseña
	        		
	        		// Comprueba si recordo la pass actual
	        		if ($result->password === $password){
		    			$data = array('id'		=> $result->id,
					                   'nombre'  => $result->nombre,
		    						   'usuario' => $usuario,
					                   'email'     => $result->email,
					                   'logged_in' => TRUE
		               				);
		    		    
		    		    // Elimina la password de recuperacion
		    		    $update = array('password_recuperacion' => NULL);	    	
						$this->db->update('usuario', $update);
						
						// Establece los datos de la sesión
		    		    $this->session->set_userdata($data);
		    		    return true;
	    			} elseif ($result->password_recuperacion === $password){ 
	    				$data = array('id'		=> $result->id,
					                   'nombre'  => $result->nombre,
		    						   'usuario' => $usuario,
					                   'email'     => $result->email,
					                   'logged_in' => TRUE
		               				);
		               					    		    
		    		    // Cambia la pass y elimina la de recuperacion
		    		    $update = array('password_recuperacion' => NULL,
		    		    			   'password' => $password);	    	
						$this->db->update('usuario', $update);
						
						// Establece los datos de la sesión
		    		    $this->session->set_userdata($data);
		    		    return true;
	    			} else return false;
	        		
	        	}
			}
	        
			return false;		
		}
	
	
		/* REGISTRAR */
		
		public function registrar ($usuario = false, $password = false, $email = false){ 
		    if ($usuario === false || $password === false || $email === false)  return false;	    
		    
	        // Tabla usuario
			$data = array('usuario' => $usuario, 
						  'password' => $password, 
						  'email'    => $email);
	    	
			$this->db->insert('usuario', $data);
			
			return ($this->db->affected_rows() > 0) ? true : false;
		}
		
		/* Recuperacion contraseña */
		
		public function recuperar_por_usuario($usuario){
			$query = $this->db->select('usuario, password, email')
								->where('usuario', $usuario)
								->get('usuario');		
					
			if($query->num_rows>0){
				return $query->row_array();				
			}
		}
		
		public function recuperar_por_email($email){
			$query = $this->db->select('usuario, password, email')
								->where('email', $email)
								->get('usuario');
			
			if($query->num_rows>0){
				return $query->row_array();				
			}
		}
		
		
		// Insertar nueva pass en md5 en al BD para recuperacion via email
		public function registrar_password_recuperacion ($password){
		    if ($password === false)  return false;	    
		    
	        // Tabla usuario
			$data = array('password_recuperacion' => $password);
	    	
			$this->db->update('usuario', $data);
			
			return ($this->db->affected_rows() > 0) ? true : false;
		}
} // FIN CUENTA MODEL
?>
