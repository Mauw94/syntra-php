<?php
include 'header.php';
include 'db/db.php';
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Rapport</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="overzicht.php">Overzicht</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="artikelen.php">Verkochte artikelen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section id="rapport" class="about-section text-center">
    <div class="container context">
        <hr>
        <?php
                $sql = "SELECT * FROM verkochte_artikelen";
                $result = mysqli_query($con, $sql);
                ?>
                <div>
                    <h2>Verkochte artikelen</h2>
                    <table id="overzicht" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Bedrag</th>
                            <th scope="col">Contant/pin</th>                
                            <th scope="col">Datum</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($output = mysqli_fetch_assoc($result)) {
                        if ($output['contant/pin'] == '') {
                            $contantpin = 'Contant';
                        } else {
                            $contantpin = 'Gepind';
                        }
                        echo '<tr>';
                        echo '<td>' . $output['naam'].'</td>';
                        echo '<td>' . $output['bedrag'].'</td>';
                        echo '<td>' . $contantpin.'</td>';
                        echo '<td>' . $output['datum'].'</td>';
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                </div>
    </section>