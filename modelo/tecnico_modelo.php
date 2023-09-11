<?php
class tecnico_modelo
{
    // Función para agregar un técnico a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para insertar datos en la tabla tecnico
        $sql = "INSERT INTO tecnico (
                                        tec_id, 
                                        tec_empresa,
                                        tec_contraseña, 
                                        tec_nombre, 
                                        tec_apellido, 
                                        tec_direccion, 
                                        tec_telefono, 
                                        tec_registro)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $st = $c->prepare($sql);
        $v = array(
            $data["id"],                  // Valor para tec_id
            $data["empresa"],             // Valor para tec_empresa
            sha1($data["password"]),      // Valor encriptado para tec_contraseña
            $data["nombre"],              // Valor para tec_nombre
            $data["apellido"],            // Valor para tec_apellido
            $data["direccion"],           // Valor para tec_direccion
            $data["telefono"],            // Valor para tec_telefono
            $data["registro"]             // Valor para tec_registro
        );
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar los datos de un técnico en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para actualizar datos en la tabla tecnico
        $sql = "UPDATE tecnico SET 
                                    tec_empresa = ?,
                                    tec_nombre = ?,
                                    tec_apellido = ?,
                                    tec_direccion = ?,
                                    tec_telefono = ?,
                                    tec_registro = ?
                                    WHERE tec_id = ?";
        
        $st = $c->prepare($sql);
        $v = array(
            $data["empresa"],             // Nuevo valor para tec_empresa
            $data["nombre"],              // Nuevo valor para tec_nombre
            $data["apellido"],            // Nuevo valor para tec_apellido
            $data["direccion"],           // Nuevo valor para tec_direccion
            $data["telefono"],            // Nuevo valor para tec_telefono
            $data["registro"],            // Nuevo valor para tec_registro
            $data["id"]                   // Valor para ubicar el registro a actualizar (tec_id)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar un tecnico de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para eliminar un registro de la tabla tecnico
        $sql = "DELETE FROM tecnico WHERE tec_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para ubicar el registro a eliminar (tec_id)
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para validar las credenciales de un técnico
    public static function validar($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para verificar si existen las credenciales en la tabla tecnico
        $sql = "SELECT * FROM tecnico WHERE tec_id = ? AND tec_contraseña = ?";
        $st = $c->prepare($sql);
        $v = array($data["id"], sha1($data["password"])); // Valores para tec_id y tec_contraseña
        $st->execute($v);
        return $st->fetch(); // Retornar el primer resultado de la consulta
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
?>
