let btn_dis = document.querySelector('.dis-btn');
let dis = document.querySelector('.dis');
btn_dis.onclick = function () {
    btn_dis.classList.toggle('active');
    dis.classList.toggle('active');
}

let mode_suara = document.querySelector('#mode_suara');
let list_mode_suara = document.querySelector('#list-mode_suara');

mode_suara.onclick = function () {
    list_mode_suara.classList.toggle('active');
    mode_suara.classList.toggle('active');
    responsiveVoice.speak("Mode suara", "Indonesian Female");
}

$(document).on('mouseup', function () {
    if (document.getSelection() && mode_suara.classList.contains('active')) {
        let text = document.getSelection().toString();
        responsiveVoice.speak(text, "Indonesian Female");
    }
});
$('a').on('mouseover', function () {
    if (mode_suara.classList.contains('active')) {
        responsiveVoice.speak($(this).text().toString(), "Indonesian Female");
    }
});