async function getVisitorGeoData(ip){
    const response = await fetch(`https://geolocation-db.com/json/a9e48c70-8b22-11ed-8d13-bd165d1291e3/${ip}`)

    if( !response.ok )
        throw response
    
    const geoData = await response.json();
    return geoData;
}

async function getVisitorCountry(ip){
    const country = await getVisitorGeoData(ip).then(({country_code}) => country_code)
    return country 
}

async function isVisitorInItsCountry(ip, countryCode){
    
    const _countryCode = countryCode.toUpperCase()
    const geoIpCountry = await getVisitorCountry(ip)

    return _countryCode == geoIpCountry;
}

(function(w){
    "function" == typeof define && define.amd ? define(function() {
        return isVisitorInItsCountry
    }) : "object" == typeof module && module.exports ? module.exports = isVisitorInItsCountry : w.isVisitorInItsCountry = isVisitorInItsCountry

    "function" == typeof define && define.amd ? define(function() {
        return getVisitorCountry
    }) : "object" == typeof module && module.exports ? module.exports = getVisitorCountry : w.getVisitorCountry = getVisitorCountry
})(window)