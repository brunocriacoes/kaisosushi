

export default {
    $cart: document.querySelector('.cart'),
    save(obj) {
        let cat = this.get()
        cat = { ...cat, ...obj }
        localStorage.setItem('CART_KAISO', JSON.stringify(cat))
    },
    get() {
        let cart = localStorage.getItem('CART_KAISO') || '{}'
        return JSON.parse(cart)
    },
    clear() {
        localStorage.setItem('CART_KAISO', '{}')
    },
    add( id ) {
        this.$cart.classList.toggle('active')
        let cart = this.get()
        cart.itens = cart.itens || []
        cart.itens.push( {
            id,
            quant: 1,
            sub_total: 3.50,
            amout: 3.50,
            name: 'teste'
        } )
        this.save(cart)
        this.render()
    },
    render(){},
    addSingle(id) {
        let quant = +document.querySelector('#js-single-quant').innerHTML
        this.$cart.classList.toggle('active')
    }
}