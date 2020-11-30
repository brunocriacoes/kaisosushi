export default class LocalDb
{
    version = 'v_1_0_0'
    get() 
    {
        let persiste_db = localStorage.getItem( this.version )
        return persiste_db ? JSON.parse( persiste_db ) :  {}
    }
    set( mixel ) {
        let persiste_db = this.get()
        localStorage.setItem( this.version, JSON.stringify( { ...persiste_db, ...mixel } ) )
    }
}