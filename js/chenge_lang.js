let dialog1 = document.getElementById('dialog1');
let dialog2 = document.getElementById('dialog2');
let dialog3 = document.getElementById('dialog3');

function headerAnimation() {
    dialog1.classList.remove('fadeInRight');
    dialog1.classList.add('hidden');

    dialog2.classList.remove('fadeInLeft');
    dialog2.classList.add('hidden');

    dialog3.classList.remove('fadeInRight');
    dialog3.classList.add('hidden');

    setTimeout(function () {
        dialog1.classList.remove('hidden');
        dialog1.classList.add('fadeInRight');
    }, 500);

    setTimeout(function () {
        dialog2.classList.remove('hidden');
        dialog2.classList.add('fadeInLeft');
    }, 2000);

    setTimeout(function () {
        dialog3.classList.remove('hidden');
        dialog3.classList.add('fadeInRight');
    }, 3000);
    console.log('blablabla');
};

// add to url selected lang.
const select = document.querySelectorAll('select')[0];
const mobileSelect = document.querySelectorAll('select')[1];
const allLang = ['ru', 'ua', 'de']


select.addEventListener('change', changeURLAdress);
mobileSelect.addEventListener('change', changeURLAdressPhone);
//select.forEach((changeLng) => changeLng.addEventListener('change', changeURLAdress));
function changeURLAdress() {
    let lang = select.value;
    location.href = window.location.pathname + '#' + lang;
    console.log(lang);
    changeLanguage();

    //location.reload();
};
changeURLAdress();//test

function changeURLAdressPhone() {
    let langPhone = mobileSelect.value;
    location.href = window.location.pathname + '#' + langPhone;
    console.log(langPhone);
    changeLanguagePhone();
    //location.reload();
};
changeURLAdressPhone();//test


// change language
function changeLanguage() {
    let hash = window.location.hash;
    hash = hash.substring(1);
    if (!allLang.includes(hash)) {
        location.href = window.location.pathname + '#ru';
        //location.reload();
    }

    select.value = hash;
    //document.querySelector('.header-description').innerHTML = langArr['head'][hash];
    for (let key in langArr) {
        let elem = document.querySelector('.lng-' + key);
        if (elem) {
            elem.innerHTML = langArr[key][hash];
        }
    }
    headerAnimation();
};

function changeLanguagePhone() {
    let hash = window.location.hash;
    hash = hash.substring(1);
    if (!allLang.includes(hash)) {
        location.href = window.location.pathname + '#ru';
    }

    mobileSelect.value = hash;
    for (let key in langArr) {
        let elem = document.querySelector('.lng-' + key);
        if (elem) {
            elem.innerHTML = langArr[key][hash];
        }
    }

};

changeLanguage();
changeURLAdressPhone();
