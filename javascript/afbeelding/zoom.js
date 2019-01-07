var increment = 0;
var afbeelding = 0;
function zoom() {
    var text;
    text = document.getElementById('afbText');
    
    if (afbeelding.style.width == "10%") {
        increment = 1;
        text.innerHTML = "Click to zoom out";
    } 
    if (afbeelding.style.width == "50%") {
        increment = -1;
        text.innerHTML = "Click to zoom in";
    }
    
    var afmeting = parseInt(afbeelding.width);
    afmeting += increment;
    afbeelding.style.width = afmeting + "%";
    afbeelding.style.height = afmeting + "%";

    if (afbeelding.style.width != "10%" && afbeelding.style.width != "50%") {
        var t = setTimeout(zoom, 5);
    }
}
