<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario con Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/calendario.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <div id="calendar" class="card">
            <div id="month" class="card-header d-flex justify-content-between align-items-center">
                <button id="prev" class="btn btn-primary">Anterior</button>
                <span id="month-name" class="h5 mb-0"></span>
                <button id="next" class="btn btn-primary">Siguiente</button>
            </div>
            <div class="card-body">
                <table id="calendar-body" class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Dom</th>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mié</th>
                            <th>Jue</th>
                            <th>Vie</th>
                            <th>Sáb</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se insertarán los días -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
            <div class="footer">
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <p>© 2024 Polideportivo Santo Domingo Copyright</a></p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <ul class="social_icon">
                                    <li> <a href="https://www.facebook.com/pages/Polideportivo-Santo-Domingo/221359424559175"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const monthNameEl = document.getElementById('month-name');
            const calendarBodyEl = document.getElementById('calendar-body').getElementsByTagName('tbody')[0];
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');

            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();

            function generateCalendar(month, year) {
                const firstDay = new Date(year, month).getDay();
                const daysInMonth = 32 - new Date(year, month, 32).getDate();

                calendarBodyEl.innerHTML = '';
                monthNameEl.textContent = new Date(year, month).toLocaleString('es-ES', {
                    month: 'long',
                    year: 'numeric'
                });

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');

                    for (let j = 0; j < 7; j++) {
                        if (i === 0 && j < firstDay) {
                            const cell = document.createElement('td');
                            row.appendChild(cell);
                        } else if (date > daysInMonth) {
                            break;
                        } else {
                            const cell = document.createElement('td');
                            cell.textContent = date;
                            row.appendChild(cell);
                            date++;
                        }
                    }

                    calendarBodyEl.appendChild(row);
                }
            }

            prevBtn.addEventListener('click', () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            nextBtn.addEventListener('click', () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            generateCalendar(currentMonth, currentYear);
        });
    </script>
</body>

</html>