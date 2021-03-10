export default {
    doc_path: "https://developers.google.com/maps/documentation/distance-matrix/overview",
    path: "https://maps.googleapis.com/maps/api/distancematrix/json",
    key: "AIzaSyBOOAbjw68Vg_3-Ekk8aZnq0FCgU3FZFQ0",
    origen: {
        address: "Rua Carlos Reis 43, 1600-030",
        lat_log: "38.74350169991781,-9.156249902300909",
        post_code: "1600-030"
    },
    async calc( destino ) {
        let body = {
            units: "imperial",
            origins: this.origen.address,
            destinations: destino,
            key:this.key            
        }
        let salt = `&drivingOptions[departureTime]=${Date.now()}&drivingOptions[trafficModel]=optimistic`
        let param = Object.keys(body).map( indice => `${indice}=${encodeURI(body[indice])}` ).join('&')

        var header = { 
            method: 'GET',
            headers: {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            credentials: 'include',
            mode: 'no-cors',
            cache: 'default' 
        };
        let res = await ( await fetch( `${this.path}?${param}${salt}`, header ) ).json()
        let distance = res?.rows?.elements?.distance?.value
        if(distance) {
            alert( (distance / 1000) + "km")
        } else {
            alert( 'não foi possivel calcular' )
        }
    }
}