const editButton = document.getElementById('editpill');
const editButtonMob = document.getElementById('editpill-mobile');

document.onkeydown = function (event) {
    if (event.code == 'AltLeft') {
        document.onkeyup = function (event) {
            if (event.code == 'KeyE') {
                console.log('Edit button is active');
                editButton.classList.remove('hidden-d');
                editButtonMob.classList.remove('hidden-d');

            }
            if (event.code == 'KeyW') {
                console.log('Edit button removed');
                editButton.classList.add('hidden-d');
                editButtonMob.classList.add('hidden-d');

            }
            else {
                document.onkeyup = null;
            }
        }
    }
}