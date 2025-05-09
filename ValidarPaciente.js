function validarPaciente(){
    
    var idPaciente;
    var nombrePaciente;
    var apellidoPaciente;
    var DireccionPaciente;
    var telefonoPaciente;
    var correoPaciente;
    var fechaNacimiento;
   

    idpaciente = document.getElementByid('idPaciente').value;
    nombrePaciente = document . getElementbyid('nombrePaciente').value;
    apellidoPaciente = document . getElementbyid('apellidoPaciente').value;
    DireccionPaciente=document . getElementbyid('direccionPaciente').value;
    telefonoPaciente = document . getElementbyid('telefonoPaciente').value;
    correoPaciente = document . getElementbyid('correoPaciente').value;
    fechaNacimiento = document . getElementbyid('fechaNacimiento').value;
    estadopaciente  = document . getElementbyid('estadoPaciente').value;

    //validar campos vacios
    if(idPaciente === "" || nombrePaciente === "" || apellidoPaciente === "" || direccionPaciente ===""
    || telefonoPaciente ==="" || correoPaciente === "" || fechaNacimiento === "")
    {

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
    
