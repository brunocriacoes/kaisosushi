export default {
    $cart: document.querySelector('.cart'),
    serve: `${window.location.protocol}//${window.location.hostname}`,
    base: `${window.location.protocol}//${window.location.hostname}/api/v1/cart`,
    get( path, fnc ) {
        fetch( this.base + path )
        .then( res => res.json() )
        .then( res => {
            fnc( res )
            this.render( res )
        } )
    },
    open() {
        this.get('/', res => {
            this.$cart.classList.toggle('active')
        })
    },
    clear() {
        localStorage.setItem('CART_KAISO', '{}')
    },
    add( id ) {
        this.get( `/add/${id}/1`, res => {
            this.$cart.classList.toggle('active')
        } )       
    },
    render( cart ) {
        document.querySelector( "#js-prods" ).innerHTML = cart.prods.map( prod => `
            <div>
                <b>${prod.quantity}</b>
                <span>${prod.name}</span>
                <b>€${prod.price}</b>
                <span onclick="globalThis.cart.remove(${prod.id})"><img src="${this.serve}/view/site/src/ico/trash.svg" alt="remover"></span>
            </div>
        ` ).join('')
        document.querySelector("#js-cart-total").innerHTML = `€${cart.total}`
    },
    remove( id )
    {
        this.get( `/del/${id}`, res => {} )
    },
    minus(id, selector) {
        let $quant = document.querySelector( `#${selector}` )
        if( +$quant.innerHTML > 1 ) {
            $quant.innerHTML =  +$quant.innerHTML - 1
        }
        this.get( `/add/${id}/${$quant.innerHTML}`, res => {} )   
    },
    plus(id, selector) {
        let $quant = document.querySelector( `#${selector}` )
        $quant.innerHTML =  +$quant.innerHTML + 1
        this.get( `/add/${id}/${$quant.innerHTML}`, res => {} ) 
    },
    addSingle(id, selector) {
        let $quant = document.querySelector( `#${selector}` )
        $quant.innerHTML =  +$quant.innerHTML + 1
        this.get( `/add/${id}/${$quant.innerHTML}`, res => {
            this.$cart.classList.toggle('active')
        } ) 
    },
}