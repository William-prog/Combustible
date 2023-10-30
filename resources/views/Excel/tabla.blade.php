<link href="{{ asset('/css/tablaExcel.css') }}" rel="stylesheet">
<h1 class="h2">Previsualizacion del Archivo</h1>
<br>
<div class="row">
    <table class="table table-hover table-responsive text-center" style="width: 100% ">
        <thead>
            <tr style="background-color: #FF771F; color: white;" >
                <th scope="col" GAR>id</th>
                <th scope="col">Fecha</th>
                <th scope="col">N.ticket</th>
                <th scope="col">Descripcion</th>
                <th scope="col">N.vale</th>
                <th scope="col">CC</th>
                <th scope="col">Placas</th>
                <th scope="col"class="operador">Operador</th>
                <th scope="col">Producto</th>
                <th scope="col">Litros</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody class="text-center" id="excelTable">

        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script>
        document.getElementById('excelFile').addEventListener('change', handleFile);

        function handleFile(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, {
                        type: 'array'
                    });
                    const sheetName = workbook.SheetNames[0];
                    const sheet = workbook.Sheets[sheetName];
                    const htmlTable = XLSX.utils.sheet_to_html(sheet);
                    document.getElementById('excelTable').innerHTML = htmlTable;
                };
                reader.readAsArrayBuffer(file);
            }
        }
    </script>
</div>
