function validarPaciente(){
    
    var idPaciente;
    var nombrePaciente;
    var apellidoPaciente;
    var DireccionPaciente;
    var telefonoPaciente;
    var correoPaciente;
    var fechaNacimiento;
   

    idPaciente = document.getElementByid('idPaciente').value;
    nombrePaciente = document . getElementById('nombrePaciente').value;
    apellidoPaciente = document . getElementById('apellidoPaciente').value;
    DireccionPaciente=document . getElementById('direccionPaciente').value;
    telefonoPaciente = document . getElementById('telefonoPaciente').value;
    correoPaciente = document . getElementById('correoPaciente').value;
    fechaNacimiento = document . getElementById('fechaNacimiento').value;
    estadopaciente  = document . getElementById('estadoPaciente').value;

    //validar campos vacios
    if(
      idPaciente === "" || nombrePaciente === "" || apellidoPaciente === "" || direccionPaciente ===""
    || telefonoPaciente ==="" || correoPaciente === "" || fechaNacimiento === ""
    ){
     alert("REVISE EL FORMULARIO, NO DEBEN HABER CAMPOS VACIOS!!");
        return false;
    }

        //VALIDACION DE LONGITUD
      if (typeof idPaciente !== 'undefined' && idPaciente !== null) {
    var cantidad = idPaciente.length;
    if (cantidad > 12){
           alert("El Id del Paciente no puede tener mas de 12 numeros");
           return false;
       }
    
    if(telefonoPaciente.length === 12){
        return true;
    }
 }else{
        alert ("Verifique el numero del telefono, debe tener 10 caractares.");
        return false;
    }
    
}
    
