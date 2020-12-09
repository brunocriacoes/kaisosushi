function show() {
    document.getElementById('menu').classList.toggle('active');
    setTimeout(() => {
        document.getElementById('close').classList.toggle('aparecer');
    },100);
}
function fechar() {
    document.getElementById('alerta').classList.toggle('sumir');
}

var ancora_menu = document.querySelectorAll("#menu div a");
ancora_menu = Object.values(ancora_menu);

ancora_menu.forEach(a => {
    if( window.location.href == a.href){
        a.classList.add('cor')
    }
});