<?php
class empresa_model
{
    // Función para agregar información de una empresas a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para insertar datos en la tabla empresas, incluyendo la contraseña encriptada
        $sql = "INSERT INTO empresas (
                            emp_id,
                            emp_nombre,
                            emp_correo,
                            emp_telefono,
                            emp_direccion,
                            emp_municipio,
                            emp_contrasena) 
                            VALUES (?,?,?,?,?,?,?)";

        $st = $c->prepare($sql);

        $v = array(
            $data["id"],             // Valor para emp_id
            $data["nombre"],         // Valor para emp_nombre
            $data["correo"],         // Valor para emp_correo
            $data["telefono"],       // Valor para emp_telefono
            $data["direccion"],      // Valor para emp_direccion
            $data["municipio"],      // Valor para emp_municipio
            password_hash($data["id"], PASSWORD_ARGON2I) // Encriptar la contraseña con Argon2
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar la información de una empresas en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para actualizar datos en la tabla empresa
        $sql = "UPDATE empresas SET 
                                    emp_nombre = ?,
                                    emp_telefono = ?,
                                    emp_ceo = ?
                                    WHERE emp_id = ?";

        $st = $c->prepare($sql);
        $v = array(
            // Valor para emp_id (ubicar el registro a actualizar)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar información de una empresas de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para eliminar un registro de la tabla empresa
        $sql = "DELETE FROM empresas WHERE emp_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para emp_id (ubicar el registro a eliminar)
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para obtener una lista de todos los registros de empresas
    public static function listarEmpresas()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla empresa
        $sql = "SELECT * FROM empresas";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para obtener información de una empresas por su ID
    public static function findById($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar un registro de la tabla empresas por su emp_id
        $sql = "SELECT * FROM empresas WHERE emp_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para emp_id
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para validar las credenciales de una empresa
    public static function validar($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para verificar si existen las credenciales en la tabla tecnico
        $sql = "SELECT * FROM empresas WHERE emp_id = ? AND emp_contrasena = ?";
        $st = $c->prepare($sql);
        $v = array($data["id"], sha1($data["password"])); // Valores para tec_id y tec_contraseña
        $st->execute($v);
        return $st->fetch(); // Retornar el primer resultado de la consulta
    }

    // Función para obtener una lista de todos los registros de departamentos
    public static function listarDepartamentos()
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla departamentos
        $sql = "SELECT * FROM departamentos";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para obtener una lista de todos los registros de municipios
    public static function listarMunicipios($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla municipios
        $sql = "SELECT * FROM municipios WHERE mun_departamentoFK = $id";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }
}
