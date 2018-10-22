<?PHP
// db credentials
$host="localhost";
$user="root";
$passwd="";
$database="klasdb";

//db connectie
$con = mysqli_connect($host,$user,$passwd,$database);
if($con) {
    echo "verbinding succesvol";
} else {
    echo "database fout";
}
?>