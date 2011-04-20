<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuratcion para enviar emails. 
| */  
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_timeout'] = "7"; 
$config['smtp_user'] = "lauscar.sl@gmail.com";
$config['smtp_pass'] = "faunaexotica";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";
$config['_smtp_auth']  = TRUE;

/* End of file email.php */
/* Location: ./application/config/emailphp */
