
const cargarMarcas = async()=>{
    //1. Ir a buscar las marcas a la api
    let resultado = await axios.get("api/marcas/get");
    let marcas = resultado.data;
    //2. Cargar las marcas dentro del select
    let marcaSelect = document.querySelector("#marca-select");
    marcas.forEach(m=>{
        let option = document.createElement("option");
        option.innerText = m;
        marcaSelect.appendChild(option);
    });

};
//Esto ejecuta un codigo asegurandose que el total de la pagina
//incluidos todos sus recursos esten cargados antes de ejecutar.
//(Esto mejora la usabilidad el atributo de calidad de la funcion)
document.addEventListener("DOMContentLoaded", ()=>{
    cargarMarcas();
});

document.querySelector("#registrar-btn").addEventListener("click", async ()=>{
    let nombre = document.querySelector("#nombre-txt").value;
    let marca = document.querySelector("#marca-select").value;
    let anio = document.querySelector("#anio-txt").value;

    let consola = { nombre, marca, anio };
    // let consola = {};
    // consola.nombre = nombre;
    // consola.marca = marca;
    // consola.anio = anio;

    //TODO: Falta validar!!!
    //Solo esta linea hace:
    //1. Va al controlador, le pasa los datos
    //2. El controlador crea el modelo
    //3. El modelo ingresa en la base de datos
    //4. Todos felices
    let res = await crearConsola(consola);
    await Swal.fire("Consola Creada", "Consola creada exitosamente", "info");
    //La linea que viene despues del Swal.fire se va a ejecutar solo cuando la persona presione OK

    //Aqui a redirigir a otra pagina
    window.location.href = "ver_consolas";
    //Abrir nueva pestaña
    //window.open("www.google.cl","_blank");
});
