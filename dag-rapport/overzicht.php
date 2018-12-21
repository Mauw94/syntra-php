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
                $sql = "SELECT * FROM rapport";
                $result = mysqli_query($con, $sql);                
                ?>
                <div>
                <h2 class="mb-4">Rapporten</h2>
                    <table id="overzicht" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Dag</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Bezoekers</th>                
                            <th scope="col">Omzet</th>
                            <th scope="col">Telefoonboodschappen</th>
                            <th scope="col">Bijzonderheden</th>
                            <th>Verkochten artikelen</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($output = mysqli_fetch_assoc($result)) {
                        $datum = $output['datum'];
                        $sqlVerkopen = "SELECT * from verkochte_artikelen WHERE datum = '$datum'";
                        $resultVerkopen = mysqli_query($con, $sqlVerkopen);
                        echo '<tr>';
                        echo '<td>' . $output['dag'].'</td>';
                        echo '<td>' . $output['datum'].'</td>';
                        echo '<td>' . $output['bezoekers'].'</td>';
                        echo '<td>' . $output['omzet'].'</td>';
                        echo '<td>' . $output['telefoonboodschap'].'</td>';
                        echo '<td>' . $output['bijzonderheden'].'</td>';
                        if (mysqli_num_rows($resultVerkopen) != 0) {
                            echo '<td><a href="artikelen_by_date.php?date='.$datum.'"><button class="btn btn-primary">Bekijk</button></a></td>';
                        } else {
                            echo '<td>Geen verkopen</td>';
                        }
                    }
                    ?>
                    </tbody>
                    </table>
                </div>                
                </div>
    </section>