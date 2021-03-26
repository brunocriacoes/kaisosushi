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
                this.render_finalizar( res )
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
        document.querySelector("#js-prods").innerHTML = cart.prods?.map(prod => `
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
        document.querySelector("#js-address").innerHTML = `${cart.meta?.ADDRESS_SEND || ''}`
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
    set(id, selector) {
        let $quant = document.querySelector(`#${selector}`)
        this.get(`/add/${id}/${$quant.innerHTML}`, res => { })
    },
    addSingle(id, selector) {
        let $quant = document.querySelector(`#${selector}`)
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
    set_send_final( $type, el ) {
        let $list_option = document.querySelectorAll('.js-type_send');
        $list_option = Object.values( $list_option );
        $list_option.forEach( btn => {
            btn.classList.remove('active')
        } )
        el.classList.add('active')
        this.get(`/frete/method?text=${$type}`, res => {
            document.location.reload(true);
        } );
    },
    set_address_send( selector ) {
        let $address = document.querySelector(`#${selector}`);
        this.get(`/frete/address?text=${$address.value}`, res => {} );
    },
    edit_address_send( selector ) {
        let $address = document.querySelector(`#${selector}`);
        this.get(`/frete/address?text=${$address.value}`, res => {} );
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
        clearTimeout( globalThis.debounce_search )
        let $data_list = document.querySelector(`#${selector_data_list}`)
        $data_list.innerHTML = '<span class="loading"></span>'
        globalThis.debounce_search = setTimeout( () => {
            this.get(`/matrix?s=${$input.value}`, res => {
                let address_data = JSON.stringify(res)
                $data_list.innerHTML = `<span onclick='globalThis.cart.set_data_list(${address_data}, "${selector}", "${selector_data_list}")'> ${res.address} </span>` 
            } );
        }, 1000 )      
    },
    set_data_list( $data, selector, selector_data_list ) {
        let $input = document.querySelector(`#${selector}`)
        let $data_list = document.querySelector(`#${selector_data_list}`)
        $input.value = $data.address
        this.get(`/data_address?json=${JSON.stringify($data)}&distance=${$data.distance}`, res => {})
        $data_list.innerHTML = ''
        if( globalThis.max_km < $data.distance ) {
            document.querySelector('.alert--delivery').removeAttribute('hidden')
        }else {
            document.querySelector('.alert--delivery').setAttribute('hidden','')
        }
        console.log($data)
    },
    render_finalizar( res )
    {
        let $is_page_finalizar = document.querySelector("#js-is-finalizar")
        if($is_page_finalizar)
        {
            document.querySelector('#js-end-total-html').innerHTML = res.total_html || '0,00'
            console.log(res.meta.FEE_FRETE_HTML)
            document.querySelector('#js-end-fee-frete-html').innerHTML = res.meta.FEE_FRETE_HTML || ''
            document.querySelector('#js-end-coupon-html').innerHTML = res.fee.coupon_html || '0,00'
            document.querySelector('#js-end-total-fee-html').innerHTML = res.total_fee_html
            document.querySelector("#js-end-list-iten").innerHTML = res.prods.map( item => `
                <div>
                    <span class="btn-more btn-remove" onclick="globalThis.cart.remove('${item.id}')">X</span>
                    <span>${item.name}</span>
                    <span class="btn-more" onclick="globalThis.cart.minus('${item.id}', 'js-end-quant-${item.id}')">-</span>
                    <b class="quantity-more" id="js-end-quant-${item.id}">${item.quantity}</b>
                    <span class="btn-more" onclick="globalThis.cart.plus('${item.id}', 'js-end-quant-${item.id}')">+</span>
                    <span>&euro;<span>${item.price_html}</span></span>
                    <b>&euro;<span>${item.sub_total_html}</span></b>
                </div>
            ` ).join('')
        }
    },
    apply_coupon( selector )
    {
        let $input = document.querySelector(`#${selector}`)
        fetch( `${this.serve}/api/v1/cart/coupon/${$input?.value}` )
    },
    address_blur( $el ) {
        this.get(`/matrix?s=${$el.value}`, res => {
            let $post_code = document.querySelector('.js-f-post-code')
            let $provincia = document.querySelector('.js-f-provincia')
            let $address = document.querySelector('.js-f-address')
            let $distance = document.querySelector('.js-f-distance')
            $post_code.value = res.data.post_code || ''
            $provincia.value = res.data.provincia || ''
            $address.value = res.data.address || ''
            $distance.value = res.distance || 0
            setTimeout( () => {
                this.get('/', res => {
                    this.render(res)
                    this.render_finalizar( res )
                })
            }, 1200 )
        } );
    }
}