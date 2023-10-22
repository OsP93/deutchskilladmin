// add listener 'onclick' on all ellements with s-btn class (Пізніше переробити на делегування)

const buttons = document.querySelectorAll(".s-btn");
const closeBtn = document.querySelector(".close-form");
const closeBtnB = document.querySelector(".close-form-b")
const buyBtn = document.querySelector(".b-btn");
const buyBtn2 = document.querySelector(".b-btn2");

for (var i = 0; i < buttons.length; i++) {
    buttons[i].onclick = function () {
        document.querySelector(".wrapper").classList.remove('fadeIn');
        document.querySelector(".wrapper").classList.add('fadeOut');
        setTimeout(function () {
            document.querySelector(".wrapper").classList.add('hidden-d');
            document.querySelector(".wrapper-form").classList.remove('hidden-d');
            document.querySelector(".wrapper-form").classList.add('fadeIn');
            document.querySelector(".wrapper").classList.remove('fadeOut');
        }, 500);
    };
}

// buyBtn.addEventListener('click', function () {
//     document.querySelector(".wrapper").classList.add('hidden-d');
//     document.querySelector(".wrapper-buying").classList.remove('hidden-d');
// })

// buyBtn.addEventListener('click', function () {
//     document.querySelector(".wrapper").classList.remove('fadeIn');
//     document.querySelector(".wrapper").classList.add('fadeOut');
//     setTimeout(function () {
//         document.querySelector(".wrapper").classList.add('hidden-d');
//         document.querySelector(".wrapper-buying").classList.remove('hidden-d');
//         document.querySelector(".wrapper-buying").classList.add('fadeIn');
//         document.querySelector(".wrapper").classList.remove('fadeOut');
//     }, 500);
// })

// buyBtn2.addEventListener('click', function () {
//     document.querySelector(".wrapper").classList.remove('fadeIn');
//     document.querySelector(".wrapper").classList.add('fadeOut');
//     setTimeout(function () {
//         document.querySelector(".wrapper").classList.add('hidden-d');
//         document.querySelector(".wrapper-buying").classList.remove('hidden-d');
//         document.querySelector(".wrapper-buying").classList.add('fadeIn');
//         document.querySelector(".wrapper").classList.remove('fadeOut');
//     }, 500);
// })

closeBtn.addEventListener('click', function () {
    document.querySelector(".wrapper-form").classList.remove('fadeIn');
    document.querySelector(".wrapper-form").classList.add('fadeOut');
    setTimeout(function () {
        document.querySelector(".wrapper-form").classList.add('hidden-d');
        document.querySelector(".wrapper").classList.remove('hidden-d');
        document.querySelector(".wrapper").classList.add('fadeIn');
        document.querySelector(".wrapper-form").classList.remove('fadeOut');
    }, 500);
})

closeBtnB.addEventListener('click', function () {
    document.querySelector(".wrapper-buying").classList.remove('fadeIn');
    document.querySelector(".wrapper-buying").classList.add('fadeOut');
    setTimeout(function () {
        document.querySelector(".wrapper-buying").classList.add('hidden-d');
        document.querySelector(".wrapper").classList.remove('hidden-d');
        document.querySelector(".wrapper").classList.add('fadeIn');
        document.querySelector(".wrapper-buying").classList.remove('fadeOut');
    }, 500);
})

// send msg to mail and tg-chat
document.getElementById('submit-btn').addEventListener('click', function () {
    console.log('hello!')
    //send to tg-chat------
    var formName = document.getElementById('form-name').value;
    var formMail = document.getElementById('form-mail').value;
    var formPhone = document.getElementById('form-phone').value;
    var formMessage = document.getElementById('form-msg').value;
    var telegramMessage = `Hello! You have a new message from DEUTSCHSKILL:%0A%0AName: ${formName}%0AMail: ${formMail}%0APhone: ${formPhone}%0AMessage: ${formMessage}`;
    //var telegramMessage = "1"+"%0A"+"2";
    console.log(telegramMessage);
    fetch(`https://api.telegram.org/bot6455102088:AAHLMwUgU5GJqfBE1JqgJY66tXmmFhiwUHA/sendMessage?chat_id=-930718758&text=${telegramMessage}&'parse_mode'=>'HTML'`)
        .then(response => response.json());
    //------send to tg-chat

    var form = document.getElementById("myForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // stop standart event 

        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "send_mail.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // successful send
                    alert("⸜(*ˊᗜˋ*)⸝");
                } else {
                    // unsuccessful send
                    alert("╮( ˘ ､ ˘ )╭");
                }
            }
        };
        xhr.send(formData);
    });

    function clearForm() {
        var inputs = form.getElementsByTagName("input");
        var textarea = form.getElementsByTagName("textarea")[0];

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = ""; // clear inputs
        }

        if (textarea) {
            textarea.value = ""; // clear textfild
        }
    };

    document.querySelector(".wrapper-form").classList.add('hidden-d');
    document.querySelector(".wrapper").classList.remove('hidden-d');
});