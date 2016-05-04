<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CodeIgniter Validaciones Helpers
 *
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Joseph A. Garcia E.
 * @email       rock3t2013@gmail.com.
 */

// --------------------------------------------------------------------

//---------------------FUNCIONES DE MENSAJES--------------------------------------------
function mensajeContador(){
  $CI = & get_instance();
  $mensaje = 'Varios intentos fallidos, Por favor cierre y abra nuevamente su navegador.';
  return $mensaje;
}

function mensajeSeleccion($campo){
  $CI = & get_instance();
  $mensaje = 'Debe seleccionar una opción en el campo <b>'.$campo.'</b>.';
  return $mensaje;
}

function mensajeLogin(){
  $CI = & get_instance();
  $mensaje = 'El <b>Usuario</b> o la <b>Contraseña</b> son Incorrectos.';
  return $mensaje;
}

function mensajeEstado($estado){
  $CI = & get_instance();
  $mensaje = 'Este Usuario se ecuentra <b>'.$estado.'</b>.';
  return $mensaje;
}

function mensajeFormRequerido(){
  $CI = & get_instance();
  $mensaje = 'Ingrese los <b>Datos</b> Correspondientes.';
  return $mensaje;
}

function mensajeEspacio($campo){
  $CI = & get_instance();
  $mensaje = 'El campo <b>'.$campo.'</b> no puede contener espacios en blanco.';
  return $mensaje;
}

function mensajeRequerido($campo){
  $CI = & get_instance();
  $mensaje = 'El campo <b>'.$campo.'</b> se ecuentra en Blanco.';
  return $mensaje;
}

function mensajeSeguridad($error){
  $CI = & get_instance();
  $mensaje = 'A ocurrido un error inesperado por Seguridad el sistema se ha Cerrado. ERROR: <b>'.$error.'</b>';
  return $mensaje;
}

function mensajeCampo($campo){
  $CI = & get_instance();
  $mensaje = 'El campo <b>'.$campo.'</b> es Incorrecto.';
  return $mensaje;
}

function mensajeValor($valor){
  $CI = & get_instance();
  $mensaje = 'El valor: <b>'.$valor.'</b> es Incorrecto.';
  return $mensaje;
}

function mensajeValorCampo($valor, $campo){
  $CI = & get_instance();
  $mensaje = 'El valor ingresado no es Correcto. <b>'.$campo.': </b>'.$valor.'.';
  return $mensaje;
}

function mensajeValorCampoA($valor, $campo){
  $CI = & get_instance();
  $mensaje = 'La '.$campo.': <b>'.$valor.'</b> es Icorrecta.';
  return $mensaje;
}

function mensajeValorCampoB($valor, $campo){
  $CI = & get_instance();
  $mensaje = 'El '.$campo.': <b>'.$valor.'</b> es Icorrecto.';
  return $mensaje;
}

function mensajeCaracteresEspeciales($campo){
  $CI = & get_instance();
  $mensaje = 'El campo <b>'.$campo.'</b> posee caracteres no permitidos.';
  return $mensaje;
}

function mensajeCaracteresTipo($campo, $tipo){
  $CI = & get_instance();
  $mensaje = 'El campo <b>'.$campo.'</b> solo permite caracteres de tipo '.$tipo.'.';
  return $mensaje;
}

function mensajeFormularioCorrecto($formulario, $sql){
  $CI = & get_instance();
  $mensaje = 'Los Datos del formulario <b>'.$formulario.'</b> fueron <b>'.$sql.'</b> Correctamente.';
  return $mensaje;
}

function mensajeFormularioError($sql){
  $CI = & get_instance();
  $mensaje = 'Error al <b>'.$sql.'</b> Datos.';
  return $mensaje;
}
//---------------------FUNCIONES INDIVIDUALES NULL (CAMPOS NO REQUERIDOS)-------------------------------

// Función Validar Campos en Blancos... 
function validarRequerido($valor,&$error, $campo) {

  $CI = & get_instance();

  if(trim($valor) == ""):

      $error = mensajeRequerido($campo);
      return false;

  else:

      return true;

  endif;

}

// Función Validar esapcios Blancos... 
function validarEspacio($valor,&$error, $campo) {

  $CI = & get_instance();

  if (preg_match('`[ ]`',$valor)):

      $error = mensajeEspacio($campo);
      return false;

  else:

       return true;

  endif;

}     
  
// Función opciones INT...
function opcionesInt($min, $max) {

  $CI = & get_instance();

    $opcionesInt = array('options' => array('min_range' => $min, 'max_range' => $max));
    return $opcionesInt;

} 

// Función Validar numero entero no requerido...
function validarNullEntero($valor, $opcionesInt=null,&$error, $campo) {
  
  $CI = & get_instance();
    
  if(trim($valor) == ""):
      
      return true;
  
  else:

      if(filter_var($valor, FILTER_VALIDATE_INT, $opcionesInt) === FALSE):
          
          $error = mensajeCampo($campo);
          return false;

      else:
            
            return true;

      endif;

  endif;

}  

 //Funcion Validar id puede estar nulo.......... 
function validarNullInt($valor,&$error, $campo) {

  $CI = & get_instance();
  
  if(trim($valor) == ""):
      
      return true;
  
  else:
      
      if(filter_var($valor, FILTER_VALIDATE_INT) === FALSE):
              
          $error = mensajeCampo($campo);
          return false;

      else:
           
           return true;

      endif;

  endif;

}

// Función Validar email no requerido....
function validarNullEmail($valor,&$error, $campo) {
  
  $CI = & get_instance();
  
  if(trim($valor) == ""):

      return true;

  else:
      
      if (!validarPermitidosEmail($valor, $error, $campo)):
            
            $error = $error;
            return false;

      else:

          if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE):
              
              $error = mensajeCampo($campo);
              return false;

          else:

                return true;

          endif;   

      endif;

  endif;

} 
 
// Función Validar Caracteres Permitidos solo letras...
function validarSoloLetras($valor,&$error, $campo){
    
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $permitidos = '/[a-z A-ZñÑáéíóúÁÉÍÓÚ]{0,100}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

          return true;

      endif;
      
  endif;

}    

// Función Validar Caracteres Permitidos solo numeros...
function validarSoloNumerosInt($valor,&$error, $campo){
    
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $permitidos = '/^[0-9]{0,100}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

          return true;

      endif;
      
  endif;

}  

// Función Validar Caracteres Permitidos solo numeros...
function validarSoloNumerosDecimales($valor,&$error, $campo){
    
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      if (!preg_match('`[0-9]`',$valor)):
        
        $error = "La clave debe tener al menos un caracter numérico";
      
        return false; 

      else:  

          $permitidos = '/^[0-9.,]{0,100}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

          if (!preg_match($permitidos,$valor)):

            $error = mensajeCaracteresEspeciales($campo);
            return false;

          else:

            return true;

          endif;
      
      endif;      

  endif;

}  

// Función Validar Caracteres Permitidos solo letras permite espacios en blanco...
function validarSoloLetrasEspacio($valor,&$error, $campo){
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $permitidos = '/^[a-z A-ZñÑáéíóúÁÉÍÓÚ]{0,100}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

          return true;

      endif;

  endif;

}   

// Función Validar Caracteres Permitidos solo letras permite espacios en blanco...
function validarSoloLetrasEspacioP($valor,&$error, $campo){
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $permitidos = '/^[a-z A-ZñÑáéíóúÁÉÍÓÚ.]{0,100}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

          return true;

      endif;

  endif;

}       

// Función Validar Caracteres Permitidos Email...
function validarPermitidosEmail($valor,&$error, $campo){
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $permitidos = '/^[a-z A-Z 0-9@_.-]{0,50}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

          return true;

      endif;

  endif;

} 

// Función Validar Caracteres Permitidos Todos
function validarPermitidosTodos($valor,&$error, $campo){
  $CI = & get_instance();

  if(trim($valor) == ""):

          return true;

  else:

      $permitidos = '/^[a-z A-ZñÑáéíóúÁÉÍÓÚ 0-9-_@.°]{0,500}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

          return true;

      endif;

  endif;

} 
// Función Validar Caracteres Permitidos Email...
function validarPermitidosEsp($valor,&$error, $campo) {
  
  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $permitidos = '/^[a-z A-ZñÑáéíóúÁÉÍÓÚ 0-9 @_.-]{0,100}$/i';  //'/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,25}$/i'

      if (!preg_match($permitidos,$valor)):

          $error = mensajeCaracteresEspeciales($campo);
          return false;

      else:

           return true;

      endif;

  endif;

} 

// Función Validar Numero de Caracteres menor y mayor a...
function validarCantidadDeCaracteres($valor, $mayor, $menor, &$error, $campo) {
  
  $CI = & get_instance();
   
  if(trim($valor) == ""):
      
      return true;

  else:
      //compruebo que el tamaño del string sea válido.
      if ((strlen($valor) < $mayor) || (strlen($valor) > $menor)):

          $error = 'El campo <b>'.$campo.'</b> debe poseer un minimo de: <b>'.$mayor.'</b> caracteres.';
          return false;

      else:

           return true; 

      endif;

  endif;

} 

//Función Validar Numero de Caracteres mayores a...
function validarNumeroDeCaracteresm($valor, $mayor ,&$error, $campo) {
   //compruebo que el tamaño del string sea válido.
  $CI = & get_instance();

  if (strlen($valor) < $mayor):
      
       $error = 'El numero de caracteres del campo <b>'.$campo.'</b> deben ser Mayores a: <b>'.$mayor.'</b>';
       return false;
  
  else:
       
       return true; 

  endif;

} 

//------------------------Funciones de Validacion Variadas------------------------------
// Función Validar numero Telefono requerido... 0000-0000000
function validarTelefono($valor, &$error, $campo) {

  $CI = & get_instance();

  if (!validarRequerido($valor, $error, $campo)):

      $error = $error;
      return false;

  else:

      $pattern = '/^([0-9]{4})(-)([0-9]{7})$/';

      if(!preg_match($pattern, $valor)):

          $error = mensajeValorCampoB($valor, $campo);

          return false;

      else:

          return true;

     endif;

  endif;

}

// Función Validar numero Telefono no requerido... 0000-0000000
function validarFax($valor, &$error, $campo) {

  $CI = & get_instance();

  if(trim($valor) == ""):

      return true;

  else:

      $pattern = '/^([0-9]{4})(-)([0-9]{7})$/';

      if(!preg_match($pattern, $valor)):

          $error = mensajeValorCampoB($valor, $campo);

          return false;

      else:

          return true;

     endif;

  endif;   

}

// Función Validar numero entero requerido...
function validarEntero($valor, $opcionesInt=null,&$error, $campo) {
  
  $CI = & get_instance();
  
  if (!validarRequerido($valor, $error, $campo)):
      
      $error = $error;
      return false;
  
  else:
      
      if(filter_var($valor, FILTER_VALIDATE_INT, $opcionesInt) === FALSE):
          
           $error = mensajeValorCampoA($valor, $campo);
           return false;
      
      else:

           return true;

      endif;

  endif;

}

 // Función Validar ID entero requerido...
function validarInt($valor, $mayor, $menor, &$error, $campo) {

  $CI = & get_instance();

  if (!validarRequerido($valor, $error, $campo)):

       $error = $error;
       return false;

  else:
          
      if(!validarSoloNumerosInt($valor, $error, $campo)):
           
          $error = mensajeValorCampo($valor, $campo);
          return false;

      else:

          if (!validarCantidadDeCaracteres($valor, $mayor, $menor, $error, $campo)):

              $error = $error;
              return false;

          else:

              return true;

          endif;

      endif;

  endif;

}

// Función Validar campo requerido y email....
function validarEmail($valor,&$error, $campo) {
 
  $CI = & get_instance();
  
  if (!validarRequerido($valor, $error, $campo)):
         
         $error = $error;       
         return false;

  else:
      
      if (!validarPermitidosEmail($valor, $error, $campo)):
            
            $error = $error;
            return false;

      else:

          if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE):
              
              $error = mensajeCampo($campo);
              return false;

          else:

                return true;

          endif;   

      endif;

  endif;

}  

// Función Validar nombre....
function validarNombre($valor,&$error, $campo) {
 
  $CI = & get_instance();
  
  if (!validarRequerido($valor, $error, $campo)):
         return false;
  else:
      
      if (!validarEspacio($valor, $error, $campo)):
              
          $error = $error;
          return false;

      else:
          
          if (!validarSoloLetras($valor, $error, $campo)):
                    
               $error = $error;
               return false;

          else:
              
              return true;
              
          endif;

      endif;

  endif;  

}    

// Función Validar Caracteres Permitidos solo letras, Requerido, mayoes a 3 menores a 20...
function validarNombres($valor, $mayor, $menor,&$error, $campo) {
  
  $CI = & get_instance();
  
  if (!validarRequerido($valor, $error, $campo)):
      
      $error = $error;
      return false;

  else:
          
      if (!validarEspacio($valor, $error, $campo)):
          
          $error = $error;
          return false;

      else:

          if (!validarSoloLetras($valor, $error, $campo)):
              
                $error = $error;
                return false;

          endif;
          
          if (!validarCantidadDeCaracteres($valor, $mayor, $menor, $error, $campo)):
            
              $error = $error;
              return false;
  
          else:

              return true;

          endif;

      endif;

  endif;

} 

// Función Validar Caracteres Permitidos solo letras, Requerido, mayoes a 3 menores a 20...
function validarNombresEsp($valor, $mayor ,&$error, $campo) {

  $CI = & get_instance();

  if (!validarRequerido($valor, $error, $campo)):

       $error = $error;
       return false;

  else:

      if (!validarSoloLetrasEspacio($valor, $error, $campo)):

          $error = $error;
          return false;
      
      else:
              
          if (!validarNumeroDeCaracteresm($valor, $mayor ,$error, $campo)):

              $error = $error;
              return false;
              
          else:
              
              return true;

          endif;  
               
      endif;

  endif;

} 

// Función Validar Caracteres Permitidos solo letras, Requerido, mayoes a 3 menores a 20 con puntos...
function validarNombresEspP($valor, $mayor ,&$error, $campo) {

  $CI = & get_instance();

  if (!validarRequerido($valor, $error, $campo)):

       $error = $error;
       return false;

  else:

      if (!validarSoloLetrasEspacioP($valor, $error, $campo)):

          $error = $error;
          return false;
      
      else:
              
          if (!validarNumeroDeCaracteresm($valor, $mayor ,$error, $campo)):

              $error = $error;
              return false;
              
          else:
              
              return true;

          endif;  
               
      endif;

  endif;

} 
// Vlidar requerido Login...
function validarRequeridoLogin ( $usuario, $password,&$error ) {

  $CI = & get_instance();
 
  if ( !validarRequerido($usuario, $error, "Usuario")):

      $error = $error;
      return false;

  else:

      if (!validarRequerido($password, $error, "Contraseña")):

          $error = $error;
          return false;

      endif;

  endif;

      return true;

}

// Vlidar requerido Login...
function validarUsuario($valor, $mayor, $menor, &$error, $campo) {

  $CI = & get_instance();

  if(!validarRequerido($valor, $error, $campo)):

       $error = $error;
       return false;

  else:

      if(!validarPermitidosEmail($valor, $error, $campo)):

          $error = $error;
          return false;

      else:
          
          if (!validarCantidadDeCaracteres($valor, $mayor, $menor,$error, $campo)):

              $error = $error;
              return false;

          endif;    

      endif;

  endif;

  return true;

}

 // Función Validar ID entero requerido...
function validarID($valor, &$error, $campo) {

  $CI = & get_instance();

  if (!validarRequerido($valor, $error, $campo)):

       $error = $error;
       return false;

  else:
          
      $permitidos = '/^[0-9]{0,100}$/i';

      if(!preg_match($permitidos, $valor)):

          $error = mensajeValorCampoB($valor, $campo);
          return false;

      else:

           return true;

      endif;

  endif;

 }

//--------------------------FUNCIONES DE SEGURIDAD---------------------------------
// Función Validar $_POST $_GET Seguridad...
function validarEntrada($valor) {

  $CI = & get_instance();

    $valor = trim($valor);
    $valor = stripslashes(strip_tags($valor));
    $valor = htmlspecialchars($valor);
    
    if (!is_numeric($valor)):

      $valor = strtoupper($valor);
      $valor = str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $valor);

    endif;

  return $valor;

}

// Función Validar monto...
function convertirMonto($valor) {

  $CI = & get_instance();

      $valor = str_replace(array(".",","), array("","."), $valor);

  return $valor;

}


function revertirMonto($valor) {

  $CI = & get_instance();

      $valor = str_replace(array(""), array(""), $valor);

  return $valor;

}

//contador
function contador() {

  $CI = & get_instance();

  $intentos = array('contador' => $CI->session->userdata('contador')+1);

  $CI->session->set_userdata($intentos);

}

function formatoFecha($fecha) {

  $CI = & get_instance();

  return date("d-m-Y",strtotime($fecha));

}


/* End of file validaciones_helper.php */
/* Location: ./application/helpers/validaciones_helper.php */
