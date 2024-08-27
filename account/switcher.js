const elem = document.getElementById('lftsdmndvcntntr');
const quoteElem = document.getElementById('mainquotetxt');

const images = [
    '../assets/pexels-joao-gustavo-rezende-15265-68389.jpg',
    '../assets/pexels-sebastians-1276518.jpg',
    '../assets/pexels-podnar2018-1424239.jpg'
];

const quotes = [
    "Power is the beauty of men; beauty is the power of women.",
    "Quality is remembered long after price is forgotten.",
    "Elegance is not standing out, but being remembered."
];

var interval = 3000;
let currentIndex = 0;
let isRunning = true;


const pausplybtn = document.getElementById('pausplybtn');

pausplybtn.addEventListener('click', () => {
    if (isRunning) {
        isRunning = false;
        pausplybtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24"><path fill="white" d="M8 19V5l11 7z"/></svg>'
    } else {
        pausplybtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24"><path fill="white" d="M14 19V5h4v14zm-8 0V5h4v14z"/></svg>'
        isRunning = true
        changeImage();
    }
});
function preloadImage(url) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.src = url;
        img.onload = () => resolve(url);
        img.onerror = reject;
    });
}

async function changeImage() {
    if (!isRunning) return;
    const nextIndex = (currentIndex + 1) % images.length;
    const nextImage = images[nextIndex];
    const nextQuote = quotes[nextIndex];

    await preloadImage(nextImage);

    elem.style.backgroundImage = `url(${nextImage})`;

    setTimeout(() => {
        quoteElem.innerText = nextQuote;
    }, 100);

    currentIndex = nextIndex;

    setTimeout(changeImage, interval);
}

window.addEventListener('DOMContentLoaded', () => {
    changeImage();
});



document.getElementById('login-option').addEventListener('click', function () {
    document.getElementById('toggle-switch').checked = false;
    moveToggleButton();
});

document.getElementById('signup-option').addEventListener('click', function () {
    document.getElementById('toggle-switch').checked = true;
    moveToggleButton();
});

function moveToggleButton() {
    const toggleButton = document.querySelector('.toggle-button');
    const toggleSwitch = document.getElementById('toggle-switch');
    var loginOption = document.getElementById('login-option');
    var signupOption = document.getElementById('signup-option');
    const signupdv = document.getElementById('signupaccmngr')
    const lgindv = document.getElementById('loginaccmngr')
    if (toggleSwitch.checked) {
        toggleButton.style.transform = 'translateX(100%)';
        loginOption.classList.remove('active');
        signupOption.classList.add('active');
        const signupdv = document.getElementById('signupaccmngr')
        lgindv.style.display = 'none'
        signupdv.style.display = 'flex'
        setTimeout(() => {
            signupdv.style.height = '575px'
        }, 100);
        setTimeout(() => {
            signupdv.style.opacity = '100%'
        }, 500);
        if (signupdv.style.height === '575px') {
            signupdv.style.opacity = '100%'
        }
    } else {
        toggleButton.style.transform = 'translateX(0)';
        loginOption.classList.add('active');
        signupOption.classList.remove('active');
        signupdv.style.opacity = '0%'
        setTimeout(() => {
            signupdv.style.height = '274px'
        }, 200);

        setTimeout(() => {
            signupdv.style.display = 'none'
            lgindv.style.display = 'flex'
        }, 700);
    }
}
var loginOption = document.getElementById('login-option');
loginOption.classList.add('active');


mainsginbtn.addEventListener('click', () => {
    console.log('signing in lsr')
})



function getQueryParams() {
    const queryParams = new URLSearchParams(window.location.search);
    return queryParams;
}
window.onload = () => {
    const params = getQueryParams();
    if (params.get('method') === "login") {
        document.getElementById('toggle-switch').checked = false;
        moveToggleButton();
    } else if (params.get('method') === "signup") {
        document.getElementById('toggle-switch').checked = true;
        moveToggleButton();
    } else {
    }
}