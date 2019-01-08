function startTime() {
    var date = new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    
    document.getElementById('klok').innerHTML = h+":"+m+":"+s;
    
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 9) { i = i + "0"; }
    return i;
}