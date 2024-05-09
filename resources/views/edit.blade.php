<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Dashboard</title>
    <meta name="author" content="Oscar M Alvarez G">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <a href="/new" rel="noopener noreferrer">
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Nuevo Documento
                </button>
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="/" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
        </nav>
        <a href="/" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Upgrade to Pro!
        </a>
    </aside>
    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Creating data</h1>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Create Documents
                        </p>
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl" id="forms">
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="estado">Estado</label>
                                    {{-- <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="estado" name="estado" type="text" required="" placeholder="Your Email" aria-label="estado"> --}}
                                    <select class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="estadoSelector" name="estado">
                                        <option value="0" disabled selected>Selecciona una opcion</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="email">Id Numeracion</label>
                                    <select class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="numeracionSelector" name="idNumeracion">
                                        <option value="0" disabled selected>Selecciona una opcion</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="numero">Numero</label>
                                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="numero" name="numero" type="number" required placeholder="Write an unique number" aria-label="numero">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="base">Base</label>
                                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="base" name="base" type="number" required placeholder="write the base" aria-label="base">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="impuestos">Impuestos</label>
                                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="impuestos" name="impuestos" type="number" required placeholder="write the impuestos" aria-label="impuestos">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="fecha">Fecha</label>
                                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="fecha" name="fecha" type="date" required placeholder="write the impuestos" aria-label="fecha">
                                </div>
                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Checkout Form
                        </p>
                        <div class="leading-loose">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">id</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">idestado</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">idnumeracion</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">numero</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">base</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">impuestos</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">fecha</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">created_at</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">updated_at</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 tbodyTable">
                                </tbody>
                            </table>
                        </div>
                        <p class="pt-6 text-gray-600">
                            Source: <a class="underline" href="https://tailwindcomponents.com/component/checkout-form">https://tailwindcomponents.com/component/checkout-form</a>
                        </p>
                    </div>
                </div>
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>

    </div>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    // Esperar a que el documento esté listo
    $(document).ready(function() {
        // Realizar la solicitud fetch al endpoint
        $.getJSON('http://127.0.0.1:8000/api/documents')
            .done(function(data) {
                // Obtener la referencia al tbody de la tabla
                const $tbody = $('.tbodyTable');

                // Limpiar el contenido existente del tbody (opcional)
                $tbody.empty();

                // Iterar sobre los datos y crear filas para la tabla
                $.each(data, function(index, item) {
                    const $row = $('<tr>');
                    $row.html(`
                        <td class="w-1/3 text-left py-3 px-4">${item.id}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.idestado}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.idnumeracion}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.numero}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.base}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.impuestos}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.fecha}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.created_at}</td>
                        <td class="w-1/3 text-left py-3 px-4">${item.updated_at}</td>
                    `);
                    $tbody.append($row);
                });
            })
            .fail(function(error) {
                console.error('Fetch error:', error);
            });
    });
</script>

<script>
    $(document).ready(function() {
    const selector = $('#estadoSelector');

    $.ajax({
        url: 'http://127.0.0.1:8000/api/estados',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            data.forEach(opcion => {
                const option = $('<option></option>');
                option.val(opcion.id);
                option.text(opcion.descripcion);
                selector.append(option);
            });
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.error('Fetch error:', error);
        }
    });
    });

</script>
<script>
    $(document).ready(function() {
    const selector = $('#numeracionSelector');

    $.ajax({
        url: 'http://127.0.0.1:8000/api/numeracion',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            data.forEach(opcion => {
                const option = $('<option></option>');
                option.val(opcion.id);
                option.text(opcion.prefijo);
                selector.append(option);
            });
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.error('Fetch error:', error);
        }
    });
    });

</script>

<script>
    $(document).ready(function() {
    $('#forms').on('submit', function(e) {
        e.preventDefault();
        const estado = $('select[name="estado"]').val();
        const idNumeracion = $('select[name="idNumeracion"]').val();
        const numero = $('input[name="numero"]').val();
        const base = $('input[name="base"]').val();
        const impuestos = $('input[name="impuestos"]').val();
        const fecha = $('input[name="fecha"]').val();
        console.log(e.originalEvent.submitter.id);
        if (parseFloat(impuestos) > parseFloat(base)) {
            alert("Los impuestos no pueden ser mayores que la base");
            location.reload();
        } else {
            var ids = e.originalEvent.submitter.id;
            const url = `http://127.0.0.1:8000/api/documents/${ids}`;

            const data = {
                idnumeracion: parseInt(idNumeracion),
                numero: parseInt(numero),
                base: parseFloat(base),
                impuestos: parseFloat(impuestos),
                idestado: parseInt(estado),
                fecha: fecha
            };

            console.log(data, 'a');

            $.ajax({
                url: url,
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    console.log('Respuesta del servidor:', response);
                    alert('Documento modificado satisfactoriamente');
                        $('select[name="estado"]').val(0);
                        $('select[name="idNumeracion"]').val(0);
                        $('input[name="numero"]').val("");
                        $('input[name="base"]').val("");
                        $('input[name="impuestos"]').val("");
                        $('input[name="fecha"]').val("");
                        location.href = '/';
                    if (response.status == 201 || response.status == 200) {
                        alert('Documento modificado satisfactoriamente');
                        $('select[name="estado"]').val(0);
                        $('select[name="idNumeracion"]').val(0);
                        $('input[name="numero"]').val("");
                        $('input[name="base"]').val("");
                        $('input[name="impuestos"]').val("");
                        $('input[name="fecha"]').val("");
                        location.reload();
                    }
                },
                error: function(error) {
                    console.error('Hubo un problema con la solicitud ajax:', error);
                }
            });
        }

        console.log(estado);
        console.log(idNumeracion);
        console.log(numero);
        console.log(base);
        console.log(impuestos);
        console.log(fecha);
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        // Obtener el elemento del localStorage
        const elemento = localStorage.getItem('infor');
        var info;

        // Verificar si el elemento existe en el localStorage
        if (elemento) {
        // Mostrar el elemento en la consola
        console.log('Elemento encontrado:', elemento);
        info = JSON.parse(elemento);
        let datas = info.data;
        console.log(datas);

        document.querySelector('select[name="estado"]').value = datas.idestado;
        document.querySelector('select[name="idNumeracion"]').value = datas.idnumeracion;
        document.querySelector('input[name="impuestos"]').value = datas.impuestos;
        document.querySelector('input[name="numero"]').value = datas.numero;
        document.querySelector('input[name="base"]').value = datas.base;
        document.querySelector('input[name="fecha"]').value = datas.fecha;
        console.log(datas.idestado);
        var boton = document.querySelector(".px-4.py-1.text-white.font-light.tracking-wider.bg-gray-900.rounded[type='submit']");
        boton.id = datas.id;
        console.log(boton);
        // Eliminar el elemento del localStorage
        localStorage.removeItem('infor');
        console.log('Elemento eliminado del localStorage.');
        } else {
        console.log('El elemento no existe en el localStorage.');
        }
    });
</script>
</body>
</html>
