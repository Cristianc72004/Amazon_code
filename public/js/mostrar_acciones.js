document.addEventListener('DOMContentLoaded', function() {
    const listaAcciones = document.getElementById('lista-acciones');

    // Petición AJAX para obtener las acciones desde PHP
    fetch('php/obtener_acciones.php')
        .then(response => response.json())
        .then(acciones => {
            if (acciones.length > 0) {
                acciones.forEach(accion => {
                    const accionHTML = `
                        <tr>
                            <td class="border px-4 py-2">${accion.ID_accion}</td>
                            <td class="border px-4 py-2">${accion.Tipo_accion}</td>
                            <td class="border px-4 py-2">${accion.ID_reserva}</td>
                            <td class="border px-4 py-2">${accion.Fecha}</td>
                        </tr>
                    `;
                    listaAcciones.innerHTML += accionHTML;
                });
            } else {
                listaAcciones.innerHTML = '<tr><td colspan="4" class="border px-4 py-2 text-center">No hay acciones registradas</td></tr>';
            }
        })
        .catch(error => {
            console.error('Error al obtener las acciones:', error);
            listaAcciones.innerHTML = '<tr><td colspan="4" class="border px-4 py-2 text-center">Error al cargar las acciones</td></tr>';
        });
});
