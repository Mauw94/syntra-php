function getAantalVerkochteArtikelen() {
    var aantalVerkochteArtikelen = document.getElementsByClassName("artikelen")
    return (document.getElementById('aantalArt').value = aantalVerkochteArtikelen.length)
  }

  function getAantalVerkochteArtikelenCount() {
    var aantalVerkochteArtikelen = document.getElementsByClassName("artikelen")
    return aantalVerkochteArtikelen.length
  }

   function addArtikelFields() {
    var count = getAantalVerkochteArtikelenCount() + 1
    
    var form = document.getElementById('form-input')
    var newDiv = document.createElement('div');
    newDiv.setAttribute('class', 'form-group artikelen')
    
    var input = document.createElement('input')
    input.setAttribute('type', 'text')
    input.setAttribute('class', 'form-control')
    input.setAttribute('placeholder', 'artikel naam')
    input.setAttribute('name', 'verkochte' + count)
    input.setAttribute('id', 'verkochte' + count)

    var label = document.createElement('label')
    label.innerHTML = 'Verkochte museumshop artikelen'

    var inputBedrag = document.createElement('input')
    inputBedrag.setAttribute('type', 'text')
    inputBedrag.setAttribute('class', 'form-control')
    inputBedrag.setAttribute('placeholder', 'bedrag')
    inputBedrag.setAttribute('name', 'bedrag' + count)
    inputBedrag.setAttribute('id', 'bedrag' + count)

    var labelGepind = document.createElement('label')
    labelGepind.innerHTML = 'Gepind'

    var inputGepind = document.createElement('input')
    inputGepind.setAttribute('type', 'checkbox')
    inputGepind.setAttribute('class', 'form-control')
    inputGepind.setAttribute('name', 'gepind' + count)
    inputGepind.setAttribute('id', 'gepind' + count)

    newDiv.append(label)
    newDiv.appendChild(input)
    newDiv.appendChild(inputBedrag)
    newDiv.appendChild(labelGepind)
    newDiv.appendChild(inputGepind)
    form.appendChild(newDiv)
  }

function startTime() {
    var date =  new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    
    document.getElementById('clock').innerHTML = 
        h+":"+m+":"+s;
    var t = setTimeout(startTime, 500);
    
}

function checkTime(i) {
    if (i < 10) { i = "0" + i; }
    return i;
}
