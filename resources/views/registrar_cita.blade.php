@extends('layout.app')

@section('title', 'Registrar Cita')

@section('content')

<style>
    /* Estilo general para el contenedor del calendario */
    #calendar-container {
        background-color: #fdfdfd;
        border-radius: 20px;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
        padding: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 40px;
    }

    /* Efecto de elevación al pasar el ratón */
    #calendar-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
    }

    /* Estilo del calendario */
    #calendar {
        max-width: 100%;
        margin: 0 auto;
        border-radius: 20px;
        overflow: hidden;
        background-color: #f9fafb;
    }

    /* Estilos para los días de la semana (encabezados) */
    .fc-day-header {
        background: linear-gradient(135deg, #ffcc80 0%, #ffa726 100%);
        color: #2c2c2c;
        font-weight: bold;
        padding: 15px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
        border-bottom: 2px solid #e0e0e0;
    }

    /* Estilos para eventos */
    .fc-event {
        border-radius: 10px;
        padding: 10px;
        font-weight: bold;
        color: white;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Estilos para el día de hoy */
    .fc-today {
        background-color: #ffecb3;
        border: 2px solid #ffb74d;
        font-weight: bold;
    }
</style>

<!--CALENDARIO-->
<section style="background-color: #f5f5f5;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h1 class="text-center">Reserva una Cita</h1>
                <br>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id='calendar-container'>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>
<!--FIN CALENDARIO-->


<!-- Vertically centered modal HORARIOS-->
<div class="modal fade" id="modal-reservas" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div style="background-color:#0d6efd ;" class="modal-header">
                <h1 style="color: white;" class="modal-title fs-5" id="staticBackdropLabel"><b>Reserva tu cita para el dia <span id="dia_de_la_semana"></span></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md 6">
                        <center>
                            Turnos de la mañana
                        </center>
                        <br>
                        <div class="d-grid gap-1">
                            <button type="button" id="btn_h1" class="btn btn-success">08:00 - 09:00</button>
                            <button type="button" id="btn_h2" class="btn btn-success">09:00 - 10:00</button>
                            <button type="button" id="btn_h3" class="btn btn-success">10:00 - 11:00</button>
                            <button type="button" id="btn_h4" class="btn btn-success">11:00 - 12:00</button>
                            <br>
                        </div>
                    </div>

                    <div class="col-md 6">
                        <center>
                            Turnos de la tarde
                        </center>
                        <br>
                        <div class="d-grid gap-1">
                            <button type="button" id="btn_h5" class="btn btn-success">13:00 - 14:00</button>
                            <button type="button" id="btn_h6" class="btn btn-success">14:00 - 15:00</button>
                            <button type="button" id="btn_h7" class="btn btn-success">15:00 - 16:00</button>
                            <button type="button" id="btn_h8" class="btn btn-success">16:00 - 17:00</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Vertically centered modal FORMULARIO -->
<div class="modal fade" id="modal-formulario" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div style="background-color:#0d6efd ;" class="modal-header">
                <h1 style="color: white;" class="modal-title fs-5" id="staticBackdropLabel"><b><span id="dia_de_la_semana"></span></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('citas.store') }}" method="post">
                        @csrf <!-- Este token es obligatorio para las solicitudes POST en Laravel -->
                        <div class="row">
                            <div class="col-md 6">
                                <div class="mb-3">
                                    <label><b>Usuario</b></label>
                                    <input type="text" name="usuario" class="form-control" value="Juan Ernesto Mendez Nerio" readonly>
                                    <input type="hidden" name="id_usuario" value="1">
                                </div>
                            </div>

                            <div class="col-md 6">
                                <div class="mb-3">
                                    <label for=""><b>Tipo de Servicio</b></label>
                                    <select name="id_servicio" class="form-select" required>
                                        <option value="" selected>Selecciona un servicio</option>
                                        <!-- Recorremos el array $servicios para generar las opciones -->
                                        <option value="1">Lavado Premium</option>
                                        <option value="2">Lavado Express</option>
                                        <option value="3">Lavado de Motor</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md 6">
                                <div class="mb-3">
                                    <label><b>Fecha de reserva</b></label>
                                    <input type="text" id="fecha_cita" name="fecha_cita" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md 6">
                                <div class="mb-3">
                                    <label for=""><b>Hora de reserva</b></label>
                                    <input type="text" id="hora_cita" name="hora_cita" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" id="regresar" class="btn btn-secondary">Regresar</button>
                            <button type="submit" class="btn btn-primary">Reservar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            confirmButtonText: 'OK'
        });
    });
</script>
@endif

<!--SCRIPT PARA CALENDARIO-->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>


<script>
    var a; // Variable para almacenar la fecha seleccionada

    document.addEventListener('DOMContentLoaded', function() {
        // Configuración de la zona horaria de El Salvador
        var options = {
            timeZone: 'America/El_Salvador',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        };
        var today = new Date();

        var dateElSalvador = new Intl.DateTimeFormat('en-CA', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            timeZone: 'America/El_Salvador'
        }).format(today);

        var currentHourElSalvador = parseInt(new Intl.DateTimeFormat('es-SV', {
            hour: '2-digit',
            timeZone: 'America/El_Salvador',
            hour12: false
        }).format(today));

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,
            validRange: {
                start: dateElSalvador
            },
            events: '/citas', // URL a la ruta en Laravel
            dateClick: function(info) {
                a = info.dateStr;
                var selectedDate = new Date(a);
                var selectedDateFormatted = selectedDate.toISOString().split('T')[0];
                var dayOfWeek = selectedDate.getUTCDay();

                var dia = selectedDate.getDate() + 1;
                var mes = selectedDate.toLocaleString('es-SV', {
                    month: 'long'
                });
                var anio = selectedDate.getFullYear();
                var diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                var finalDate = `${diasSemana[dayOfWeek]} ${dia} de ${mes} del ${anio}`;

                $('#dia_de_la_semana').text(finalDate);

                if (dayOfWeek === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lo sentimos',
                        text: 'No se pueden reservar citas los domingos.',
                        confirmButtonText: 'Entendido'
                    });
                    return;
                }

                $.ajax({
                    url: '/citas/horas-ocupadas',
                    type: 'GET',
                    data: {
                        fecha: a
                    },
                    success: function(response) {
                        var horasOcupadas = response;

                        $('button[id^="btn_h"]').removeClass('btn-danger').addClass('btn-success').prop('disabled', false);

                        if (selectedDateFormatted === dateElSalvador) {
                            $('button[id^="btn_h"]').each(function() {
                                var horaBoton = $(this).text().trim();
                                var horaNumero = parseInt(horaBoton.split(':')[0]);

                                if (horaNumero < currentHourElSalvador) {
                                    $(this).removeClass('btn-success').addClass('btn-secondary').prop('disabled', true);
                                } else {
                                    $(this).removeClass('btn-secondary').addClass('btn-success').prop('disabled', false);
                                }
                            });
                        } else {
                            $('button[id^="btn_h"]').removeClass('btn-secondary').addClass('btn-success').prop('disabled', false);
                        }

                        horasOcupadas.forEach(function(hora) {
                            switch (hora) {
                                case '08:00 - 09:00':
                                    $('#btn_h1').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '09:00 - 10:00':
                                    $('#btn_h2').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '10:00 - 11:00':
                                    $('#btn_h3').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '11:00 - 12:00':
                                    $('#btn_h4').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '13:00 - 14:00':
                                    $('#btn_h5').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '14:00 - 15:00':
                                    $('#btn_h6').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '15:00 - 16:00':
                                    $('#btn_h7').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                                case '16:00 - 17:00':
                                    $('#btn_h8').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);
                                    break;
                            }
                        });

                        // Mostrar el modal utilizando Bootstrap 5
                        var modal = new bootstrap.Modal(document.getElementById('modal-reservas'));
                        modal.show();
                    }
                });
            },









            eventClick: function(info) {
                var eventObj = info.event; // Obtenemos el objeto del evento

                if (eventObj.id) { // Verificamos si el evento tiene un ID
                    $.ajax({
                        url: '/citas/detalle',
                        type: 'GET',
                        data: {
                            id: eventObj.id // Pasando el ID del evento
                        },
                        success: function(response) {
                            console.log('Respuesta del servidor:', response);
                            if (response.error) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: response.error
                                });
                            } else {
                                // Mostrar los detalles de la cita en SweetAlert (Swal)
                                Swal.fire({
                                    title: 'Detalles de la Cita',
                                    html: `
                            <div style="text-align: left;">
                                <b>Servicio:</b> ${response.title}<br>
                                <b>Fecha:</b> ${response.fecha}<br>
                                <b>Hora:</b> ${response.hora}<br>
                                <b>Usuario:</b> ${response.usuario}<br><br>
                            </div>
                            <button id="closeModal" class="btn btn-secondary">Cerrar Ventana</button>
                            <button id="deleteCita" class="btn btn-danger">Cancelar Cita</button>
                        `,
                                    showConfirmButton: false
                                });

                                // Código adicional para los botones dentro de SweetAlert
                                document.getElementById('closeModal').addEventListener('click', function() {
                                    Swal.close();
                                });

                                document.getElementById('deleteCita').addEventListener('click', function() {
                                    // Lógica para eliminar la cita...
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
                            Swal.fire('Error', 'Error al cargar los detalles de la cita.', 'error');
                        }
                    });
                } else {
                    console.error('El evento no tiene un ID asignado.');
                    Swal.fire('Error', 'No se puede identificar la cita.', 'error');
                }
            }
















        });

        calendar.render();
    });
</script>




<script>
    $('#btn_h1').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('08:00 - 09:00'); //para input
        //$('#fecha_cita').text(a);//para p
        //$('#hora_cita').text('08:00 - 09:00');//para p
    });
    $('#btn_h2').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('09:00 - 10:00'); //para input
    });
    $('#btn_h3').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('10:00 - 11:00'); //para input
    });
    $('#btn_h4').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('11:00 - 12:00'); //para input
    });
    $('#btn_h5').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('13:00 - 14:00'); //para input
    });
    $('#btn_h6').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('14:00 - 15:00'); //para input
    });
    $('#btn_h7').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('15:00 - 16:00'); //para input
    });
    $('#btn_h8').click(function() {
        $('#modal-reservas').modal('hide');
        $('#modal-formulario').modal('show');
        $('#fecha_cita').val(a); //para input
        $('#hora_cita').val('16:00 - 17:00'); //para input
    });
    $('#regresar').click(function() {
        $('#modal-reservas').modal('show');
        $('#modal-formulario').modal('hide');
    });
</script>
@endsection