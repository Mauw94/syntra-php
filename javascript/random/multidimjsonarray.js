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
console.log(travel);
travel.forEach(function(item) {
console.log(item.naam);
        item.voorzien.forEach(function(itemvoorzien) {
          console.log(itemvoorzien);
          });
  });