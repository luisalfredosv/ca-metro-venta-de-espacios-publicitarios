<?php  
$niv_user = $_SESSION['niv_user'];
require_once "sql/conexion.php";


        $sql = "SELECT * FROM menu WHERE tipo ='1' GROUP BY titulo ORDER BY id";
        $result = $mysqli->query($sql);
        $menu = '';
        if ($result->num_rows > 0) {
        ?>
        <nav class="nbardemenu navbar navbar-dark bg-dark navbar-expand-lg fixed-top" role="navigation">
            <a class="navbar-brand" href="inicio">
                <img src="img/logo.png" width="28" height="28" class="d-inline-block align-top" alt="">
            Espacios Publicitarios            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
        <?php 
                    $menu = "";
                    $sql3 = "SELECT * FROM menu WHERE tipo ='2' ORDER BY id";
                    $result3 = $mysqli->query($sql3);
                    $menu = '';
                    if ($result3->num_rows > 0) {
                        while($row3 = $result3->fetch_assoc()) {

                            $menu .= '<li class="nav-item active"><a class="nav-link" href="'.$row3["url"].'">'.ucfirst($row3["nombre"]).' <span class="sr-only">(current)</span></a></li>';
                        }
                    }

            while($row = $result->fetch_assoc()) {

            $menu .='<li class="nav-item dropdown">';
            $menu .='<a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.ucfirst($row["titulo"]).'</a>';
            $menu .='  <div class="dropdown-menu" aria-labelledby="">';
            $titulo = $row["titulo"];
            $sql2 = "SELECT * FROM menu WHERE titulo = '$titulo' AND tipo ='1' GROUP BY nombre ORDER BY id";
            $result2 = $mysqli->query($sql2);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                $menu .='<a class="dropdown-item" href="'.$row2["url"].'">'.ucfirst($row2["nombre"]).'</a>';
                }
            }



        $menu .='</div>';
        $menu .='</li>';


            }
        }

    print_r($menu);
    ?>
            </ul>   
            <ul class="navbar-nav ml-auto">
    <?php 
    if ($niv_user == 1 ) {
    ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['user']) ?></a>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  id="usr" href="log_out.php">Cerrar Sesión</a>
                <?php 
                $sql4 = "SELECT * FROM menu WHERE tipo ='3' GROUP BY nombre ORDER BY id";
                    $result4 = $mysqli->query($sql4);
                    if ($result4->num_rows > 0) {
                        while($row4 = $result4->fetch_assoc()) {
                        echo '<a class="dropdown-item" href="'.$row4["url"].'">'.ucfirst($row4["nombre"]).'</a>';
                        }
                    }
                ?>

            </div>
        </li>
    <?php
    }else{
    ?>
    <a class="btn btn-sm btn btn-outline-danger" style="height: 32px; margin-top: 4px" id="usr" href="log_out.php"><?php echo strtoupper($_SESSION['user']) ?></a>
    <?php
    }
    ?>          
                


            </ul>
          </div>
        </nav>
      <br>
    <br>

