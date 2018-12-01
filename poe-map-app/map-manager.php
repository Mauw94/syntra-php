<?php

include "poeMap.php";

class MapManager {

    public $poeMaps = array();
    public $poeMapsByTier = array();
    public $poeMapsUnique = array();
    private $con;

    /*
    *   Include the db connection in the constructor
    */
    function __construct($con)
    {
        $this->con = $con;
        $this->getMapDataFromDb();
        if (empty($this->poeMaps)) {
            $this->popuplateMapArrayFromJson();
        } else {
            echo "Database contains: " . count($this->poeMaps) . " maps.";
        }
    }

    /*
    *   Check if the poeMaps Array is empty
    *   If so then get the json data and populate it
    *   After the array is filled all the data will be uploaded to the database
    */
    private function popuplateMapArrayFromJson() {
        $json = file_get_contents('map-data.json');
        $json = json_decode($json);
        
        for ($i = 0; $i < count($json->list); $i++) {
            $name = $json->list[$i]->name;
            $tier = $json->list[$i]->tier;
            $isUnique = $json->list[$i]->isUnique;
            $level = $json->list[$i]->level;
            $isOnAtlas = $json->list[$i]->isOnAtlas;
            $poeMap = new PoeMap($name, $tier, $isUnique, $level, $isOnAtlas);
            $this->poeMaps[$i] = $poeMap;
        }
        echo 'done <br>';
        foreach ($this->poeMaps as $map) {
            $name =  $map->name;
            $tier = $map->tier;
            $isUnique = $map->isUnique;
            $level = $map->level;
            $isOnAtlas = $map->isOnAtlas;
            $sql = "INSERT INTO maps VALUES (NULL, '$name', '$tier', '$isUnique', '$level', '$isOnAtlas')";
            if (mysqli_query($this->con, $sql)) {
                echo 'added <br>';
            } else {
                echo 'error adding file';
            }
        }         
    }

    /*
    *   Get all the maps from the database
    *   Store them in the poeMaps array
    */
    private function getMapDataFromDb() {
        $counter = 0;
        $sql = "SELECT * FROM maps";
        $result = mysqli_query($this->con, $sql);
        while ($output = mysqli_fetch_assoc($result)) {
            $name = $output['name'];
            $tier = $output['tier'];
            $isUnique = $output['isUnique'];
            $level = $output['level'];
            $isOnAtlas = $output['isOnAtlas'];
            $poeMap = new PoeMap($name, $tier, $isUnique, $level, $isOnAtlas);
            $this->poeMaps[$counter] = $poeMap;
            $counter++;
        }
    }

    /*
    *   Get all the maps by a specific tier
    *   Return an array of poemap objects
    */
    public function getMapsByTier($tier) {
        $counter = 0;
        $this->poeMapsByTier = null;
        $sql = "SELECT * FROM maps WHERE tier = '$tier'";
        $result = mysqli_query($this->con, $sql);
        while ($output = mysqli_fetch_assoc($result)) {
            $name = $output['name'];
            $tier = $output['tier'];
            $isUnique = $output['isUnique'];
            $level = $output['level'];
            $isOnAtlas = $output['isOnAtlas'];
            $poeMap = new PoeMap($name, $tier, $isUnique, $level, $isOnAtlas);
            $this->poeMapsByTier[$counter] = $poeMap;
            $counter++;
        }
        return $this->poeMapsByTier;
    }

    /*
    *   Get all the unique maps from db
    */
    public function getAllUniqueMaps() {
        $counter = 0;
        $this->poeMapsUnique = null;
        $sql = "SELECT * FROM maps WHERE isUnique = '1'";
        $result = mysqli_query($this->con, $sql);
        // print_r($result);
        while ($output = mysqli_fetch_assoc($result)) {
            $name = $output['name'];
            $tier = $output['tier'];
            $isUnique = $output['isUnique'];
            $level = $output['level'];
            $isOnAtlas = $output['isOnAtlas'];
            $poeMap = new PoeMap($name, $tier, $isUnique, $level, $isOnAtlas);
            $this->poeMapsUnique[$counter] = $poeMap;
            $counter++;
        }
        return $this->poeMapsUnique;
    }    
}
  
?>