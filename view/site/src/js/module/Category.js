import produtos from "./products.js"
import categorys from "./categorys.js"
export default class Single {
    static isCategory()
    {
        let param  = new URL( window.location.href )
        let cat_id = param.searchParams.get( 'cat_id' ) || 1
        let isPage = window.location.pathname.indexOf('menu.html')
        if( isPage != -1 )
        {
            let $list_cat  = document.querySelector( '#list-cat' )
            let $list_prod = document.querySelector( '#list-prod' )
            $list_cat.innerHTML  = categorys.map( cat => `<a href="./menu.html?cat_id=${cat.id}">${cat.title}</a>` ).join('')
            $list_prod.innerHTML = produtos
            .filter( prod => prod.category == cat_id )
            .map( prod => `
                <div>
                    <a href="./produto.html?id=${prod.id}">
                        <img src="${prod.foto}" alt="">
                        <span>${prod.title}</span>
                    </a>
                    <i> 
                        ${prod.price.toLocaleString('de-DE', { style: 'currency', currency: 'EUR' })}
                        <img src="./src/ico/cart.svg" alt="">
                    </i>
                </div>
            ` ).join('')

        }
        
    }
}