@extends('layouts.app')
@section('content')

<link href="{{ asset('/css/estadisticasVales.css') }}" rel="stylesheet">

<div class="container">
    <div class="col-md-12 text-center">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <label for="Fecha_Desde_Filtro" class="col-form-label">Fecha inicio:</label>
                <input type="date" name="Fecha_Desde_Filtro" id="Fecha_Desde_Filtro" class="form-control justify-content-center">
            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="filtrarYActualizarGraficas()">Buscar</button>
            </div>
            <div class="col-md-4">
                <label for="Fecha_Hasta_Filtro" class="col-form-label">Fecha final:</label>
                <input type="date" name="Fecha_Hasta_Filtro" id="Fecha_Hasta_Filtro" class="form-control justify-content-center">
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6 mt-3">
            <div class="container">
                <div>
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-3">
            <div class="container">
                <canvas id="myChartz1"></canvas>
            </div>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="row">
        <div class="col-lg-6">
            <div class="container">
                <div class="table-responsive">
                    <div id="table-container"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container">
                <div class="table-responsive">
                    <div id="table-container2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.min.js"></script>


<script>
    let chart1;
    let chartz1;
    let datosIniciales = <?php echo json_encode($vale) ?>;
    let datosInicialesTabla2 = <?php echo json_encode($vale) ?>;
    let departamentos = <?php echo json_encode($departamento) ?>;

    // Actualiza las gráficas y la tabla principal
    function actualizarGraficasYTabla(datosFiltrados) {
        const ctx1 = document.getElementById('myChart1');

        const ValesAceptados1 = datosFiltrados.filter(item => item.valeEstado === "Aceptado");

        const ValeContador1 = {};
        ValesAceptados1.forEach(item => {
            const centroCostos = item.valeEconomico;
            ValeContador1[centroCostos] = (ValeContador1[centroCostos] || 0) + 1;
        });

        // Ordenar los datos de mayor a menor
        const sortedData1 = Object.keys(ValeContador1).sort((a, b) => ValeContador1[b] - ValeContador1[a]);
        const data1 = sortedData1.map(key => ValeContador1[key]);

        if (chart1) {
            chart1.destroy();
        }

        chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: sortedData1,
                datasets: [{
                    label: '',
                    data: data1,
                    borderWidth: 1,
                    backgroundColor: 'rgba(135, 206, 235, 10)',
                    hoverBorderColor: 'white',

                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing: 'easeOutBack',
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Vales',
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Vehículos',
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    }
                }
            }
        });
        // Actualizar gráfica 2
        const ctxz1 = document.getElementById('myChartz1');

        const uniqueValeCostos = Array.from(new Set(ValesAceptados1.map(item => item.valeCc)));

        const data = {};

        uniqueValeCostos.forEach(valeCostos => {
            const valesPorCentroCostos = ValesAceptados1.filter(item => item.valeCc === valeCostos);
            data[valeCostos] = valesPorCentroCostos.length;
        });

        // Ordena los datos 
        const sortedData2 = uniqueValeCostos.sort((a, b) => data[b] - data[a]);
        const sortedValues2 = sortedData2.map(key => data[key]);

        if (chartz1) {
            chartz1.destroy();
        }

        chartz1 = new Chart(ctxz1, {
            type: 'bar',
            data: {
                labels: sortedData2,
                datasets: [{
                    label: '',
                    data: sortedValues2,
                    borderColor: 'rgb(200, 150, 225)',
                    backgroundColor: 'rgba(1, 0, 0, 0.5)',
                    borderWidth: 1
                }]
            },
            options: {
                animation: {
                    duration: 3000,
                    easing: 'easeOutBack',
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Vales',
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Centro de Costos',
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    }
                }
            }
        });

        // Actualiza tabla principal
        const tableContainer = document.getElementById('table-container');
        const table = document.createElement('table');
        table.classList.add('table');
        const thead = document.createElement('thead');
        const headerRow = document.createElement('tr');
        const headerEco = document.createElement('th');
        headerEco.textContent = 'No.eco';
        const headerMarca = document.createElement('th');
        headerMarca.textContent = 'Marca';
        const headerModelo = document.createElement('th');
        headerModelo.textContent = ' Modelo ';
        const headerCombustible = document.createElement('th');
        headerCombustible.textContent = 'Combustible';
        const headerVales = document.createElement('th');
        headerVales.textContent = 'Vales';
        headerRow.appendChild(headerEco);
        headerRow.appendChild(headerMarca);
        headerRow.appendChild(headerModelo);
        headerRow.appendChild(headerCombustible);
        headerRow.appendChild(headerVales);
        thead.appendChild(headerRow);
        table.appendChild(thead);

        const tbody = document.createElement('tbody');
        const groupedData = groupDataByEconomico(ValesAceptados1);
        const sortedGroupedData = sortDataByValesDesc(groupedData);

        sortedGroupedData.forEach(item => {
            const row = document.createElement('tr');
            const cellEco = document.createElement('td');
            const cellMarca = document.createElement('td');
            const cellModelo = document.createElement('td');
            const cellCombustible = document.createElement('td');
            const cellVales = document.createElement('td');

            // Agrega una clase para centrar solo esta celda
            cellEco.classList.add('text-center');
            cellCombustible.classList.add('text-center');
            cellVales.classList.add('text-center');

            cellEco.textContent = item.valeEconomico;
            cellMarca.textContent = item.valeMarca;
            cellModelo.textContent = item.valeModelo;
            cellCombustible.textContent = item.valeCombustible;
            cellVales.textContent = item.count;

            row.appendChild(cellEco);
            row.appendChild(cellMarca);
            row.appendChild(cellModelo);
            row.appendChild(cellCombustible);
            row.appendChild(cellVales);
            tbody.appendChild(row);
        });


        table.appendChild(tbody);
        tableContainer.innerHTML = '';
        tableContainer.appendChild(table);

        // Actualiza segunda tabla
        actualizarTabla2(datosInicialesTabla2);
    }

    const departamentoMap = {};
    departamentos.forEach(depto => {
        departamentoMap[depto.id] = depto.departamentoNombre;
    });


    function obtenerNombreDepartamento(deptoNumero) {
        return departamentoMap[deptoNumero] || 'Desconocido';
    }



    // Actualiza segunda tabla
    function actualizarTabla2(datosFiltrados) {
        const tableContainer2 = document.getElementById('table-container2');
        const table2 = document.createElement('table');
        table2.classList.add('table');
        const thead2 = document.createElement('thead');
        const headerRow2 = document.createElement('tr');
        const headerDepartamento = document.createElement('th');
        headerDepartamento.textContent = 'Departamento';
        const headerArea = document.createElement('th');
        headerArea.textContent = 'Área';
        const headerValeCc = document.createElement('th');
        headerValeCc.textContent = 'C.C';
        const headerVales2 = document.createElement('th');
        headerVales2.textContent = 'Vales';
        headerRow2.appendChild(headerDepartamento);
        headerRow2.appendChild(headerArea);
        headerRow2.appendChild(headerValeCc);
        headerRow2.appendChild(headerVales2);
        thead2.appendChild(headerRow2);
        table2.appendChild(thead2);

        const tbody2 = document.createElement('tbody');
        const filteredData = datosFiltrados.filter(item => item.valeEstado === "Aceptado");
        const groupedData2 = groupDataByDepartamentoAreaValeCc(filteredData);

        groupedData2.forEach(item => {
            const row = document.createElement('tr');
            const cellDepartamento = document.createElement('td');
            const cellArea = document.createElement('td');
            const cellValeCc = document.createElement('td');
            const cellVales2 = document.createElement('td');

            cellDepartamento.textContent = obtenerNombreDepartamento(item.valeDepartamento);
            cellArea.textContent = item.valeArea;
            cellValeCc.textContent = item.valeCc;
            cellVales2.classList.add('text-center');
            cellVales2.textContent = item.count;

            row.appendChild(cellDepartamento);
            row.appendChild(cellArea);
            row.appendChild(cellValeCc);
            row.appendChild(cellVales2);
            tbody2.appendChild(row);
        });

        table2.appendChild(tbody2);
        tableContainer2.innerHTML = '';
        tableContainer2.appendChild(table2);
    }


    // Agrupa los datos por No.Eco
    function groupDataByEconomico(data) {
        const groupedData = [];
        data.forEach(item => {
            const existingItem = groupedData.find(groupedItem => groupedItem.valeEconomico === item.valeEconomico);
            if (existingItem) {
                existingItem.count++;
            } else {
                const newItem = {
                    ...item,
                    count: 1
                };
                groupedData.push(newItem);
            }
        });
        return groupedData;
    }

    // Agrupa los datos por Departamento, Área y ValeCc
    function groupDataByDepartamentoAreaValeCc(data) {
        const groupedData = [];
        data.forEach(item => {
            const existingItem = groupedData.find(groupedItem =>
                groupedItem.valeDepartamento === item.valeDepartamento &&
                groupedItem.valeArea === item.valeArea &&
                groupedItem.valeCc === item.valeCc
            );
            if (existingItem) {
                existingItem.count++;
            } else {
                const newItem = {
                    ...item,
                    count: 1
                };
                groupedData.push(newItem);
            }
        });
        return groupedData;
    }

    // Ordena los datos por la cantidad de vales
    function sortDataByValesDesc(data) {
        return data.sort((a, b) => b.count - a.count);
    }

    // Filtra y actualiza las gráficas 
    function filtrarYActualizarGraficas() {
        var fecha_Desde_Filtro = $('#Fecha_Desde_Filtro').val();
        var fecha_Hasta_Filtro = $('#Fecha_Hasta_Filtro').val();

        if (!fecha_Desde_Filtro || !fecha_Hasta_Filtro) {
            alert('Por favor, seleccione ambas fechas.');
            return;
        }

        // Filtra los datos por fechas
        var datosFiltrados;

        if (!fecha_Desde_Filtro || !fecha_Hasta_Filtro) {
            datosFiltrados = datosIniciales;
        } else {
            datosFiltrados = datosIniciales.filter(function(e) {
                return e.valeFecha >= fecha_Desde_Filtro && e.valeFecha <= fecha_Hasta_Filtro;
            });
        }

        actualizarGraficasYTabla(datosFiltrados);
        actualizarTabla2(datosFiltrados);
    }

    actualizarGraficasYTabla(datosIniciales);
</script>
@endsection