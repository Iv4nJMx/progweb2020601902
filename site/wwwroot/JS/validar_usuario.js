document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.querySelector("form");

    formulario.addEventListener("submit", function (e) {
        const nombre = formulario.nombre.value.trim();
        const ape_paterno = formulario.ape_paterno.value.trim();
        const ape_materno = formulario.ape_materno.value.trim();
        const tel_personal = formulario.tel_personal.value.trim();
        const tel_casa = formulario.tel_casa.value.trim();
        const usuario = formulario.usuario.value.trim();
        const contrasena = formulario.contrasena.value.trim();
        const rol = formulario.rol.value;

        let errores = [];

        const soloLetras = /^[a-zA-ZÁÉÍÓÚáéíóúñÑ\s]+$/;
        const soloNumeros = /^\d{10}$/;

        // Validaciones de campos obligatorios
        if (nombre === "") errores.push("El nombre es obligatorio.");
        else if (!soloLetras.test(nombre)) errores.push("El nombre solo debe contener letras y espacios.");

        if (ape_paterno === "") errores.push("El apellido paterno es obligatorio.");
        else if (!soloLetras.test(ape_paterno)) errores.push("El apellido paterno solo debe contener letras y espacios.");

        if (ape_materno === "") errores.push("El apellido materno es obligatorio.");
        else if (!soloLetras.test(ape_materno)) errores.push("El apellido materno solo debe contener letras y espacios.");

        // Teléfonos
        if (!soloNumeros.test(tel_personal)) {
            errores.push("El teléfono personal debe tener exactamente 10 dígitos.");
        }

        if (tel_casa !== "" && !soloNumeros.test(tel_casa)) {
            errores.push("El teléfono de casa debe tener exactamente 10 dígitos si se proporciona.");
        }

        // Usuario y contraseña
        if (usuario.length < 4) errores.push("El usuario debe tener al menos 4 caracteres.");
        if (contrasena.length < 6) errores.push("La contraseña debe tener al menos 6 caracteres.");

        // Rol
        if (rol === "") errores.push("Debes seleccionar un rol.");

        // Mostrar errores
        if (errores.length > 0) {
            e.preventDefault();
            alert(errores.join("\n"));
        }
    });
});

/*Confrimación de contraseña*/
document.getElementById('registroForm').addEventListener('submit', function(e) {
    const pass = document.getElementById('contrasena').value;
    const confirm = document.getElementById('confirmar_contrasena').value;
    const errorMsg = document.getElementById('mensajeError');

    if (pass !== confirm) {
        e.preventDefault();
        errorMsg.style.display = 'block';
    } else {
        errorMsg.style.display = 'none';
    }
});