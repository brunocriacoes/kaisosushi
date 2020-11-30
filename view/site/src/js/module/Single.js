import produtos from "./products.js"
export default class Single {
    static isSingle()
    {
        let param  = new URL( window.location.href )
        let id     = param.searchParams.get( 'id' ) 
        let isPage = window.location.pathname.indexOf('produto.html')
        if( id && isPage != -1 ) 
        {
            let product      = produtos.find( prod => prod.id == id )
            let header_bg    = document.querySelector( '.inner-produto-title' )
            let header_title = document.querySelector( '.inner-produto-title h1' )
            let title        = document.querySelector( '#product_title' )
            let price        = document.querySelector( '#product_price' )
            let descript     = document.querySelector( '#product_description' )
            let image        = document.querySelector( '#product_image' )
            header_bg.style.backgroundImage = `url('${product.foto}')`
            header_title.innerHTML = product.title
            title.innerHTML        = product.title
            price.innerHTML        = product.price.toLocaleString('de-DE', { style: 'currency', currency: 'EUR' })
            descript.innerHTML     = product.description
            image.src              = product.foto
            console.log('cocorro')
        }
    }
}