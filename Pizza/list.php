<?php include 'conn.php' ?>
<?php
$query = "SELECT * FROM bestelling";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
          // echo "Naam: ".$row['naam']." Geboortedatum: ".$row['gebdat']." type: ".$row['type']."<br>";
       ?> 
          <form action="update.php" method="post">
          <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
          <input type="text" name="naam" value=<?php echo $row['naam'] ?>> 
          <input type="text" name="adres" value=<?php echo $row['adres'] ?>> 
          <input type="text" name="gemeente" value=<?php echo $row['gemeente'] ?>> 
          <input type="text" name="email" value=<?php echo $row['email'] ?>> 
          <input type="number" name="aantal" value=<?php echo $row['aantal'] ?>> 
          <?php if ($row['payment'] == 1){
          ?> <input type="text" name="Betaling" value="OK"> <?php
          }else{ ?> <input type="text" name="Betaling" value="NIET OK">
          <?php  
          } ?>                
          <input type="text" name="Tijdstip" value=<?php echo $row['tijdstip'] ?>>
          <input type="text" name="Tijd" value=<?php echo $row['tijd'] ?>>  
          <input type="text" name="Totaal EUR" value=<?php echo ($row['aantal']*10)+2.5 ?>>  
          <input type="submit" name="submit" value="Bijwerken">
          <br>
          </form>
          <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
          <form action="delete.php" method="post">
          <input type="submit" name="submit" value="Verwijderen">
          </form>
      <?php
       
       
               }
}
mysqli_close($conn);
?>