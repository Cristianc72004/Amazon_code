document.addEventListener('DOMContentLoaded', function() {
    // Obtener el contenedor donde se mostrarán los laboratorios
    const listaLaboratorios = document.getElementById('lista-laboratorios');
  
    // Petición AJAX para obtener los datos desde PHP
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/listar_laboratorio.php', true);
  
    xhr.onload = function() {
      if (xhr.status === 200) {
        const laboratorios = JSON.parse(xhr.responseText);
  
        // Construir el HTML para cada laboratorio
        laboratorios.forEach(lab => {
          const laboratorioHTML = `
            <div class="bg-gray-200 p-4 rounded-lg shadow-md">
              <h3 class="text-xl font-bold">${lab.Nombre_laboratorio}</h3>
              <p><strong>Horario:</strong> ${lab.horario}</p>
              <p><strong>Capacidad:</strong> ${lab.Capacidad}</p>
              <p><strong>Número de Equipos:</strong> ${lab.N_Equipos}</p>
              <div class="mt-4 flex justify-between">
                <a href="editar_laboratorio.html?id=${lab.ID_laboratorio}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
                <a href="javascript:void(0);" onclick="eliminarLaboratorio(${lab.ID_laboratorio});" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Eliminar</a>
                <a href="reservar_laboratorio.html?id=${lab.ID_laboratorio}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Reservar</a>
              </div>
            </div>
          `;
          listaLaboratorios.innerHTML += laboratorioHTML;
        });
      } else {
        console.error('Error al obtener los datos de los laboratorios.');
      }
    };
  
    xhr.send();
  });
  
  // Función para eliminar un laboratorio
  function eliminarLaboratorio(id) {
    if (confirm('¿Estás seguro de eliminar este laboratorio?')) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `php/eliminar_laboratorio.php?id=${id}`, true);
  
      xhr.onload = function() {
        if (xhr.status === 200) {
          alert('Laboratorio eliminado correctamente');
          location.reload(); // Recargar la página para reflejar los cambios
        } else {
          console.error('Error al eliminar el laboratorio.');
        }
      };
  
      xhr.send();
    }
  }
  