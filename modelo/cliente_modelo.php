<?php
class cliente_modelo
{
    // Función para agregar un usuario a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para insertar datos en la tabla clientes
        $sql = "INSERT INTO clientes (
            cli_id,
            cli_nombre1,
            cli_nombre2,
            cli_apellido1,
            cli_apellido2,
            cli_correo,
            cli_telefono,
            cli_direccion,
            cli_contrasena,
            cli_municipioFK)
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
            sha1($data["password"]),
            $data["municipioFK"]
        );

        // Ejecutar la consulta y retornar el resultado
        return $st->execute($v);
    }

    // Función para editar los datos de un usuario en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para actualizar datos en la tabla clientes
        $sql = "UPDATE clientes SET
            cli_nombre1 = ?,
            cli_nombre2 = ?,
            cli_apellido1 = ?,
            cli_apellido2 = ?,
            cli_correo = ?,
            cli_telefono = ?,
            cli_direccion = ?,
            cli_contrasena = ?,
            cli_municipioFK = ?,
            cli_estadoFK = ?
            WHERE cli_id = ?";

        $st = $c->prepare($sql);
        $v = array(
            $data["nombre1"],
            $data["nombre2"],
            $data["apellido1"],
            $data["apellido2"],
            $data["correo"],
            $data["telefono"],
            $data["direccion"],
            sha1($data["password"]),
            $data["municipioFK"],
            $data["estadoFK"],
            $data["id"]
        );

        // Ejecutar la consulta y retornar el resultado
        return $st->execute($v);
    }

    // Función para eliminar un usuario de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para eliminar un registro de la tabla clientes
        $sql = "DELETE FROM clientes WHERE cli_id = ?";
        $st = $c->prepare($sql);
        $v = array($id);

        // Ejecutar la consulta y retornar el resultado
        return $st->execute($v);
    }

    // Función para validar las credenciales de un usuario
    public static function validar($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para verificar si existen las credenciales en la tabla clientes
        $sql = "SELECT * FROM clientes WHERE cli_id = ? AND cli_contrasena = ?";
        $st = $c->prepare($sql);
        $v = array($data["id"], sha1($data["password"]));

        // Ejecutar la consulta
        $st->execute();

        // Retornar el primer resultado de la consulta
        return $st->fetch();
    }

    // Función para obtener una lista de todos los usuarios
    public static function listar()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla clientes
        $sql = "SELECT * FROM clientes";
        $st = $c->prepare($sql);

        // Ejecutar la consulta
        $st->execute();

        // Retornar todos los registros como un arreglo
        return $st->fetchAll();
    }
}
