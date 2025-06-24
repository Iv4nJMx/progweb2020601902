document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.querySelector("form");

    formulario.addEventListener("submit", function (e) {
        const errores = [];

        const codprod = formulario.codprod.value.trim();
        const codigobarras = formulario.codigo_barras.value.trim();
        const nombreprod = formulario.nombreprod.value.trim();
        const precioc = parseFloat(formulario.precioc.value);
        const preciov = parseFloat(formulario.preciov.value);
        const stock = parseInt(formulario.stock.value);
        const stockmin = formulario.stockmin.value.trim();
        const categoria = formulario.categoria.value;

        const regexCod = /^[A-Za-z0-9\-]+$/;
        const regexBarras = /^\d{8,20}$/;

        if (!regexCod.test(codprod)) errores.push("Codigo de producto inválido.");
        if (!regexBarras.test(codigobarras)) errores.push("Codigo de barras debe tener entre 8 y 20 numeros.");
        if (nombreprod === "") errores.push("El nombre del producto es obligatorio");
        if (isNaN(precioc) || precioc <= 0) errores.push("El precio de compra debe ser mayor a cero.");
        if (isNaN(preciov) || preciov <= 0) errores.push("El precio de venta debe ser mayor a cero.");
        if (isNaN(stock) || stock < 0) errores.push("El stock debe ser cero o mayor.");
        if (categoria === "") errores.push("Se debe seleccionar una categoría.");

        if (errores.length > 0) {
            e.preventDefault();
            alert(errores.join("\n"));
        }
    });
});