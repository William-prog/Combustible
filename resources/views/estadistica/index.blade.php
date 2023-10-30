@extends('layouts.app')

<link href="{{ asset('/css/estadistica.css') }}" rel="stylesheet">
<link href="{{ asset('/css/tablas.css') }}" rel="stylesheet">

@section('content')
    <div class="row text-center">
        <div class="col-12">
            <div class="container">
                <div class="form-group row justify-content-center text-center">
                    <label for="Fecha_Desde_Filtro" class="col-sm-4 col-form-label text-sm-end">Fecha Inicio:</label>
                    <div class="col-sm-2">
                        <input type="date" name="Fecha_Desde_Filtro" id="Fecha_Desde_Filtro" class="form-control"
                            required>
                    </div>
                    <div class="col-sm-2">
                        <label for="Fecha_Hasta_Filtro" class="col-form-label text-end">Fecha Final:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="Fecha_Hasta_Filtro" id="Fecha_Hasta_Filtro" class="form-control"
                            required>
                    </div>
                    <div class="col-sm-2">
                        <button id="filtrarDatos" type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            onclick="filtrarYActualizarGraficas()">Buscar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        function filtrarYActualizarGraficas() {
            var fecha_Desde_Filtro = $('#Fecha_Desde_Filtro').val();
            var fecha_Hasta_Filtro = $('#Fecha_Hasta_Filtro').val();

            // Filtrar datos por fechas
            var datosFiltrados = <?php echo json_encode($consumo); ?>.filter(function(e) {
                return e.fecha >= fecha_Desde_Filtro && e.fecha <= fecha_Hasta_Filtro;
            });

            // Actualizar gráficas con datos filtrados
            actualizarGraficas(datosFiltrados);


        }
    </script>
    </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="mt-4 text-center">
                    <!-- Gráfica 3: Precio del litro por vehículo -->
                    <div class="chart-container">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-4 text-center">
                    <!-- Gráfica 2: Precio del litro por vehículo -->
                    <div class="chart-container">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mt-4 text-center">
                    <br>
                    <table id="tablaConsumo" class="table table-hover custom-table">
                        <thead>
                            <tr class="text-center" style="background-color: #FF771F; color: white;">
                                <th>Descripción</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Combustible</th>
                                <th>Litros</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas de la tabla dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="background-container" style="background-color: #ebebeb;">
        <div class="container mt-4">
            <div class="row">
                <!-- Gráfica -->
                <div class="col-md-5 d-flex justify-content-center align-items-center">
                    <div class=" mt-3 text-center mt-4">
                        <br>
                        <!-- Gráfica 4: Precio del litro por vehículo -->
                        <div class="d-flex justify-content-center">
                            <canvas id="myChart4" class="mx-auto" style="width: 700px; height: 500px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Tabla -->
                <div class="col-md-7">
                    <div class=" mt-3 text-center mt-4">
                        <br>
                        <div class="table-responsive" style="max-width: 700px; margin: 0 auto;">
                            <table id="tablaDatos" class="table table-hover custom-table">
                                <thead>
                                    <tr class="text-center" style="background-color: #FF771F; color: white;">
                                        <th>CC</th>
                                        <th>Departamento</th>
                                        <th>Vales</th>
                                        <th>Litros</th>
                                        <th>Totales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se llenará la tabla con datos dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        function actualizarGraficas(datosFiltrados) {
    // Actualiza el objeto precioTotales con los datos filtrados
    const precioTotales = {};
    datosFiltrados.forEach(item => {
        const descripcion = item.descripcion;
        const total = parseFloat(item.total);

        if (precioTotales[descripcion]) {
            precioTotales[descripcion] += total;
        } else {
            precioTotales[descripcion] = total;
        }
    });

    // Convierte el objeto precioTotales en un array de objetos
    const dataArr = Object.keys(precioTotales).map(descripcion => ({
        descripcion,
        total: precioTotales[descripcion]
    }));

    // Ordena el array de datos de mayor a menor
    dataArr.sort((a, b) => b.total - a.total);

    // Extrae las etiquetas y datos ordenados
    const labels = dataArr.map(item => item.descripcion);
    const data = dataArr.map(item => item.total);

    // Actualiza el gráfico
    chart3.data.labels = labels;
    chart3.data.datasets[0].data = data;

    // Redibuja la gráfica
    chart3.update();
}


        // Código de la Gráfica 3 (myChart3)
        const ctx3 = document.getElementById('myChart3');
        const consumoData3 = @json($consumo);

        const precioTotales = {};

        // Calcular el total de gasto por departamento
        consumoData3.forEach(item => {
            const descripcion = item.descripcion;
            const total = parseFloat(item.total);

            if (precioTotales[descripcion]) {
                precioTotales[descripcion] += total;
            } else {
                precioTotales[descripcion] = total;
            }
        });

        // Ordenar los datos de mayor a menor total de gasto
        const sortedData = Object.entries(precioTotales)
            .sort((a, b) => b[1] - a[1]);

        const labels3 = sortedData.map(([descripcion, _]) => descripcion);
        const data3 = sortedData.map(([_, totalGasto]) => totalGasto);

        const chart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labels3,
                datasets: [{
                    label: 'Total de Gasto por Departamento (de mayor a menor)',
                    data: data3,
                    borderWidth: 2,
                    backgroundColor: ['rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 218, 158)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 218, 158)'
                    ],
                    borderColor: 'black',
                    hoverBackgroundColor: 'white',
                    barThickness: 30
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        // Código de la Gráfica 2
        const ctx2 = document.getElementById('myChart2');
        const consumoDataOriginal = @json($consumo);
        let chart2; // Variable para almacenar la instancia de la gráfica

        // Función para actualizar la Gráfica 2 con datos filtrados
        function actualizarGrafica(datos) {
            const consumoTotales = {};
            datos.forEach(item => {
                const descripcion = item.descripcion;
                const litros = parseFloat(item.litros);

                if (consumoTotales[descripcion]) {
                    consumoTotales[descripcion] += litros;
                } else {
                    consumoTotales[descripcion] = litros;
                }
            });

            // Ordenar los datos de mayor a menor litros
            const sortedData = Object.entries(consumoTotales)
                .sort((a, b) => b[1] - a[1]);

            const labels2 = sortedData.map(([descripcion, _]) => descripcion);
            const data2 = sortedData.map(([_, litros]) => litros);

            const colors = ['red', 'blue', 'green', 'purple', 'orange', 'pink'];

            // Elimina la gráfica anterior si existe
            if (chart2) {
                chart2.destroy();
            }

            chart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels2,
                    datasets: [{
                        label: 'Litros Consumidos (de mayor a menor)',
                        data: data2,
                        borderWidth: 2,
                        borderColor: 'black',
                        pointBackgroundColor: colors, // Usa la lista de colores para los puntos
                        fill: false, // Asegúrate de que no se rellene el área debajo de la línea
                        barThickness: 30
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Llamar a esta función inicialmente para mostrar la Gráfica 2 sin filtrar
        actualizarGrafica(consumoDataOriginal);

        // Función para filtrar datos por fecha y actualizar ambas gráficas
        function filtrarYActualizarGraficas() {
            var fechaDesdeFiltro = $('#Fecha_Desde_Filtro').val();
            var fechaHastaFiltro = $('#Fecha_Hasta_Filtro').val();

            // Filtrar datos por fechas
            const datosFiltrados = consumoDataOriginal.filter(function(e) {
                return e.fecha >= fechaDesdeFiltro && e.fecha <= fechaHastaFiltro;
            });

            // Actualizar ambas gráficas con datos filtrados
            actualizarGrafica(datosFiltrados); // Actualizar la Gráfica 2
            actualizarGraficas(datosFiltrados); // Actualizar la Gráfica 3
        }




        // Código de la Gráfica 4 (myChart4)
        const ctx4 = document.getElementById('myChart4');
        const consumoData4 = @json($consumo);
        const departamentoData = @json($departamentos);
        let chart4; // Variable para almacenar la instancia de la Gráfica 4

        // Función para actualizar la Gráfica 4 con datos filtrados
        function actualizarGrafica4(datos) {
            const numeroValePorDepartamento = {};

           
            const departamentoNombrePorCC = {};
            departamentoData.forEach(item => {
                departamentoNombrePorCC[item.departamentoCC] = item.nombre;
            });

            datos.forEach(item => {
                const CC = item.CC;

                // Utiliza el nombre del departamento en lugar del CC
                const departamentoNombre = departamentoNombrePorCC[CC] || CC;

                if (numeroValePorDepartamento[departamentoNombre]) {
                    numeroValePorDepartamento[departamentoNombre].push(CC);
                } else {
                    numeroValePorDepartamento[departamentoNombre] = [CC];
                }
            });

            const labels4 = Object.keys(numeroValePorDepartamento);
            const data4 = labels4.map(label => numeroValePorDepartamento[label].length);

            // Elimina la gráfica anterior si existe
            if (chart4) {
                chart4.destroy();
            }

            var chart4 = new Chart(ctx4, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: data4,
                    borderWidth: 2,
                    backgroundColor: [
                        '#FF5733',
                        '#FFBD4A',
                        '#3498DB',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF0000',
                        '#00FF00',
                        '#0000FF',
                        '#FFFF00',
                        '#FF00FF',
                        '#00FFFF',
                        '#808080',
                        '#800000',
                        '#008000',
                        '#000080',
                    ],
                    borderColor: 'white',
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 1,
                title: {
                    display: true,
                    text: 'Vales por Departamento',
                    fontSize: 20,
                    fontColor: 'black',
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: 'black',
                        fontSize: 12,
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            const value = data.datasets[0].data[tooltipItem.index];
                            return `${value} vales`;
                        }
                    },
                    backgroundColor: 'rgba(0, 0, 0, 0.7',
                    borderColor: 'black',
                    borderWidth: 1,
                    titleFontColor: 'white',
                    bodyFontColor: 'white',
                },
                cutout: '50%', 
            }
        });

        } 
        // Llamar a esta función inicialmente para mostrar la Gráfica 4 sin filtrar
    </script>
    


    <script>
            document.addEventListener("DOMContentLoaded", function() {
        const consumoData = <?php echo json_encode($consumo); ?>;
        const departamentoData = <?php echo json_encode($departamentos); ?>;
        let cuentaCCPorDepartamento = {};
        let litrosPorCC = {};
        let totalesGeneralesPorCC = {};

        consumoData.forEach(item => {
            const CC = item.CC;
            const departamentoNombre = getDepartamentoNombre(CC);

            if (cuentaCCPorDepartamento[CC]) {
                cuentaCCPorDepartamento[CC]++;
            } else {
                cuentaCCPorDepartamento[CC] = 1;
            }

            if (litrosPorCC[CC]) {
                litrosPorCC[CC] += parseFloat(item.litros);
            } else {
                litrosPorCC[CC] = parseFloat(item.litros);
            }

            if (totalesGeneralesPorCC[CC]) {
                totalesGeneralesPorCC[CC] += parseFloat(item.total);
            } else {
                totalesGeneralesPorCC[CC] = parseFloat(item.total);
            }
        });

        function getDepartamentoNombre(CC) {
            for (const item of departamentoData) {
                if (item.departamentoCC === CC) {
                    return item.nombre;
                }
            }
            return CC;
        }

        const tabla = document.getElementById('tablaDatos');
        const tbody = tabla.querySelector('tbody');

        function ordenarTablaPorLitros() {
            const filas = Array.from(tbody.querySelectorAll('tr'));

            filas.sort((filaA, filaB) => {
                const litrosA = parseFloat(filaA.querySelector('td:nth-child(4)').textContent);
                const litrosB = parseFloat(filaB.querySelector('td:nth-child(4)').textContent);

                return litrosB - litrosA;
            });

            // Elimina las filas existentes de la tabla
            filas.forEach(fila => tbody.removeChild(fila));

            // Agrega las filas ordenadas nuevamente a la tabla
            filas.forEach(fila => tbody.appendChild(fila));
        }

    function actualizarTabla() {
        tbody.innerHTML = '';

        departamentoData.forEach(element => {
            const fila = document.createElement('tr');
            const CCCelda = document.createElement('td');
            CCCelda.textContent = element.departamentoCC;
            const departamentoCelda = document.createElement('td');
            departamentoCelda.textContent = element.departamentoNombre;
            const cuentaCCCelda = document.createElement('td');
            const litrosCelda = document.createElement('td');
            const totalGeneralCelda = document.createElement('td');

            const totalLitrosPorCC = litrosPorCC[element.departamentoCC] || 0;
            litrosCelda.textContent = totalLitrosPorCC;

            const cuentaCC = cuentaCCPorDepartamento[element.departamentoCC] || 0;
            cuentaCCCelda.textContent = cuentaCC;

            const totalGeneralPorCC = totalesGeneralesPorCC[element.departamentoCC] || 0;
            totalGeneralCelda.textContent = totalGeneralPorCC.toFixed(1);

            fila.appendChild(CCCelda);
            fila.appendChild(departamentoCelda);
            fila.appendChild(cuentaCCCelda);
            fila.appendChild(litrosCelda);
            fila.appendChild(totalGeneralCelda);

            tbody.appendChild(fila);
        });

        ordenarTablaPorLitros(); // Llama a esta función para ordenar la tabla por litros
    }

    actualizarTabla(); // Llama a actualizarTabla() al cargar la página

    const botonFiltrar = document.getElementById('filtrarDatos');
    botonFiltrar.addEventListener('click', function() {
        const fecha_Desde_Filtro = document.getElementById('Fecha_Desde_Filtro').value;
        const fecha_Hasta_Filtro = document.getElementById('Fecha_Hasta_Filtro').value;

        const datosFiltrados = consumoData.filter(item => {
            return item.fecha >= fecha_Desde_Filtro && item.fecha <= fecha_Hasta_Filtro;
        });

        // Restablece los objetos a su estado inicial antes de aplicar el filtro
        cuentaCCPorDepartamento = {};
        litrosPorCC = {};
        totalesGeneralesPorCC = {};

        datosFiltrados.forEach(item => {
            const CC = item.CC;

            if (cuentaCCPorDepartamento[CC]) {
                cuentaCCPorDepartamento[CC]++;
            } else {
                cuentaCCPorDepartamento[CC] = 1;
            }

            if (litrosPorCC[CC]) {
                litrosPorCC[CC] += parseFloat(item.litros);
            } else {
                litrosPorCC[CC] = parseFloat(item.litros);
            }

            if (totalesGeneralesPorCC[CC]) {
                totalesGeneralesPorCC[CC] += parseFloat(item.total);
            } else {
                totalesGeneralesPorCC[CC] = parseFloat(item.total);
            }
        });

        actualizarTabla();
    });
});

    </script>



    <script>
        //tabla para las dos graficas
actualizarGrafica4(consumoData4);

// Función para filtrar datos por fecha y actualizar todas las gráficas
function filtrarYActualizarGraficas() {
    var fechaDesdeFiltro = $('#Fecha_Desde_Filtro').val();
    var fechaHastaFiltro = $('#Fecha_Hasta_Filtro').val();

    // Filtrar datos por fechas
    const datosFiltrados = consumoData4.filter(function(e) {
        return e.fecha >= fechaDesdeFiltro && e.fecha <= fechaHastaFiltro;
    });

    // Actualizar todas las gráficas con datos filtrados
    actualizarGrafica(datosFiltrados); // Actualizar la Gráfica 2
    actualizarGraficas(datosFiltrados); // Actualizar la Gráfica 3
    actualizarGrafica4(datosFiltrados); // Actualizar la Gráfica 4
}

// Resto del código sin cambios
const tablaConsumo = document.getElementById('tablaConsumo');
const tbodyConsumo = tablaConsumo.querySelector('tbody');
const vehiculosData = <?php echo json_encode($vehiculos); ?>;
const consumoData = <?php echo json_encode($consumo); ?>;
const totalesGenerales = calcularTotalesGenerales(consumoData);

function filtrarYActualizarTabla() {
    var fechaDesdeFiltro = new Date($('#Fecha_Desde_Filtro').val());
    var fechaHastaFiltro = new Date($('#Fecha_Hasta_Filtro').val());

    // Filtrar datos por fechas
    const datosFiltrados = consumoData.filter(function(item) {
        var fecha = new Date(item.fecha);
        return fecha >= fechaDesdeFiltro && fecha <= fechaHastaFiltro;
    });

    // Crear un objeto para llevar un seguimiento de las sumas por descripción
    const descripcionSumas = {};

    // Limpia la tabla
    tbodyConsumo.innerHTML = '';

    // Recorre los datos filtrados
    datosFiltrados.forEach(function(item) {
        const descripcion = item.descripcion;
        const litros = parseFloat(item.litros);
        const total = parseFloat(item.total);
        var modelo = '';
        var marca = '';
        var combustible = '';
        for (let index = 0; index < vehiculosData.length; index++) {
            if (vehiculosData[index].vehiculoEco == descripcion) {
                modelo = vehiculosData[index].vehiculoModelo;
                marca = vehiculosData[index].vehiculoMarca;
                combustible = vehiculosData[index].vehiculoCombustible;
                if (descripcionSumas.hasOwnProperty(descripcion)) {
                    // Si la descripción ya existe, suma los litros y el total
                    descripcionSumas[descripcion].litros += litros;
                    descripcionSumas[descripcion].total += total;
                } else {

                    descripcionSumas[descripcion] = {
                        litros: litros,
                        total: total,
                        modelo: modelo,
                        marca: marca,
                        combustible: combustible,
                    };
                }
            }
        }
    });

        // Ordena las descripciones por sumatoria de litros en orden descendente
        const descripcionesOrdenadas = Object.keys(descripcionSumas).sort(function(a, b) {
            return descripcionSumas[b].litros - descripcionSumas[a].litros;
        });

        // Recorre las descripciones ordenadas y muestra las sumas
        for (const descripcion of descripcionesOrdenadas) {
            const fila = document.createElement('tr');
            const descripcionCelda = document.createElement('td');
            const modeloCelda = document.createElement('td');
            const marcaCelda = document.createElement('td');
            const combustibleCelda = document.createElement('td');
            const litrosCelda = document.createElement('td');
            const totalCelda = document.createElement('td');

            descripcionCelda.textContent = descripcion;
            modeloCelda.textContent = descripcionSumas[descripcion].modelo;
            marcaCelda.textContent = descripcionSumas[descripcion].marca;
            combustibleCelda.textContent = descripcionSumas[descripcion].combustible;
            litrosCelda.textContent = descripcionSumas[descripcion].litros.toFixed(1);
            totalCelda.textContent = descripcionSumas[descripcion].total.toFixed(1);

            fila.appendChild(descripcionCelda);
            fila.appendChild(modeloCelda);
            fila.appendChild(marcaCelda);
            fila.appendChild(combustibleCelda);
            fila.appendChild(litrosCelda);
            fila.appendChild(totalCelda);

            tbodyConsumo.appendChild(fila);
        }
    }

document.getElementById('filtrarDatos').addEventListener('click', filtrarYActualizarTabla);

// Crear un objeto para llevar un seguimiento de las sumas de litros por descripción
const descripcionLitros = {};

// Crear un objeto para llevar un seguimiento de las sumas de total por descripción
const descripcionTotal = {};

// Recorre los datos de consumo
for (let i = 0; i < consumoData.length; i++) {
    const descripcion = consumoData[i].descripcion;
    const litros = parseFloat(consumoData[i].litros);
    const total = parseFloat(consumoData[i].total);

    // Verifica si ya hemos registrado esta descripción
    if (descripcionLitros.hasOwnProperty(descripcion)) {
        // Si la descripción ya existe, suma los litros a la suma existente
        descripcionLitros[descripcion] += litros;
        descripcionTotal[descripcion] += total;
    } else {
        // Si es una nueva descripción, crea una nueva fila y registra las sumas
        const fila = document.createElement('tr');
        const descripcionCelda = document.createElement('td');
        const modeloCelda = document.createElement('td');
        const marcaCelda = document.createElement('td');
        const combustibleCelda = document.createElement('td');
        const litrosCelda = document.createElement('td');
        const totalCelda = document.createElement('td');

        descripcionCelda.textContent = descripcion;
        modeloCelda.textContent = vehiculosData[i].vehiculoModelo;
        marcaCelda.textContent = vehiculosData[i].vehiculoMarca;
        combustibleCelda.textContent = vehiculosData[i].vehiculoCombustible;
        litrosCelda.textContent = litros.toFixed(1);
        totalCelda.textContent = total;

        // Registra la suma inicial para esta descripción
        descripcionLitros[descripcion] = litros;
        descripcionTotal[descripcion] = total;

        // Agrega la fila a la tabla
        fila.appendChild(descripcionCelda);
        fila.appendChild(modeloCelda);
        fila.appendChild(marcaCelda);
        fila.appendChild(combustibleCelda);
        fila.appendChild(litrosCelda);
        fila.appendChild(totalCelda);

        tbodyConsumo.appendChild(fila);
    }
}

// Actualiza las celdas de litros con las sumas correctas
const filasTabla = tbodyConsumo.querySelectorAll('tr');
filasTabla.forEach((fila, index) => {
    const descripcion = fila.cells[0].textContent;
    if (descripcionLitros.hasOwnProperty(descripcion)) {
        fila.cells[4].textContent = descripcionLitros[descripcion].toFixed(1);
        fila.cells[5].textContent = descripcionTotal[descripcion].toFixed(1);
    }
});

function ordenarTablaPorTotal() {
    const filasTabla = tbodyConsumo.querySelectorAll('tr');

    const filasArray = Array.from(filasTabla);

    filasArray.sort((filaA, filaB) => {
        const totalA = parseFloat(filaA.cells[5].textContent);
        const totalB = parseFloat(filaB.cells[5].textContent);

        return totalB - totalA;
    });

    // Elimina las filas existentes de la tabla
    filasArray.forEach(fila => tbodyConsumo.removeChild(fila));

    // Agrega las filas ordenadas nuevamente a la tabla
    filasArray.forEach(fila => tbodyConsumo.appendChild(fila));
}

// Llama a la función para ordenar la tabla por el total al cargar la página, si es necesario.
ordenarTablaPorTotal();

function calcularTotalesGenerales(consumoData) {
    const totalesGenerales = {};

    for (let i = 0; i < consumoData.length; i++) {
        const descripcionVehiculo = consumoData[i].descripcion;
        const total = parseFloat(consumoData[i].total);

        if (totalesGenerales[descripcionVehiculo]) {
            totalesGenerales[descripcionVehiculo] += total;
        } else {
            totalesGenerales[descripcionVehiculo] = total;
        }
    }
    return totalesGenerales;
}


    </script>


    </div>
@endsection
