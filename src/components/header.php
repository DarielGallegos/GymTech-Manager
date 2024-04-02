<header>
    <nav aria-label="menu nav" class="bg-gray-800  pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="fixed top-0 right-0 w-full bg-gray-800  flex items-center justify-between px-4 py-2 z-5000"> <!-- Contenedor del icono y el logotipo -->
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white"> <!-- Contenedor del logotipo -->
                <a href="index.php" aria-label="Home">
                    <img src="../img/logo1.png" class="h-12 me-2 sm:h-13 text-xl pl-2" id="logo"> <!-- Logotipo -->
                </a>
            </div>
        </div>
        <div class="fixed top-0 right-0 flex items-center justify-between px-4 py-2 z-5000"><!-- Contenedor principal fijo -->
            <ul class="list-reset flex items-center"><!-- Lista de elementos -->
                <li>
                    <div class="relative inline-block"><!-- Contenedor del botón desplegable -->
                        <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2"><!-- Botón desplegable -->
                            <span class="pr-2"><i class="em em-robot_face"></i></span> Hola, <?= $_SESSION['GYM']['alias'] ?> <!-- Icono y texto de usuario -->
                            <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"> <!-- Icono de flecha hacia abajo -->
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                        <!-- Contenido del menú desplegable -->
                        <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                            <!-- Opción del menú -->
                            <a href="./logout.php" class="p-2 bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                <!-- Icono y texto de la opción -->
                                <i class="fas fa-sign-out-alt fa-fw"></i> Salir
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>