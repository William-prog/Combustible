function previsualizarArchivo() {
  const archivoInput = document.getElementById('archivoInput');
  const vistaPrevia = document.getElementById('vistaPrevia');

  // Verificar si se seleccionó un archivo
  if (archivoInput.files && archivoInput.files[0]) {
      const archivo = archivoInput.files[0];
      const tipoArchivo = archivo.type;

      // Verificar si el archivo es CSV
      if (tipoArchivo === 'application/vnd.ms-excel' || tipoArchivo === 'text/csv') {
          const lector = new FileReader();

          // Cuando el archivo se haya cargado, mostrarlo en la vista previa
          lector.onload = function(event) {
              const contenidoCSV = event.target.result;
              const lineasCSV = contenidoCSV.split('\n');
              const tablaHTML = document.createElement('table');
              
              // Crear filas de datos de la tabla
              for (let i = 0; i < lineasCSV.length; i++) {
                  const datos = lineasCSV[i].split(',');
                  const filaHTML = document.createElement('tr');
                  datos.forEach(dato => {
                      const td = document.createElement('td');
                      td.textContent = dato;
                      filaHTML.appendChild(td);
                  });
                  tablaHTML.appendChild(filaHTML);
              }

              vistaPrevia.innerHTML = '';
              vistaPrevia.appendChild(tablaHTML);
          };

          // Leer el archivo como texto
          lector.readAsText(archivo);
      } else {
          // Si no es un archivo CSV, muestra un mensaje de error
          vistaPrevia.innerHTML = 'El archivo seleccionado no es un archivo CSV válido.';
      }
  } else {
      // Si no se seleccionó ningún archivo, borra la vista previa
      vistaPrevia.innerHTML = '';
  }
}

