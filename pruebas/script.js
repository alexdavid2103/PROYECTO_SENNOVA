const recuperarDatos = async () => {
  const res = await fetch("?controller=motor&action=graficas");
  const respuesta = await res.json();
  console.log(respuesta);
  return respuesta;
};

recuperarDatos();
