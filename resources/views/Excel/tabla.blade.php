<link href="{{ asset('/css/tablaExcel.css') }}" rel="stylesheet">
<h1>Previsualizacion del Archivo</h1>
<br>
<div class="row">
    <table class="table table-hover table-responsive" style="width: 100%">
        <thead>
            <tr>
                <th scope="col" GAR>ID</th>
                <th scope="col">FECHA</th>
                <th scope="col">N.TICKET</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">N.VALE</th>
                <th scope="col">CC</th>
                <th scope="col">PLACAS</th>
                <th scope="col"class="operador">OPERADOR</th>
                <th scope="col">PRODUCTO</th>
                <th scope="col">LITROS</th>
                <th scope="col">PRECIO</th>
                <th scope="col">TOTAL</th>
            </tr>
        </thead>
        <tbody id="excelTable">

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
