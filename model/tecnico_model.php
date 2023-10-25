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
                                    tec_direccion, 
                                    tec_contrasena, 
                                    tec_empresaFK)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $st = $c->prepare($sql);

        $v = array(
            $data["id"],
            $data["nombre1"],
            $data["nombre2"],
            $data["apellido1"],
            $data["apellido2"],
            $data["correo"],
            $data["telefono"],
            $data["direccion"],
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
                                    tec_empresa = ?,
                                    tec_nombre = ?,
                                    tec_apellido = ?,
                                    tec_direccion = ?,
                                    tec_telefono = ?,
                                    tec_registro = ?
                                    WHERE tec_id = ?";

        $st = $c->prepare($sql);
        $v = array(
            $data["empresa"],
            // Nuevo valor para tec_empresa
            $data["nombre"],
            // Nuevo valor para tec_nombre
            $data["apellido"],
            // Nuevo valor para tec_apellido
            $data["direccion"],
            // Nuevo valor para tec_direccion
            $data["telefono"],
            // Nuevo valor para tec_telefono
            $data["registro"],
            // Nuevo valor para tec_registro
            $data["id"] // Valor para ubicar el registro a actualizar (tec_id)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar un tecnico de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para eliminar un registro de la tabla tecnico
        $sql = "DELETE FROM tecnicos WHERE tec_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para ubicar el registro a eliminar (tec_id)
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
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
}
