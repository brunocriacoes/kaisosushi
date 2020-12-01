<?php
class Importacao
{
    public function run()
    {
        add_router( '/import/cat', function() {
            $categoria = [
                "Menu",
                "Sashimis",
                "Temakis",
                "Sushi 2 peças",
                "Jhous / Gunkan",
                "Hot roll",
                "Hossomakis",
                "Tatakis",
                "Entradas",
                "Fusão",
                "Pratos quentes"
            ];
            $categoria = array_map( function( $cat ) {
                return [
                    "name" => $cat,
                    "slug" => maker_slug($cat)
                ];
            }, $categoria );
            var_dump( $categoria );
            $cat = new CategoryRepository();
            // foreach( $categoria as $c ) {
            //     $cat->register( $c );
            // }
        });
        add_router( '/import/prod', function() {
            $prods = '
Menu,25 peças,Menu delicioso de combinados. O Menu de 25 peças é composto por,22.50,https://kaisosushi.pt/wp-content/uploads/2020/05/Menu-25.jpg,
Menu,35 peças,Menu delicioso de combinados. O Menu de 35 peças é composto por,33.40,https://kaisosushi.pt/wp-content/uploads/2020/05/Menu-35.jpg,
Menu,18 peças,Menu delicioso de combinados. O Menu de 18 peças é composto por,19.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-18.jpg,
Menu,Uramaki - 8 peças,Escolha o seu uramaki 8 peças!,7.90,https://kaisosushi.pt/wp-content/uploads/2020/05/uramaki.jpg,
Jhous / Gunkan,Salmão,,5.50,https://kaisosushi.pt/wp-content/uploads/2020/05/salmão.jpg,
Jhous / Gunkan,Salmão braseado,,5.90,https://kaisosushi.pt/wp-content/uploads/2019/01/Gunkan-braseado.jpg,
Jhous / Gunkan,Salmão e camarão,,6.20,https://kaisosushi.pt/wp-content/uploads/2019/01/Gunkan-braseado.jpg,
Jhous / Gunkan,Massago,,6.50,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-18.jpg,
Tatakis,5 peças - Tataki atum,Atum braseado com sésamo e cebolinha,7.90,https://kaisosushi.pt/wp-content/uploads/2020/05/tataki-atum.jpg,
Tatakis,5 peças - Tataki salmão,Salmão braseado com sésamo e cebolinha ,6.90,https://kaisosushi.pt/wp-content/uploads/2020/05/tataki-salmão.jpg,
Entradas,Sopa Missoshiro,Missoshiro cebolinha e somen,3.00,https://kaisosushi.pt/wp-content/uploads/2020/05/sopa-sisoshiro.jpg,
Entradas,Sumono,Salada refrescante de pepino e sésamo,3.20,https://kaisosushi.pt/wp-content/uploads/2020/05/sumono.jpg,
Entradas,Sumono Especial,Salada refrescante de salmão pepino e sésamo,5.30,https://kaisosushi.pt/wp-content/uploads/2020/05/sumono-especial.jpg,
Entradas,Edamame ,Temperada com gengibre limão e flor de sal,4.10,https://kaisosushi.pt/wp-content/uploads/2020/05/edamame.jpg,
Entradas,Gyosa - 2 un,Frango e vegetais,2.20,https://kaisosushi.pt/wp-content/uploads/2020/05/gyosa.jpg,
Entradas,Harumaki Camarão - 2 un,Crepe chinés de camarão alho poró e Philadelphia ,2.60,https://kaisosushi.pt/wp-content/uploads/2020/05/harumaki-camarao.jpg,
Entradas,Harumaki Salmão - 2un,Crepe Chinês de salmão e Philadelphia,2.30,https://kaisosushi.pt/wp-content/uploads/2020/05/harumaki-camarao.jpg,
Entradas,Harumaki Vegetariano 2un,Crepe Chinês de Legumes,1.95,https://kaisosushi.pt/wp-content/uploads/2020/05/harumaki-camarao.jpg,
Entradas,Pipoca de Camarão,Cubinhos de camarão tempura,5.50,https://kaisosushi.pt/wp-content/uploads/2020/05/pipoca-de-camarao.jpg,
Entradas,Ceviche,Peixe Branco ao molho de limão,8.90,https://kaisosushi.pt/wp-content/uploads/2020/05/ceviche.jpg,
Entradas,Gohan,,1.50,https://kaisosushi.pt/wp-content/uploads/2020/05/gohan.jpg,
Entradas,Sampiter ,Peixe ao molho especial do Chef ,13.90,https://kaisosushi.pt/wp-content/uploads/2020/05/Sampiter-3.jpg,
Sushi 2 peças,Kani,,4.25,https://kaisosushi.pt/wp-content/uploads/2020/05/kani.jpg,
Fusão,Atum burrata - 4 un,Cubos de atum cobertos por queijo burrata molho pesto  farofinha crocante de pão.,6.90,https://kaisosushi.pt/wp-content/uploads/2019/01/Atum-burrata.jpg,
Fusão,Salmão e Guacamole,Salmão marinado em molho shoyu coberto por guacamole. ,6.90,https://kaisosushi.pt/wp-content/uploads/2020/05/salmao-guacamole.jpg,
Fusão,Baterá de Salmão - 4un,Arroz prensado salmão philadelphia e cebolinha,4.60,https://kaisosushi.pt/wp-content/uploads/2020/05/batera-salmapo.jpg,
Fusão,Tartá Especial,Salmão em cubos com cebolinha  philadelphia e molho especial,8.50,https://kaisosushi.pt/wp-content/uploads/2020/05/tarta-especial.jpg,
Fusão,Tacos de salmão - 2 un,Taco de salmão cebolinha philadelphia e molho,7.50,https://kaisosushi.pt/wp-content/uploads/2020/05/tacos-salmao.jpg,
Pratos quentes,Yakissoba de carne, frango e legumes,9.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-carne.jpg,
Pratos quentes,Yakissoba de legumes,,7.50,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-carne.jpg,
Pratos quentes,Yakissoba camarão e legumes,,12.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-carne.jpg,
Pratos quentes,Yakimeshi clássico,Gohan  carne frango legumes e ovos,8.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-classico.jpg, 
Pratos quentes,Yakimeshi camarão,Gohan  Camarão Legumes e Ovos,10.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-classico.jpg,
Pratos quentes,Yakimeshi vegetariano,Gohan  Vegetais e Ovos,6.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-classico.jpg,
Menu,74 Peças,Menu delicioso de combinados. O Menu de 74 peças peças é composto por,65.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-chef.jpg,
Menu,36 peças,Menu delicioso de combinados. O Menu de 36 peças peças é composto por,39.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-casal.jpg,
Menu,18 peças,Menu delicioso de combinados. O Menu de 18 peças peças é composto por,22.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-solteiro.jpg,
Menu,54 peças,Menu delicioso de combinados. O Menu de 54 peças peças é composto por,59.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-especial.jpg,
            
            ';
            $prods = explode( "\n", $prods );
            $prods = array_filter( $prods, function( $p ) {
                return strlen( $p ) > 15;
            } );
            $prods = array_map( function( $prod ) {
                $prod = explode( ',', $prod );
                return [
                    "name" => $prod[1],                    
                    "slug" =>  maker_slug($prod[1]),
                    "description" => $prod[2] ?? '',
                    "price" => $prod[3],
                    "photo" => import_foto( $prod[4] ),
                    "price_offer" => $prod[3] 
                ];
            }, $prods );
            $p = new ProductRepository;
            // foreach( $prods as $prod ) {
            //     $p->register( $prod );
            // }
            var_dump( $prods );

        } );
        
        add_router( '/import/setcat', function() {
            $prods = '
Menu,25 peças,Menu delicioso de combinados. O Menu de 25 peças é composto por,22.50,https://kaisosushi.pt/wp-content/uploads/2020/05/Menu-25.jpg,
Menu,35 peças,Menu delicioso de combinados. O Menu de 35 peças é composto por,33.40,https://kaisosushi.pt/wp-content/uploads/2020/05/Menu-35.jpg,
Menu,18 peças,Menu delicioso de combinados. O Menu de 18 peças é composto por,19.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-18.jpg,
Menu,Uramaki - 8 peças,Escolha o seu uramaki 8 peças!,7.90,https://kaisosushi.pt/wp-content/uploads/2020/05/uramaki.jpg,
Jhous / Gunkan,Salmão,,5.50,https://kaisosushi.pt/wp-content/uploads/2020/05/salmão.jpg,
Jhous / Gunkan,Salmão braseado,,5.90,https://kaisosushi.pt/wp-content/uploads/2019/01/Gunkan-braseado.jpg,
Jhous / Gunkan,Salmão e camarão,,6.20,https://kaisosushi.pt/wp-content/uploads/2019/01/Gunkan-braseado.jpg,
Jhous / Gunkan,Massago,,6.50,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-18.jpg,
Tatakis,5 peças - Tataki atum,Atum braseado com sésamo e cebolinha,7.90,https://kaisosushi.pt/wp-content/uploads/2020/05/tataki-atum.jpg,
Tatakis,5 peças - Tataki salmão,Salmão braseado com sésamo e cebolinha ,6.90,https://kaisosushi.pt/wp-content/uploads/2020/05/tataki-salmão.jpg,
Entradas,Sopa Missoshiro,Missoshiro cebolinha e somen,3.00,https://kaisosushi.pt/wp-content/uploads/2020/05/sopa-sisoshiro.jpg,
Entradas,Sumono,Salada refrescante de pepino e sésamo,3.20,https://kaisosushi.pt/wp-content/uploads/2020/05/sumono.jpg,
Entradas,Sumono Especial,Salada refrescante de salmão pepino e sésamo,5.30,https://kaisosushi.pt/wp-content/uploads/2020/05/sumono-especial.jpg,
Entradas,Edamame ,Temperada com gengibre limão e flor de sal,4.10,https://kaisosushi.pt/wp-content/uploads/2020/05/edamame.jpg,
Entradas,Gyosa - 2 un,Frango e vegetais,2.20,https://kaisosushi.pt/wp-content/uploads/2020/05/gyosa.jpg,
Entradas,Harumaki Camarão - 2 un,Crepe chinés de camarão alho poró e Philadelphia ,2.60,https://kaisosushi.pt/wp-content/uploads/2020/05/harumaki-camarao.jpg,
Entradas,Harumaki Salmão - 2un,Crepe Chinês de salmão e Philadelphia,2.30,https://kaisosushi.pt/wp-content/uploads/2020/05/harumaki-camarao.jpg,
Entradas,Harumaki Vegetariano 2un,Crepe Chinês de Legumes,1.95,https://kaisosushi.pt/wp-content/uploads/2020/05/harumaki-camarao.jpg,
Entradas,Pipoca de Camarão,Cubinhos de camarão tempura,5.50,https://kaisosushi.pt/wp-content/uploads/2020/05/pipoca-de-camarao.jpg,
Entradas,Ceviche,Peixe Branco ao molho de limão,8.90,https://kaisosushi.pt/wp-content/uploads/2020/05/ceviche.jpg,
Entradas,Gohan,,1.50,https://kaisosushi.pt/wp-content/uploads/2020/05/gohan.jpg,
Entradas,Sampiter ,Peixe ao molho especial do Chef ,13.90,https://kaisosushi.pt/wp-content/uploads/2020/05/Sampiter-3.jpg,
Sushi 2 peças,Kani,,4.25,https://kaisosushi.pt/wp-content/uploads/2020/05/kani.jpg,
Fusão,Atum burrata - 4 un,Cubos de atum cobertos por queijo burrata molho pesto  farofinha crocante de pão.,6.90,https://kaisosushi.pt/wp-content/uploads/2019/01/Atum-burrata.jpg,
Fusão,Salmão e Guacamole,Salmão marinado em molho shoyu coberto por guacamole. ,6.90,https://kaisosushi.pt/wp-content/uploads/2020/05/salmao-guacamole.jpg,
Fusão,Baterá de Salmão - 4un,Arroz prensado salmão philadelphia e cebolinha,4.60,https://kaisosushi.pt/wp-content/uploads/2020/05/batera-salmapo.jpg,
Fusão,Tartá Especial,Salmão em cubos com cebolinha  philadelphia e molho especial,8.50,https://kaisosushi.pt/wp-content/uploads/2020/05/tarta-especial.jpg,
Fusão,Tacos de salmão - 2 un,Taco de salmão cebolinha philadelphia e molho,7.50,https://kaisosushi.pt/wp-content/uploads/2020/05/tacos-salmao.jpg,
Pratos quentes,Yakissoba de carne, frango e legumes,9.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-carne.jpg,
Pratos quentes,Yakissoba de legumes,,7.50,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-carne.jpg,
Pratos quentes,Yakissoba camarão e legumes,,12.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-carne.jpg,
Pratos quentes,Yakimeshi clássico,Gohan  carne frango legumes e ovos,8.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-classico.jpg, 
Pratos quentes,Yakimeshi camarão,Gohan  Camarão Legumes e Ovos,10.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-classico.jpg,
Pratos quentes,Yakimeshi vegetariano,Gohan  Vegetais e Ovos,6.90,https://kaisosushi.pt/wp-content/uploads/2020/05/yakissoba-classico.jpg,
Menu,74 Peças,Menu delicioso de combinados. O Menu de 74 peças peças é composto por,65.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-chef.jpg,
Menu,36 peças,Menu delicioso de combinados. O Menu de 36 peças peças é composto por,39.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-casal.jpg,
Menu,18 peças,Menu delicioso de combinados. O Menu de 18 peças peças é composto por,22.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-solteiro.jpg,
Menu,54 peças,Menu delicioso de combinados. O Menu de 54 peças peças é composto por,59.90,https://kaisosushi.pt/wp-content/uploads/2020/05/menu-especial.jpg,
            
            ';
            $prods = explode( "\n", $prods );
            $prods = array_filter( $prods, function( $p ) {
                return strlen( $p ) > 15;
            } );
            $prods = array_map( function( $prod ) {
                $prod = explode( ',', $prod );
                $cat = maker_slug($prod[0]);
                $cat_id = query( "SELECT * FROM category WHERE slug = '$cat'" );
                $cat_id = !empty( $cat_id[0]['id'] )  ? $cat_id[0]['id'] : 0; 
                
                $product = $prod[1];
                $product_id = query( "SELECT * FROM product WHERE name = '$product'" );
                return [
                    "post_id" => $cat_id,                    
                    "post_taxonomy_id" =>  $product_id[0]['id'],
                    "relation" => "IN_CATEGORY"
                ];
            }, $prods );
            var_dump( $prods );
            $tax = new TaxinomyRepository;
            // $tax->register( $prods[2] );
            // foreach( $prods as $prod ) {
            //     $tax->register( $prod );
            // }

        } );
    }
    
}

