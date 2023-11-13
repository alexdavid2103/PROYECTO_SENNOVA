<?php
class tecnico_model
{
    // Función para agregar un técnico a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para insertar datos en la tabla tecnico
        $sql = "INSERT INTO tecnicos (
                                    tec_id, 
                                    tec_nombre1,
                                    tec_nombre2, 
                                    tec_apellido1,
                                    tec_apellido2, 
                                    tec_correo, 
                                    tec_telefono, 
                                    tec_contrasena, 
                                    tec_empresaFK)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $st = $c->prepare($sql);

        $v = array(
            $data["id"],
            $data["nombre1"],
            $data["nombre2"],
            $data["apellido1"],
            $data["apellido2"],
            $data["correo"],
            $data["telefono"],
            password_hash($data["id"], PASSWORD_ARGON2I),
            $data["empresa"],
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar los datos de un técnico en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para actualizar datos en la tabla tecnico
        $sql = "UPDATE tecnicos SET
                                    tec_nombre1 = ?,
                                    tec_nombre2 = ?,
                                    tec_apellido1 = ?,
                                    tec_apellido2 = ?,
                                    tec_correo = ?,
                                    tec_telefono = ?
                                    WHERE tec_id = ?";

        $st = $c->prepare($sql);
        $v = array(
            $data["nombre1"],
            $data["nombre2"],
            $data["apellido1"],
            $data["apellido2"],
            $data["correo"],
            $data["telefono"],
            $data["id"],
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar un tecnico de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        $c->exec("SET foreign_key_checks = 0");

        try {
            $sqlUpdateMotor = "UPDATE motor_informacion SET infmot_tecnicoFK = NULL WHERE infmot_tecnicoFK = $id";
            $stUpdateMotor = $c->prepare($sqlUpdateMotor);
            $stUpdateMotor->execute();

            // Consulta SQL para eliminar un registro de la tabla tecnico
            $sqlDeleteTecnico = "DELETE FROM tecnicos WHERE tec_id = $id";
            $stDeleteTecnico = $c->prepare($sqlDeleteTecnico);
            $successDeleteTecnico = $stDeleteTecnico->execute();
            return $successDeleteTecnico;
        } finally {
            $c->exec("SET foreign_key_checks = 1");
        }
    }

    // Función para validar las credenciales de un técnico
    public static function validar($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para verificar si existen las credenciales en la tabla empresas
        $sql = "SELECT * FROM tecnicos WHERE tec_id = ? LIMIT 1";
        $st = $c->prepare($sql);
        $st->execute(array($data["id"]));
        $result = $st->fetch();

        if ($result && password_verify($data["password"], $result["tec_contrasena"])) {
            return $result; // Retornar el resultado si las credenciales son válidas
        } else {
            return false; // Retornar falso si las credenciales no son válidas
        }
    }

    // Función para obtener una lista de todos los técnicos
    public static function listarTecnicos()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla tecnico
        $sql = "SELECT * FROM tecnicos ";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
    public static function getTecnicoById($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla tecnico
        $sql = "SELECT * FROM tecnicos WHERE tec_empresaFK = $id";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // recuperar contraseña
    public static function recoverPassword($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        $sqlUpdatePassword = "UPDATE tecnicos SET tec_contrasena = ? WHERE tec_id = ?";
        $stUpdatePassword = $c->prepare($sqlUpdatePassword);
        $vUpdatePassword = array(
            password_hash($data["password"], PASSWORD_ARGON2I),
            $data["id"]
        );
        $stUpdatePassword->execute($vUpdatePassword);

        $sqlVerifyData = "SELECT tec_nombre1, tec_correo FROM tecnicos WHERE tec_id = ? AND tec_correo = ?";
        $stVerifyData = $c->prepare($sqlVerifyData);
        $vVerifyData = array($data["id"], $data["email"]);
        $stVerifyData->execute($vVerifyData);
        return $stVerifyData->fetch(); // Retorna el nombre y el correo del tecnico
    }
}
