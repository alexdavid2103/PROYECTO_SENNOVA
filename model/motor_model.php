<?php
class motor_model
{
    // Función para agregar información de un motor a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para insertar datos en la tabla motor_carcasa
        $sql_motor_carcasa = "INSERT INTO motor_carcasa (carmot_valor, carmot_nombre) VALUES (?, ?)";
        $st_motor_carcasa = $c->prepare($sql_motor_carcasa);
        $v_motor_carcasa = array($data["carcasaValor"], $data["carcasaNombre"]);
        $st_motor_carcasa->execute($v_motor_carcasa);
        $id_motor_carcasa = $c->lastInsertId();

        // Consulta SQL para insertar datos en la tabla motor_eficiencia
        $sql_motor_eficiencia = "INSERT INTO motor_eficiencia (efimot_porcentajeFK, efimot_valor) VALUES (?,?)";
        $st_motor_eficiencia = $c->prepare($sql_motor_eficiencia);
        $v_motor_eficiencia = array($data["eficienciaPorcentaje"], $data["eficienciaValor"]);
        $st_motor_eficiencia->execute($v_motor_eficiencia);
        $id_motor_eficiencia = $c->lastInsertId();

        // Consulta SQL para insertar datos en la tabla motor_factor_potencia
        $sql_motor_factor_potencia = "INSERT INTO motor_factor_potencia (facpotmot_porcentajeFK, facpotmot_valor) VALUES (?,?)";
        $st_motor_factor_potencia = $c->prepare($sql_motor_factor_potencia);
        $v_motor_factor_potencia = array($data["fac_potenciaPorcentaje"], $data["fac_potenciaValor"]);
        $st_motor_factor_potencia->execute($v_motor_factor_potencia);
        $id_motor_factor_potencia = $c->lastInsertId();

        // Consulta SQL para insertar datos en la tabla motor_informacion
        $sql_motor_informacion = "INSERT INTO motor_informacion (
                                        infmot_serie,
                                        infmot_normaFK,
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
                                        infmot_temp_ambiente,
                                        infmot_proteccion,
                                        infmot_carcasaFK,
                                        infmot_eficienciaFK,
                                        infmot_fac_potenciaFK,
                                        infmot_empresaFK,
                                        infmot_tecnicoFK,
                                        infmot_ubicacionFK,
                                        infmot_tipoFK)
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $st_motor_informacion = $c->prepare($sql_motor_informacion);

        $v_motor_informacion = array(
            $data["serie"],
            $data["normaFK"],
            $data["polos"],
            $data["potencia"],
            $data["IpIn"],
            $data["par_arranque"],
            $data["par_maxima"],
            $data["mom_inercia"],
            $data["tiempo_rotor_bloq"],
            $data["peso"],
            $data["niv_ruido"],
            $data["factor_servicio"],
            $data["rotacion_nominal"],
            $data["corriente_nominal"],
            $data["altitud"],
            $data["temp_ambiente"],
            $data["proteccion"],
            $id_motor_carcasa,
            $id_motor_eficiencia,
            $id_motor_factor_potencia,
            $data["empresaFK"],
            $data["tecnicoFK"],
            $data["ubicacionFK"],
            $data["tipoFK"],
        );
        return $st_motor_informacion->execute($v_motor_informacion); // Ejecutar la consulta y retornar el resultado
    }
    // Función para agregar información de un motor a la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        $sql_motor_carcasa = "UPDATE motor_carcasa SET carmot_valor = ?, carmot_nombre = ? WHERE carmot_id = ?";
        $st_motor_carcasa = $c->prepare($sql_motor_carcasa);
        $v_motor_carcasa = array($data["carcasaValor"], $data["carcasaNombre"], $data["carcasaId"]);
        $st_motor_carcasa->execute($v_motor_carcasa);

        // Actualización de datos en la tabla motor_eficiencia
        $sql_motor_eficiencia = "UPDATE motor_eficiencia SET efimot_valor = ?, efimot_porcentajeFK = ? WHERE efimot_id = ?";
        $st_motor_eficiencia = $c->prepare($sql_motor_eficiencia);
        $v_motor_eficiencia = array($data["eficienciaValor"], $data["eficienciaPorcentaje"], $data["eficienciaId"]);
        $st_motor_eficiencia->execute($v_motor_eficiencia);

        // Actualización de datos en la tabla motor_factor_potencia
        $sql_motor_factor_potencia = "UPDATE motor_factor_potencia SET facpotmot_valor = ?, facpotmot_porcentajeFK = ? WHERE facpotmot_id = ?";
        $st_motor_factor_potencia = $c->prepare($sql_motor_factor_potencia);
        $v_motor_factor_potencia = array($data["fac_potenciaValor"], $data["fac_potenciaPorcentaje"], $data["fac_potenciaId"]);
        $st_motor_factor_potencia->execute($v_motor_factor_potencia);

        // Consulta SQL para insertar datos en la tabla motor_informacion
        $sql_motor_informacion = "UPDATE motor_informacion SET
                                        infmot_normaFK = ?,
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
                                        infmot_temp_ambiente = ?,
                                        infmot_proteccion = ?,
                                        infmot_empresaFK = ?,
                                        infmot_tecnicoFK = ?,
                                        infmot_ubicacionFK = ?,
                                        infmot_tipoFK = ?
                                        WHERE infmot_serie = ?";

        $st_motor_informacion = $c->prepare($sql_motor_informacion);

        $v_motor_informacion = array(
            $data["normaFK"],
            $data["polos"],
            $data["potencia"],
            $data["IpIn"],
            $data["par_arranque"],
            $data["par_maxima"],
            $data["mom_inercia"],
            $data["tiempo_rotor_bloq"],
            $data["peso"],
            $data["niv_ruido"],
            $data["factor_servicio"],
            $data["rotacion_nominal"],
            $data["corriente_nominal"],
            $data["altitud"],
            $data["temp_ambiente"],
            $data["proteccion"],
            $data["empresaFK"],
            $data["tecnicoFK"],
            $data["ubicacionFK"],
            $data["tipoFK"],
            $data["serie"],
        );
        return $st_motor_informacion->execute($v_motor_informacion); // Ejecutar la consulta y retornar el resultado
    }



    // Función para eliminar información de un motor de la base de datos
    public static function delete($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para eliminar un registro de la tabla motor_informacion
        $sql = "DELETE FROM motor_informacion WHERE infmot_serie = ?";
        $st = $c->prepare($sql);
        $v = array($data["id"]); // Valor para ubicar el registro a eliminar (infmot_serie)
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
    public static function getUbicacionById($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_ubicacion WHERE ubimot_empresaFK = $id";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    public static function listarMotorCaptura()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_captura";
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
    public static function graficas()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_captura";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    public static function listarPorcentajes()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM porcentaje";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    public static function listarMotorNorma()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_norma";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    public static function listarMotorTipo()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_tipo";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    public static function listarMotorCarcasa()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_carcasa";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    public static function listarMotorEficiencia()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_eficiencia";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    public static function listarMotorFacPotencia()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_factor_potencia";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    public static function getMotorById($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla motor_informacion
        $sql = "SELECT * FROM motor_informacion WHERE infmot_series = $id";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
}
?>