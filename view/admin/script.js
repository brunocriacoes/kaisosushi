function show() {
    document.getElementById('menu').classList.toggle('active');
    setTimeout(() => {
        document.getElementById('close').classList.toggle('aparecer');
    },100);
}