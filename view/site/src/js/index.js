import DB from './module/LocalDb.js'
import App from './module/view.js'
import Single from './module/Single.js'
import Category from './module/Category.js'
import hel from './module/help.js'
import Cart from './module/Cart.js'

globalThis.cart = Cart

globalThis
App.init()
Single.isSingle()
Category.isCategory()
