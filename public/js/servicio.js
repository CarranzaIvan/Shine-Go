document.querySelectorAll('.btnEditarServicio').forEach(button => {
    button.addEventListener('click', function() {
        const idServicio = this.getAttribute('data-id');
        
        // Obtener los datos del servicio desde los elementos de la tarjeta
        const servicio = {
            titulo: document.querySelector(`#titulo-${idServicio}`).innerText,
            precio: document.querySelector(`#precio-${idServicio}`).innerText.replace('$', '').trim(),
            descripcion: document.querySelector(`#descripcion-${idServicio}`).innerText
        };
        
        // Llenar los campos del formulario de edición con los datos del servicio
        document.getElementById('editarTitulo').value = servicio.titulo;
        document.getElementById('editarPrecio').value = servicio.precio;
        document.getElementById('editarDescripcion').value = servicio.descripcion;
        
        // Cambiar la acción del formulario para enviar la actualización del servicio
        document.getElementById('editarServicioForm').action = `/servicios/gestion/${idServicio}/actualizar`;

        // Mostrar el modal de edición
        const editarModal = new bootstrap.Modal(document.getElementById('editarServicioModal'));
        editarModal.show();
    });
});
