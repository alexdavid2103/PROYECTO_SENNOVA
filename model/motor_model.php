<?php
class motor_model
{
    // Función para agregar información de un motor a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para insertar datos en la tabla motor_informacion
        $sql = "INSERT INTO motor_informacion (
                                        infmot_serie, 
                                        infmot_norma,
                                        infmot_polos,
                                        infmot_potencia,
                                        infmot_IpIn,
                                        infmot_par_arranque,
                                        infmot_par_maxima,
                                        infmot_mom_inercia,
                                        infmot_tiempo_rotor_bloq,
                                        infmot_peso,
                                        infmot_niv_ruido,
                                        infmot_factor_servicio,
                                        infmot_rotacion_nominal,
                                        infmot_corriente_nominal,
                                        infmot_altitud,
                                        infmot_regimen,
                                        infmot_temp_ambiente,
                                        infmot_proteccion,
                                        infmot_carcasaFK,
                                        infmot_eficienciaFK,
                                        infmot_fac_potenciaFK,
                                        infmot_clienteFK,
                                        infmot_tecnicoFK)
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $st = $c->prepare($sql);

        $v = array(
            $data["serie"],             // Valor para infmot_serie
            $data["norma"],             // Valor para infmot_norma
            $data["polos"],             // Valor para infmot_polos
            $data["potencia"],          // Valor para infmot_potencia
            $data["IpIn"],              // Valor para infmot_Ip/In
            $data["par_arranque"],      // Valor para infmot_par_arranque
            $data["par_maxima"],        // Valor para infmot_par_maxima
            $data["mom_inercia"],       // Valor para infmot_mom_inercia
            $data["tiempo_rotor_bloq"], // Valor para infmot_tiempo_rotor_bloq
            $data["peso"],              // Valor para infmot_peso
            $data["niv_ruido"],         // Valor para infmot_niv_ruido
            $data["factor_servicio"],   // Valor para infmot_factor_servicio
            $data["rotacion_nominal"],  // Valor para infmot_rotacion_nominal
            $data["corriente_nominal"], // Valor para infmot_corriente_nominal
            $data["altitud"],           // Valor para infmot_altitud
            $data["regimen"],           // Valor para infmot_regimen
            $data["temp_ambiente"],     // Valor para infmot_temp_ambiente
            $data["proteccion"],        // Valor para infmot_proteccion
            $data["carcasaFK"],         // Valor para infmot_carcasaFK
            $data["eficienciaFK"],      // Valor para infmot_eficienciaFK
            $data["fac_potenciaFK"],    // Valor para infmot_fac_potenciaFK
            $data["clienteFK"],         // Valor para infmot_clienteFK
            $data["tecnicoFK"]          // Valor para infmot_tecnicoFK
        );
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar la información de un motor en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para actualizar datos en la tabla motor_informacion
        $sql = "UPDATE motor_informacion SET 
                                    infmot_norma = ?, 
                                    infmot_frecuencia = ?,
                                    infmot_vol_nominal = ?,
                                    infmot_polos = ?,
                                    infmot_potencia = ?,
                                    infmot_IpIn = ?,
                                    infmot_par_arranque = ?,
                                    infmot_par_maxima = ?,
                                    infmot_mom_inercia = ?,
                                    infmot_tiempo_rotor_bloq = ?,
                                    infmot_peso = ?,
                                    infmot_niv_ruido = ?,
                                    infmot_factor_servicio = ?,
                                    infmot_rotacion_nominal = ?,
                                    infmot_corriente_nominal = ?,
                                    infmot_altitud = ?,
                                    infmot_regimen = ?,
                                    infmot_temp_ambiente = ?,
                                    infmot_proteccion = ?,
                                    infmot_carcasaFK = ?,
                                    infmot_eficienciaFK = ?,
                                    infmot_fac_potenciaFK = ?,
                                    infmot_clienteFK = ?,
                                    infmot_tecnicoFK = ?,
                                    infmot_estadoFK = ?
                                    WHERE infmot_serie = ?";

        $st = $c->prepare($sql);
        $v = array(
            $data["norma"],         // Nuevo valor para infmot_norma
            $data["frecuencia"],    // Nuevo valor para infmot_frecuencia
            $data["vol_nominal"],   // Nuevo valor para infmot_vol_nominal
            $data["polos"],         // Nuevo valor para infmot_polos
            $data["potencia"],      // Nuevo valor para infmot_potencia
            $data["Ip/In"],         // Nuevo valor para infmot_Ip/In
            $data["par_arranque"],  // Nuevo valor para infmot_par_arranque
            $data["par_maxima"],    // Nuevo valor para infmot_par_maxima
            $data["mom_inercia"],   // Nuevo valor para infmot_mom_inercia
            $data["tiempo_rotor_bloq"], // Nuevo valor para infmot_tiempo_rotor_bloq
            $data["peso"],          // Nuevo valor para infmot_peso
            $data["niv_ruido"],     // Nuevo valor para infmot_niv_ruido
            $data["factor_servicio"], // Nuevo valor para infmot_factor_servicio
            $data["rotacion_nominal"], // Nuevo valor para infmot_rotacion_nominal
            $data["corriente_nominal"], // Nuevo valor para infmot_corriente_nominal
            $data["altitud"],       // Nuevo valor para infmot_altitud
            $data["regimen"],       // Nuevo valor para infmot_regimen
            $data["temp_ambiente"], // Nuevo valor para infmot_temp_ambiente
            $data["proteccion"],    // Nuevo valor para infmot_proteccion
            $data["carcasaFK"],     // Nuevo valor para infmot_carcasaFK
            $data["eficienciaFK"],  // Nuevo valor para infmot_eficienciaFK
            $data["fac_potenciaFK"], // Nuevo valor para infmot_fac_potenciaFK
            $data["clienteFK"],     // Nuevo valor para infmot_clienteFK
            $data["tecnicoFK"],     // Nuevo valor para infmot_tecnicoFK
            $data["estadoFK"],      // Nuevo valor para infmot_estadoFK
            $data["serie"]          // Valor para ubicar el registro a actualizar (infmot_serie)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar información de un motor de la base de datos
    public static function delete($serie)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para eliminar un registro de la tabla motor_informacion
        $sql = "DELETE FROM motor_informacion WHERE infmot_serie = ?";
        $st = $c->prepare($sql);
        $v = array($serie); // Valor para ubicar el registro a eliminar (infmot_serie)
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para obtener una lista de todos los registros de motores
    public static function listarMotorInfo()
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_informacion";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    
    // Función para obtener una lista de todos los registros de motores
    public static function listarMotorEstado()
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM estado";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    // Función para obtener una lista de todos los registros de motores
    public static function listarMotorUbicacion()
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_ubicacion";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para obtener información de un motor por su serie
    public static function findBySerie($serie)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar un registro de la tabla motor_informacion por su serie
        $sql = "SELECT * FROM motor_informacion WHERE infmot_serie = ?";
        $st = $c->prepare($sql);
        $v = array($serie); // Valor para infmot_serie
        $st->execute($v);
        return $st->fetch(); // Retornar el primer registro encontrado como un arreglo asociativo
    }
}
?>
