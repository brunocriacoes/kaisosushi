
globalThis.singlePlus = () => {
    let $quant = document.querySelector( '#js-single-quant' )
    $quant.innerHTML =  +$quant.innerHTML + 1
}
globalThis.singleMinus = () => {
    let $quant = document.querySelector( '#js-single-quant' )
    if( +$quant.innerHTML > 1 ) {
        $quant.innerHTML =  +$quant.innerHTML - 1
    }
}
export default {}