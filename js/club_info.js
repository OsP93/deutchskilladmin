const detailsBTN = document.getElementById('details-btn');
const backBTN = document.getElementById('back-btn');
const clubContent = document.querySelector('.club-content');
const clubDetails = document.querySelector('.club-content-details');

const impressum = document.getElementById('impressum');
const datenschutz = document.getElementById('datenschutz');
const agb = document.getElementById('agb');
const impressumClose = document.getElementById('close-impressum');
const datenschutzClose = document.getElementById('close-datenschutz');
const agbClose = document.getElementById('close-agb');
const impressumBTN = document.getElementById('Impressum-BTN');
const datenschutzBTN = document.getElementById('Datenschutz-BTN');
const agbBTN = document.getElementById('AGB-BTN');

function showDetails() {
    clubContent.classList.add('fadeOut');
    clubContent.classList.remove('fadeIn');
    setTimeout(function () {
        clubContent.classList.add('hidden-d');
        clubContent.classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        clubDetails.classList.remove('hidden-d');
        clubDetails.classList.add('fadeIn');
    }, 500);
};

function hidenDetails() {
    clubDetails.classList.add('fadeOut');
    clubDetails.classList.remove('fadeIn');
    setTimeout(function () {
        clubDetails.classList.add('hidden-d');
        clubDetails.classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        clubContent.classList.remove('hidden-d');
        clubContent.classList.add('fadeIn');
    }, 500);
};

//
function showImpressum() {
    document.querySelector(".wrapper").classList.remove('fadeIn');
    document.querySelector(".wrapper").classList.add('fadeOut');
    setTimeout(function () {
        document.querySelector(".wrapper").classList.add('hidden-d');
        document.querySelector(".wrapper").classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        impressum.classList.remove('hidden-d');
        impressum.classList.add('fadeIn');
    }, 500);
};

function hidenImpressum() {
    impressum.classList.add('fadeOut');
    impressum.classList.remove('fadeIn');
    setTimeout(function () {
        impressum.classList.add('hidden-d');
        impressum.classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        document.querySelector(".wrapper").classList.remove('hidden-d');
        document.querySelector(".wrapper").classList.add('fadeIn');
    }, 500);
};
///
//
function showDatenschutz() {
    document.querySelector(".wrapper").classList.remove('fadeIn');
    document.querySelector(".wrapper").classList.add('fadeOut');
    setTimeout(function () {
        document.querySelector(".wrapper").classList.add('hidden-d');
        document.querySelector(".wrapper").classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        datenschutz.classList.remove('hidden-d');
        datenschutz.classList.add('fadeIn');
    }, 500);
};

function hidenDatenschutz() {
    datenschutz.classList.add('fadeOut');
    datenschutz.classList.remove('fadeIn');
    setTimeout(function () {
        datenschutz.classList.add('hidden-d');
        datenschutz.classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        document.querySelector(".wrapper").classList.remove('hidden-d');
        document.querySelector(".wrapper").classList.add('fadeIn');
    }, 500);
};
///
//
function showAGB() {
    document.querySelector(".wrapper").classList.remove('fadeIn');
    document.querySelector(".wrapper").classList.add('fadeOut');
    setTimeout(function () {
        document.querySelector(".wrapper").classList.add('hidden-d');
        document.querySelector(".wrapper").classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        agb.classList.remove('hidden-d');
        agb.classList.add('fadeIn');
    }, 500);
};

function hidenAGB() {
    agb.classList.add('fadeOut');
    agb.classList.remove('fadeIn');
    setTimeout(function () {
        agb.classList.add('hidden-d');
        agb.classList.remove('fadeOut');
    }, 500);

    setTimeout(function () {
        document.querySelector(".wrapper").classList.remove('hidden-d');
        document.querySelector(".wrapper").classList.add('fadeIn');
    }, 500);
};
///

detailsBTN.addEventListener('click', showDetails);
backBTN.addEventListener('click', hidenDetails);

impressumBTN.addEventListener('click', showImpressum);
datenschutzBTN.addEventListener('click', showDatenschutz);
agbBTN.addEventListener('click', showAGB);
impressumClose.addEventListener('click', hidenImpressum);
datenschutzClose.addEventListener('click', hidenDatenschutz);
agbClose.addEventListener('click', hidenAGB);