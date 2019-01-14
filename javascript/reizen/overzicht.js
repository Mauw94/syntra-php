var travel = [
    {
      "naam": "Strandvakantie Costa del sol",
      "prijs": "4600",
      "typeReis": "Strand",
      "locatie": "Spanje",
      "voorzien": ['airco','all-in','minibar']
    },
    {
      "naam": "Skivakantie Franse Alpen",
      "prijs": "3500",
      "typeReis": "Winter",
      "locatie": "Frankrijk",
      "voorzien": ['airco','all-in','minibar']
    },
    {
      "naam": "Skivakantie Zwitserland",
      "prijs": "3800",
      "typeReis": "Winter",
      "locatie": "Zwitserland",
      "voorzien": ['airco','all-in','minibar']
    },
    {
      "naam": "Roadtrip California",
      "prijs": "8000",
      "typeReis": "Auto",
      "locatie": "USA",
      "voorzien": ['airco','all-in','minibar']
    },
    {
      "naam": "Grexit tour",
      "prijs": "0",
      "typeReis": "Strand",
      "locatie": "Griekenland",
      "voorzien": ['airco','all-in','minibar']
    },
    {
      "naam": "Autovakantie Finland",
      "prijs": "8000",
      "typeReis": "Auto",
      "locatie": "Finland",
      "voorzien": ['airco','all-in','minibar']
    }
  ]

var content = document.getElementById('content');

travel.forEach(function(item) {
    content.innerHTML += "<div class='row'>" +
            "<div class='col-md-3'>" + checkVakantieType(item.typeReis) + "</div>" +
            "<div class='col-md-3'>" + item.naam + "</div>" +
            "<div class='col-md-3'>" + "<button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored'>€ " + 
            item.prijs + "</button>" + "</div>" + 
            "<div class='col-md-3'>" + item.locatie + "</div>" + "</div>";
    
    item.voorzien.forEach(function(itemVoorzien) {
        content.innerHTML += "<li>"+itemVoorzien+"</li>";
    });
    content.innerHTML += "<hr>";
});

function checkVakantieType(type) {
    if (type == "Strand") {
        return "<i class='material-icons' style='color:orange;font-size:60px'>wb_sunny</i>"
    } else if (type == "Auto") {
        return "<i class='material-icons' style='color:blue;font-size:60px'>directions_car</i>"
    } else {
        return "<i class='material-icons' style='color:gray;font-size:60px'>grain</i>"
    }
}
