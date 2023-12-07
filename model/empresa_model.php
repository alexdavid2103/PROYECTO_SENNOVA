<?php
class empresa_model {
    // Función para agregar información de una empresas a la base de datos
    public static function add($data) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para insertar datos en la tabla empresas, incluyendo la contraseña encriptada
        $sql = "INSERT INTO empresas (
                            emp_id,
                            emp_nombre,
                            emp_correo,
                            emp_telefono,
                            emp_direccion,
                            emp_municipioFK,
                            emp_contrasena) 
                            VALUES (?,?,?,?,?,?,?)";

        $st = $c->prepare($sql);

        $v = array(
            // Valor para emp_id
            $data["id"],
            // Valor para emp_nombre
            $data["nombre"],
            // Valor para emp_correo
            $data["correo"],
            // Valor para emp_telefono
            $data["telefono"],
            // Valor para emp_direccion
            $data["direccion"],
            // Valor para emp_municipio
            $data["municipio"],
            // Encriptar la contraseña con Argon2
            password_hash($data["id"], PASSWORD_ARGON2I)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar la información de una empresas en la base de datos
    public static function edit($data) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para actualizar datos en la tabla empresa
        $sql = "UPDATE empresas SET 
                                    emp_nombre = ?,
                                    emp_correo = ?,
                                    emp_telefono = ?,
                                    emp_direccion = ?,
                                    emp_municipioFK = ?
                                    WHERE emp_id = ?";

        $st = $c->prepare($sql);
        $v = [
            // Valor para emp_nombre
            $data["nombre"],
            // Valor para emp_correo
            $data["correo"],
            // Valor para emp_telefono
            $data["telefono"],
            // Valor para emp_direccion
            $data["direccion"],
            // Valor para emp_municipio
            $data["municipio"],
            // Valor pasa emp_id
            $data["id"]
        ];

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar información de una empresas de la base de datos
    public static function delete($id) {
        $obj = new connection();
        $c = $obj->getConnection();

        try {
            $c->beginTransaction();

            // Eliminar registros de la tabla motor_ubicacion relacionados con la empresa
            $sqlDeleteUbicaciones = "DELETE FROM motor_ubicacion WHERE ubimot_empresaFK = :id";
            $stDeleteUbicaciones = $c->prepare($sqlDeleteUbicaciones);
            $stDeleteUbicaciones->bindParam(':id', $id, PDO::PARAM_INT);
            $stDeleteUbicaciones->execute();

            // Eliminar el registro de la tabla empresas
            $sqlDeleteEmpresa = "DELETE FROM empresas WHERE emp_id = :id";
            $stDeleteEmpresa = $c->prepare($sqlDeleteEmpresa);
            $stDeleteEmpresa->bindParam(':id', $id, PDO::PARAM_INT);
            $successDeleteEmpresa = $stDeleteEmpresa->execute();

            if($successDeleteEmpresa) {
                $c->commit();
                return true;
            } else {
                $c->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            $c->rollBack();
            // Manejar cualquier excepción que pueda ocurrir
            // Por ejemplo, podrías imprimir el mensaje de error para depurar
            echo "Error: ".$e->getMessage();
            return false; // Retorna falso para indicar un error
        }
    }


    // Función para obtener una lista de todos los registros de empresas
    public static function listarEmpresas() {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla empresa
        $sql = "SELECT * FROM empresas";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para obtener información de una empresas por su ID
    public static function findById($id) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar un registro de la tabla empresas por su emp_id
        $sql = "SELECT * FROM empresas WHERE emp_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para emp_id
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para validar las credenciales de una empresa
    public static function validar($data) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para verificar si existen las credenciales en la tabla empresas
        $sql = "SELECT * FROM empresas WHERE emp_id = ? LIMIT 1";
        $st = $c->prepare($sql);
        $st->execute(array($data["id"]));
        $result = $st->fetch();

        if($result && password_verify($data["password"], $result["emp_contrasena"])) {
            return $result; // Retornar el resultado si las credenciales son válidas
        } else {
            return false; // Retornar falso si las credenciales no son válidas
        }
    }


    // Función para obtener una lista de todos los registros de departamentos
    public static function listarDepartamentos() {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla departamentos
        $sql = "SELECT * FROM departamentos";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para obtener una lista de todos los registros de municipios
    public static function listarMunicipios($id) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para seleccionar todos los registros de la tabla municipios
        $sql = "SELECT * FROM municipios WHERE mun_departamentoFK = 8";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para agregar información de una empresas a la base de datos
    public static function addUbicacionMotor($data) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Consulta SQL para insertar datos en la tabla motor_ubicacion
        $sql = "INSERT INTO motor_ubicacion (ubimot_area, ubimot_empresaFK) VALUES (?, ?)";

        $st = $c->prepare($sql);

        $v = array(
            $data['ubimot_area'],
            $data['ubimot_empresaFK'],
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    public static function recoverPassword($data) {
        $obj = new connection();
        $c = $obj->getConnection();

        $sqlUpdatePassword = "UPDATE empresas SET emp_contrasena = ? WHERE emp_id = ?";
        $stUpdatePassword = $c->prepare($sqlUpdatePassword);
        $vUpdatePassword = array(
            password_hash($data["password"], PASSWORD_ARGON2I),
            $data["id"]
        );
        $stUpdatePassword->execute($vUpdatePassword);

        $sqlVerifyData = "SELECT emp_nombre, emp_correo FROM empresas WHERE emp_id = ? AND emp_correo = ?";
        $stVerifyData = $c->prepare($sqlVerifyData);
        $vVerifyData = array($data["id"], $data["email"]);
        $stVerifyData->execute($vVerifyData);
        return $stVerifyData->fetch(); // Retorna el nombre y el correo del tecnico
    }

    public static function updatePassword($data) {
        $obj = new connection();
        $c = $obj->getConnection();

        // Obtener la contraseña encriptada almacenada en la base de datos
        $sqlCurrentPassword = "SELECT emp_contrasena FROM empresas WHERE emp_id = ?";
        $stCurrentPassword = $c->prepare($sqlCurrentPassword);
        $stCurrentPassword->execute([$data["id"]]);
        $storedPassword = $stCurrentPassword->fetchColumn();

        // Verificar si la contraseña actual coincide con la contraseña encriptada almacenada
        if(password_verify($data["currentPassword"], $storedPassword)) {
            // Las contraseñas coinciden, proceder con la actualización
            $sqlUpdatePassword = "UPDATE empresas SET emp_contrasena = ? WHERE emp_id = ?";
            $stUpdatePassword = $c->prepare($sqlUpdatePassword);
            $vUpdatePasswored = array(
                password_hash($data["newPassword"], PASSWORD_ARGON2I),
                $data["id"]
            );
            $stUpdatePassword->execute($vUpdatePasswored);

            return true; // Indicar que la contraseña se actualizó correctamente
        } else {
            // Las contraseñas no coinciden
            return false; // Indicar que la actualización no se realizó
        }
    }


}
