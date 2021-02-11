
/* FUNÇÕES DE ABRIR E FECHAR MENU MOBILE*/
function show() {
    document.getElementById('menu').classList.toggle('active');
    setTimeout(() => {
        document.getElementById('close').classList.toggle('aparecer');
    },100);
}
function fechar() {
    document.getElementById('alerta').classList.toggle('sumir');
}

/*ADIÇÃO DE COR ÀS ANCORAS DO MENU*/
var ancora_menu = document.querySelectorAll("#menu div a");
ancora_menu = Object.values(ancora_menu);
ancora_menu.forEach(a => {
    if( window.location.href == a.href){
        a.classList.add('cor')
    }
});

/*PERMANÊNCIA DA SELEÇÃO DA OPÇÃO DO SELECT NA TELA PAINEL*/
var opt = document.querySelectorAll("select > option");
var option = Array.from(opt);
option.forEach(function(e) {
    console.log(e.value)
    if(window.location.href == e.value) {
        e.setAttribute("selected", "selected")
    }
} )
option.forEach(function(e) {
    console.log(e.value)
    if(window.location.href == e.value) {
        e.setAttribute("selected", "selected")
    }
} )



function remover(a){
    window.location.href = a.getAttribute("data-href")
};

function aviso() {
    document.getElementById("alerta_rem").classList.toggle('visivel');
    setTimeout(function() {
        document.getElementById("alerta_rem").classList.toggle('visivel');
    }, 1000)
}    


globalThis.linkMenu = link => {
    window.location.href =  link.value
}

var sub = document.querySelector('#sub');
var add = document.querySelector('#add');
var input = document.querySelector('#input');

add?.addEventListener('click', () =>{
    input.value = parseInt(input.value) + 1;
})

sub?.addEventListener('click', () =>{
    input.value = parseInt(input.value) - 1;
})