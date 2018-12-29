<?php
/**
 * Insertar un nuevo alumno en la base de datos
 */

require 'Alumnos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar Alumno
    $retorno = Alumnos::getById(
        $body['idalumno']);


        if ($retorno) 
        {
                $alumno["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
                $alumno["alumno"] = $retorno;
                // Enviar objeto json del alumno
                print json_encode($alumno);
        } 
        else 
        {
        // Enviar respuesta de error general
        print json_encode(
                array(
                'estado' => '2',
                'mensaje' => 'No se obtuvo el registro'
                )
        );
        }    
}

?>