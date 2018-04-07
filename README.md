# Testing

## CURL

    $ curl -X POST http://127.0.0.1:8000/api/v1/location/create --data "city=Porto" --data "country=portugal"

# Užduotis

    - Location įjungimas/išjungimas
    +- Pridėti property location.status
    +- Galimos reikšmės: enabled|disabled
    +- Endpoint: POST /api/v1/location/{id}/toggle
    - CLI komanda: bin/console location:toggle <id>
    - Testai API endpoint
    - Testai CLI komandai

 
# Užduotis #2

    - Autorizavimas pagal access token
    - Access token saugomi duomenų bazėje
    - Klientas access token paduoda per headerius
    - Be tokeno - neleisti prieigos prie API metodų
    - Rodyti /api/doc dokumentaciją be access token
