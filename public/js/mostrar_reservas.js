document.addEventListener('DOMContentLoaded', function() {
    const listaReservas = document.getElementById('lista-reservas');

    // Petición AJAX para obtener las reservas desde PHP
    fetch('php/obtener_reservas.php')
        .then(response => response.json())
        .then(reservas => {
            reservas.forEach(reserva => {
                const reservaHTML = `
                    <div class="bg-black p-4 rounded-md shadow-md mb-4 text-white">
                        <h3 class="text-lg font-bold">${reserva.Descripcion}</h3>
                        <p><strong>Usuario:</strong> ${reserva.NombreUsuario}</p>
                        <p><strong>Laboratorio:</strong> ${reserva.Nombre_laboratorio}</p>
                        <p><strong>Horario:</strong> ${reserva.horario}</p>
                        <div class="mt-2 flex">
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md mr-2 cancelar-reserva" data-id="${reserva.ID_reserva}">Cancelar Reserva</button>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md modificar-reserva" data-id="${reserva.ID_reserva}">Modificar</button>
                        </div>
                    </div>
                `;
                listaReservas.innerHTML += reservaHTML;
            });

            // Agregar event listeners para los botones
            listaReservas.addEventListener('click', function(event) {
                if (event.target.classList.contains('cancelar-reserva')) {
                    const idReserva = event.target.dataset.id;
                    cancelarReserva(idReserva);
                } else if (event.target.classList.contains('modificar-reserva')) {
                    const idReserva = event.target.dataset.id;
                    // Redirigir a la página de edición de reserva con el ID
                    window.location.href = `../public/editar_reserva.html?id=${idReserva}`;
                }
            });
        })
        .catch(error => {
            console.error('Error al obtener las reservas:', error);
        });
});

function cancelarReserva(idReserva) {
    fetch('php/cancelar_reserva.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `ID_reserva=${idReserva}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Reserva cancelada exitosamente.');
            location.reload();
        } else {
            alert('Error al cancelar la reserva.');
        }
    })
    .catch(error => {
        console.error('Error al cancelar la reserva:', error);
    });
}
