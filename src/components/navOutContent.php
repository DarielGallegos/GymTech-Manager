<div class="flex flex-col md:flex-row">
     <nav aria-label="alternative nav">
        <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center"><!--OPCIONES-->
           <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
              <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                 <li class="mr-3 flex-1">
                    <a href="../.././src/index.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                       <i class="fas fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Inicio</span>
                    </a>
                 </li>
                  <!-- Creacion Modulo Clientes -->
                  <?php if($_SESSION['GYM']['clientes']>0){?>
                 <li class="mr-3 flex-1">
                    <a href="./registroClientes.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                       <i class="fa fa-user pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Clientes</span>
                    </a>
                 </li>
                 <?php }?>
                 <!-- Fin Creacion Modulo Clientes -->
                 <!-- Creacion Modulo Facturacion -->
                 <?php if($_SESSION['GYM']['facturacion']>0){?>
                 <li class="mr-3 flex-1">
                    <a href="./facturacion.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                       <i class="fa fa-file pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Facturación</span>
                    </a>
                 </li>
                 <?php }?>
                 <!-- Fin Creacion Modulo Facturacion -->
                 <!-- Creacion Modulo Reportes -->
                 <?php if($_SESSION['GYM']['reporteria']>0){?>
                 <li class="mr-3 flex-1">
                    <a href="./reportes.php" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                       <i class="fa fa-chart-bar pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Reportes</span>
                    </a>
                 </li>
                 <?php }?>
                 <!-- Fin Creacion Modulo Reportes -->
                 <!-- Creacion Modulo Administracion -->
                 <?php if($_SESSION['GYM']['administracion']>0){?>
                 <li class="mr-3 flex-1 relative">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600" onclick="toggleSubMenu('administrar')">
                       <i class="fas fa-cogs pr-0 md:pr-3"></i>
                       <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Administración</span>
                    </a>
                    <div id="administrar" class="absolute bg-gray-400 py-2 rounded shadow-md hidden mt-2 z-10">
                        <?php if($_SESSION['GYM']['administracion']>=1){?>
                       <a href="./clientes.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Clientes</a>
                       <a href="./planes.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Planes</a>
                       <?php }?>
                       <?php if($_SESSION['GYM']['administracion']>=2){?>
                       <a href="./empleados.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Empleados</a>
                       <?php }?>
                       <?php if($_SESSION['GYM']['administracion']>=3){?>
                       <a href="./usuarios.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Usuarios</a>
                       <?php }?>
                    </div>
                 </li>
                 <?php }?>
                 <!-- Fin Creacion Modulo Administracion -->
              </ul>
           </div>
        </div>
     </nav>

  </div>