// Locations permissions
let autoLocation = null
let autoLocationLink = null
let autoLocationLoading = null
let locationLinks = null
let locationLinksActive = null

function setAutoLocation () {
    // console.warn('@setAutoLocation()');
    locationLinksActive = document.querySelectorAll('.link--active')
    locationLinksActive.forEach(link => {
        link.classList.add('link--hide')
    })
    
    locationLinks = document.querySelectorAll('.link--default')
    locationLinks.forEach(link => {
        link.classList.remove('link--hide')
        link.addEventListener('click', function() {
            autoLocation = link.parentElement.getElementsByClassName('link--active')[0]
            handleLocationPermission()
        })
    })
}

function setStatusPermission(state) {
    // console.warn('@setStatusPermission(state)', state);
    switch (state) {
        case 'granted':
        case 'prompt':
            locationLinks.forEach(link => {
                link.classList.remove('link--error', 'link--blocked', 'link--disabled')
                link.classList.add('link--hide')
            })
            locationLinksActive.forEach(link => {
                link.classList.remove('link--hide')
                // link.classList.add('link--disabled')
            })
            break;
        case 'denied':
            locationLinks.forEach(link => {
                link.classList.remove('link--error', 'link--blocked', 'link--disabled')
                link.classList.add('link--blocked')
            })
            break;
        case 'disabled':
            locationLinks.forEach(link => {
                link.classList.remove('link--error', 'link--blocked', 'link--disabled')
                link.classList.add('link--disabled')
            })
            break;
        default:
            locationLinks.forEach(link => {
                link.classList.remove('link--error', 'link--blocked', 'link--disabled')
                link.classList.add('link--error')
            })
            break;
    }
}

function handleLocationPermission() {
    // console.warn('@handleLocationPermission()');
    setStatusPermission('disabled');

    navigator.geolocation.getCurrentPosition(
        successCoordinates,
        tryWithPermissions
    );
}

function tryWithPermissions() {
    // console.warn('@tryWithPermissions()');
    if ("permissions" in navigator) {
        navigator.permissions.query({ name: "geolocation" }).then((result) => {
            if (result.state == "granted" || result.state == "prompt") {
                setStatusPermission(result.state)
    
                navigator.geolocation.getCurrentPosition(
                    successCoordinates,
                    errorCoordinates
                );
            } else if (result.state == "denied") {
                setStatusPermission(result.state)
            }
            
            result.addEventListener("change", function () {
                setStatusPermission(result.state)
            });
        });
    }
}

function errorCoordinates(err) {
    // console.warn('@errorCoordinates(err)', err);
    locationLinksActive.forEach(link => {
        link.classList.remove('link--error', 'link--disabled')
        link.classList.add('link--error')
    })
    console.error('Autolocation:', err);
}

let successCoordinates = function (position) {
    // console.warn('@successCoordinates(position)', position.coords);
    let { latitude, longitude } = position.coords
    localStorage.setItem('location_coordinates', JSON.stringify({
        latitude,
        longitude
    }));
    
    if (autoLocation) autoLocation.click()
    if (autoLocationLink) window.location.href = autoLocationLink;
}

window['handleAutoLocation'] = function (route) {
    // console.warn(`@handleAutoLocation(route)`, route);
    autoLocationLink = route
    
    if (localStorage.getItem('location_coordinates')) {
        window.location.href = route;
    } else {
        navigator.geolocation.getCurrentPosition(
            successCoordinates,
            errorCoordinates
        );
    }
}

function initAutoLocation() {
    document.addEventListener("DOMContentLoaded", function() {
        setAutoLocation()
    })
}
// End Locations permissions