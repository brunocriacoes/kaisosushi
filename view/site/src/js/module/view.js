import ListProducts from './products.js'


export default class View {
    static init()
    {
        let app = new View
        app.listMenu()
        app.toggle_menu()
        app.destaques()
        app.show_cart()
        View.slide_play()
        
    }
    listMenu() 
    {
        let $palco   =  document.querySelector( '.grid-pop-menu' )
        let products = ListProducts.slice( 0, 14 )
        if( $palco )
        {
            $palco.innerHTML = products.map( prod => `
                <a href="./produto.html?id=${prod.id}">
                    <img src="${prod.foto}" alt="">
                    <span> ${prod.title.substr(0,18)}... </span>
                </a>
            ` ).join('')
        }
    }
    toggle_menu()
    {
        let btns  = Object.values( document.querySelectorAll( '.link-menu img' ) ) 
        let menus = Object.values( document.querySelectorAll( '.menu' ) ) 
        btns.forEach( $button => {            
            $button.addEventListener( 'click', () => {
                menus.forEach( $el => {
                    $el.classList.toggle( 'active' )
                } )
            } )
        } )
    }
    destaques()
    {
        let products = ListProducts.slice( 0, 6 )
        let $palco = document.querySelector( '.grid-destaque' )
        if( $palco ) {
            $palco.innerHTML = products.map( prod => `
                <div>
                    <a href="./produto.html?id=${prod.id}">
                        <img src="${prod.foto}" alt="">
                        <span>${prod.title}</span>
                    </a>
                    <i> 
                         ${prod.price.toLocaleString('de-DE', { style: 'currency', currency: 'EUR' })}
                        <img src="./view/site/src/ico/cart.svg" alt="">
                    </i>
                </div>
            ` ).join('')
        }
    }
    static slide_play() 
    {
        let $play = document.querySelector( ".play" )
        let $bg   = document.querySelector('.inner-slider')
        if ( $play && $bg )
        {
            $bg.style.backgroundImage = `url('${globalThis.slider.itens[globalThis.slider.step]}')`
            $play.innerHTML = globalThis.slider.itens.map( ( control, key ) => `
                <span class="${ key == globalThis.slider.step && 'active' }" >${key}</span>
            ` ).join('')
            View.slide_play_event()
        }
    }
    static slide_play_event()
    {
        let plays = Object.values( document.querySelectorAll( ".play span" ) )
        plays.forEach(  $play => {
            $play.addEventListener( 'click', function() {
                globalThis.slider.step = +this.innerHTML
                View.slide_play()
            } )
            
        } )
    }
    show_cart() 
    {
        let $carrinho = document.querySelector('.cart')
        let $bt_open = document.querySelector('.btn-addcart')
        let $bt_close = document.querySelector('.cose-cart')
        let open_close = () => $carrinho.classList.toggle('active')
        $bt_open.addEventListener( 'click', open_close )
        $bt_close.addEventListener( 'click', open_close )
    }
}