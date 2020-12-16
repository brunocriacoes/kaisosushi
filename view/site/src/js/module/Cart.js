export default {
    $cart: document.querySelector('.cart'),
    serve: `${window.location.protocol}//${window.location.hostname}`,
    base: `${window.location.protocol}//${window.location.hostname}/api/v1/cart`,
    get(path, fnc) {
        fetch(this.base + path)
            .then(res => res.json())
            .then(res => {
                fnc(res)
                this.render(res)
            })
    },
    open() {
        this.get('/', res => {
            this.$cart.classList.toggle('active')
        })
    },
    clear() {
        localStorage.setItem('CART_KAISO', '{}')
    },
    add(id) {
        this.get(`/add/${id}/1`, res => {
            this.$cart.classList.toggle('active')
        })
    },
    render(cart) {
        document.querySelector("#js-prods").innerHTML = cart.prods.map(prod => `
            <div>
                <b> 
                    <i onclick="globalThis.cart.minus('${prod.id}', 'js-cart-quant-${prod.id}')">-</i> 
                    <b id="js-cart-quant-${prod.id}">${prod.quantity}</b> 
                    <i onclick="globalThis.cart.plus('${prod.id}', 'js-cart-quant-${prod.id}')">+</i> 
                </b>
                <span>${prod.name}</span>
                <b>€${prod.price_html}</b>
                <span onclick="globalThis.cart.remove(${prod.id})"><img src="${this.serve}/view/site/src/ico/trash.svg" alt="remover"></span>
            </div>
        ` ).join('')
        document.querySelector("#js-cart-total").innerHTML = `€${cart.total_html}`
        document.querySelector("#js-address").innerHTML = `${cart.meta.ADDRESS_SEND}`
    },
    remove(id) {
        this.get(`/del/${id}`, res => { })
    },
    minus(id, selector) {
        let $quant = document.querySelector(`#${selector}`)
        if (+$quant.innerHTML > 1) {
            $quant.innerHTML = +$quant.innerHTML - 1
        }
        this.get(`/add/${id}/${$quant.innerHTML}`, res => { })
    },
    plus(id, selector) {
        let $quant = document.querySelector(`#${selector}`)
        $quant.innerHTML = +$quant.innerHTML + 1
        this.get(`/add/${id}/${$quant.innerHTML}`, res => { })
    },
    addSingle(id, selector) {
        let $quant = document.querySelector(`#${selector}`)
        $quant.innerHTML = +$quant.innerHTML + 1
        this.get(`/add/${id}/${$quant.innerHTML}`, res => {
            this.$cart.classList.toggle('active')
        })
    },
    set_type_send($type, el ) {
        let $list_option = document.querySelectorAll('.js-type_send');
        $list_option = Object.values( $list_option );
        $list_option.forEach( btn => {
            btn.classList.remove('active')
        } )
        el.classList.add('active')
        this.get(`/frete/method?text=${$type}`, res => {} );
    },
    set_address_send( selector ) {
        let $address = document.querySelector(`#${selector}`);
        this.get(`/frete/address?text=${$address.value}`, res => {} );
    },
    edit_address_send( selector ) {
        let $address = document.querySelector(`#${selector}`);
        this.get(`/frete/address?text=${$address.innerHTML}`, res => {} );
    },
    set_coupon( selector )
    {
       let input = document.querySelector(`#${selector}`)
       this.get( `/coupon/${input?.value}`, res => {}  )
    },
    set_method_payment( $el, selector )
    {
        let list = Array.from( document.querySelectorAll( `.${selector}` ) )
        list.forEach( $option => { $option.classList.remove( 'active' ) } )
        $el.classList.add( 'active' )
    },
    postcode( selector, selector_data_list )
    {
        let $input = document.querySelector(`#${selector}`)
        clearTimeout(globalThis.search_postcoded)
        if( $input.value.length > 3  )
        {
            let $data_list = document.querySelector(`#${selector_data_list}`)
            globalThis.search_postcoded = setTimeout( () => {
                fetch( `${this.serve}/postcode?search=${$input.value}` )
                ?.then( res => res.json() )
                ?.then( res => {
                    $input.focus()
                    $data_list.innerHTML = res.map( local => `<option value="${local.logadouro}">` )
                } )
            }, 1500 )
        }        
    },
    apply_coupon( selector )
    {
        let $input = document.querySelector(`#${selector}`)
        fetch( `${this.serve}/api/v1/cart/coupon/${$input?.value}` )
    }
}