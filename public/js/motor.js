let motors = document.querySelector(".motors");

let cont_form_add_motor = document.querySelector(".cont_form_add_motor");
let btn_back_add_motor = document.querySelector(".btn_back_add_motor");

let cont_form_edit_motor = document.querySelector(".cont_form_edit_motor");
let edit_motor = document.querySelectorAll(".edit_motor");
let btn_back_edit_motor = document.querySelector(".btn_back_edit_motor");

edit_motor.forEach((motor) => {
  motor.addEventListener("click", () => {
    motors.style.display = "none";
    cont_form_edit_motor.style.display = "grid";

    let serie = motor.getAttribute("data-serie");
    let modelo = motor.getAttribute("data-modelo");
    let año = motor.getAttribute("data-año");
    let marca = motor.getAttribute("data-marca");
    let voltaje = motor.getAttribute("data-voltaje");
    let posicion = motor.getAttribute("data-posicion");
    let humedad = motor.getAttribute("data-humedad");
    let descripcion = motor.getAttribute("data-descripcion");
    let tipo_base = motor.getAttribute("data-tipo_base");
    let temperatura = motor.getAttribute("data-temperatura");
    let ventilacion = motor.getAttribute("data-ventilacion");
    let cliente_id = motor.getAttribute("data-cliente-id");
    let cliente_nom = motor.getAttribute("data-cliente-nom");
    let tecnico_id = motor.getAttribute("data-tecnico-id");
    let tecnico_nom = motor.getAttribute("data-tecnico-nom");

    document.getElementById("edit_motor_cliente").options[0].value = cliente_id;
    document.getElementById("edit_motor_cliente").options[0].innerHTML =
      cliente_nom;
    document.getElementById("edit_motor_serie").value = serie;
    document.getElementById("edit_motor_modelo").value = modelo;
    document.getElementById("edit_motor_año").value = año;
    document.getElementById("edit_motor_marca").value = marca;
    document.getElementById("edit_motor_voltaje").value = voltaje;
    document.getElementById("edit_motor_temperatura").value = temperatura;
    document.getElementById("edit_motor_posicion").options[0].value = posicion;
    document.getElementById("edit_motor_posicion").options[0].innerHTML =
      posicion;
    document.getElementById("edit_motor_humedad").options[0].value = humedad;
    document.getElementById("edit_motor_humedad").options[0].innerHTML =
      humedad;
    document.getElementById("edit_motor_tipo_base").options[0].value =
      tipo_base;
    document.getElementById("edit_motor_tipo_base").options[0].innerHTML =
      tipo_base;
    document.getElementById("edit_motor_ventilacion").options[0].value =
      ventilacion;
    document.getElementById("edit_motor_ventilacion").options[0].innerHTML =
      ventilacion;
  });
});

// btn_back_edit_motor.addEventListener("click", () => {
//   motors.style.display = "grid";
//   cont_form_edit_motor.style.display = "none";
// });
