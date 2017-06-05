<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="/transmivyca"><img src="../views/images/logo.png" class="img-responsive" width="150"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="administrator.php">Inicio</a></li>                        
                        <li><a href="clientes.php">Clientes</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Choferes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="chofer.php">Ver Choferes</a></li>
                                <li><a href="asignar-chuto.php">Asignar</a></li>
                            </ul>
                        </li>
                        <li><a href="chutos.php">Chutos</a></li>
                        <li><a href="bateas.php">Bateas</a></li>
                        <li><a href="destinos.php">Destinos</a></li>
                        <li><a href="mantenimiento-chuto.php">Mantenimiento de Chuto</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Viajes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="asignar-viaje.php">Asignar</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_session']; ?>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                
                                <?php 
                                if ($_SESSION['privilegio'] == "administrador") { ?>
                                    
                                    <li><a href="registro-usuario.php"><span class="glyphicon glyphicon-eye-open"></span> Administrar Usuario</a></li>

                                    <li><a href="../controllers/logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
                                
                                <?php
                                } else { ?>
                                
                                    <li><a href="../controllers/logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
                                    
                                <?php } ?>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>