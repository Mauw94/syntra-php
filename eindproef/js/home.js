function showClock() {
    var date = new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    
    document.getElementById('clock').innerHTML = h+":"+m+":"+s;
    
    var t = setTimeout(showClock, 500);
}

function checkTime(i) {
    if (i < 10) { i = "0" + i; }
    return i;
}