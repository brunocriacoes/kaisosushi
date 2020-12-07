function show() {
    document.getElementById('menu').classList.toggle('active');
    setTimeout(() => {
        document.getElementById('close').classList.toggle('aparecer');
    },100);
}
function fechar() {
    document.getElementById('alerta').classList.toggle('sumir');
}