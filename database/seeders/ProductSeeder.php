<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos la tabla antes de insertar para evitar duplicados al probar
        // DB::table('products')->truncate(); // Descomenta si quieres borrar todo antes de sembrar

        $productos = [
            // ==========================================
            // CATEOGORÍA: ALIMENTOS (10 items)
            // ==========================================
            [
                'nombre' => 'Raza Adulto x 15 Kg',
                'descripcion' => 'Alimento balanceado x 15 kg elaborado para perros adultos. Sus vitaminas, minerales, proteínas y grasas omega 3 optimizan la nutrición diaria de tu perro y le aporta una mayor vitalidad.',
                'precio' => 45000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://static.wixstatic.com/media/a79d54_31630d8c5d8e4838adddf929c18c06a7~mv2.jpg/v1/fill/w_480,h_720,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/a79d54_31630d8c5d8e4838adddf929c18c06a7~mv2.jpg',
                'stock' => 20,
            ],
            [
                'nombre' => 'Excellent Perro Adulto Raza Pequeña x 15 kg',
                'descripcion' => 'Purina Excellent Perro Adulto Pollo y Arroz Razas MInis y Pequeñas es un alimento balanceado de calidad premium para perros adultos de razas pequeñas. Su fórmula ayuda a mantener músculos fuertes, sanos y favorecen la salud de la piel y un pelaje brillante. Ofrece una óptima absorción de nutrientes. La inclusión de componentes activos como la zeolita y la fibra de soja ayudan a producir heces firmes.',
                'precio' => 18500.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/159769-800-auto?v=639002043811900000&width=800&height=auto&aspect=true',
                'stock' => 15,
            ],
            [
                'nombre' => 'Eukanuba Cordero Perro Cachorro x 15 kg',
                'descripcion' => 'Eukanuba Perro Puppy cordero es un alimento balanceado de calidad super premium para perros cachorros, con cordero como ingrediente principal. Su fórmula ofrece un óptimo desarrollo de huesos y músculos, y un nivel de energía adecuado para su crecimiento y juego.',
                'precio' => 8500.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/158856-800-auto?v=638923492411130000&width=800&height=auto&aspect=true',
                'stock' => 50,
            ],
            [
                'nombre' => 'Royal Canin Gato Hepatic x 1,5 kg',
                'descripcion' => 'Royal Canin Veterinary Hepatic Feline es un alimento balanceado de calidad super premium para gatos, formulado para ayudar a la función hepática en caso de insuficiencia hepática crónica. Reduce los signos asociados con insuficiencia hepática gracias a sus adaptados niveles de proteínas vegetales. Contiene un bajo nivel de cobre para ayudar a minimizar su acumulación en las células hepáticas. Dietas veterinarias es una línea de nutrición específica para satisfacer necesidades terapéuticas de los gatos.',
                'precio' => 32000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157010-800-auto?v=638364468932170000&width=800&height=auto&aspect=true',
                'stock' => 10,
            ],
            [
                'nombre' => 'Maintenance Criadores Perro Adulto x 22 kg',
                'descripcion' => 'Maintenance Criadores es un alimento balanceado para perros adultos de todos los tamaños. Presenta un delicioso sabor a carne y pollo. Con un contenido de proteína bruta del 20%,fibras, minerales y vitaminas , proporcionando una nutrición completa. Además, cuenta con un aporte de 1.5% de calcio y 1.1% de fósforo, esenciales para el desarrollo óseo. Contribuye con una piel sana y pelo brillante, promueve un sistema inmunológico saludable y ayuda a mantener la salud articular.',
                'precio' => 12000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157657-800-auto?v=638507748707970000&width=800&height=auto&aspect=true',
                'stock' => 30,
            ],
            [
                'nombre' => 'Sieger Perro Senior Raza Pequeña x 3 kg',
                'descripcion' => 'Sieger Senior Mini & Small Breeds es un alimento balanceado de calidad super premium para perros adultos senior de razas pequeñas, mayores de 7 años. Su fórmula contiene vitamina E y C más selenio orgánico, junto con la L-Carnitina, uvas deshidratadas y arándanos que retrasan la progresión de las patologías asociadas con la edad, como la pérdida de energía y masa muscular.
',
                'precio' => 5500.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/159780-800-auto?v=639002043846430000&width=800&height=auto&aspect=true',
                'stock' => 100,
            ],
            [
                'nombre' => 'Nutrique Perro Adulto Skin Sensitivity x 3 kg',
                'descripcion' => 'Nutrique Skin Sensitivity es un alimento balanceado natural para perros adultos con sensibilidad cutánea. Su fórmula contribuye a aumentar la capacidad de defensa del sistema inmune, retrasa el envejecimiento celular y promueve un sistema digestivo sano. Su única fuente de proteína es el pavo lo que disminuye la posibilidad de desarrollar reacciones alérgicas
',
                'precio' => 38000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156652-800-auto?v=638343212068730000&width=800&height=auto&aspect=true',
                'stock' => 12,
            ],
            [
                'nombre' => 'Royal Canin Perro Maxi Adulto x 3 kg',
                'descripcion' => 'Royal Canin Maxi Adulto es un alimento balanceado de calidad super premium para perros adultos de razas grandes desde los 15 meses a los 5 años de edad. Contribuye a la alta digestibilidad, la salud de huesos y articulaciones. Enriquecido con ácidos grasos omega 3 ayuda a conservar una piel saludable.
',
                'precio' => 6200.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/155809-800-auto?v=638317984764330000&width=800&height=auto&aspect=true',
                'stock' => 40,
            ],
            [
                'nombre' => 'Royal Canin Perro Mini Ageing 12+ x 1 kg',
                'descripcion' => 'Royal Canin Mini Ageing 12+ es un alimento balanceado de calidad super premium para perros adultos, a partir de los 12 años de edad. Su fórmula promueve un proceso de envejecimiento saludable y contribuye al mantenimiento adecuado del sistema renal, así como a la salud óptima de la piel y el pelaje.
',
                'precio' => 15000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/155849-800-auto?v=638317984843670000&width=800&height=auto&aspect=true',
                'stock' => 25,
            ],
            [
                'nombre' => 'Sieger Perro Adulto Reduced Calorie x 12 kg',
                'descripcion' => 'Sieger Reduced Calorie All Breeds es un alimento balanceado de calidad super premium indicado para perros adultos, a partir del año de edad, con sobrepeso o tendencia al sobrepeso. Su fórmula aporta un porcentaje alto de proteínas y fibras, y bajo en calorías y grasas. La inclusión de L-Carnitina y Café Verde contribuyen al proceso de pérdida de peso de forma saludable, manteniendo la masa muscular y promoviendo la eliminación de grasa. Contribuye a reducir los efectos del estrés oxidativo y a evitar el daño tisular generado por el sobrepeso. Además, la fibra brinda saciedad para evitar que el perro en este proceso de pérdida de peso tenga sensación de hambre.
',
                'precio' => 9800.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/159911-800-auto?v=639002090755300000&width=800&height=auto&aspect=true',
                'stock' => 18,
            ],

            // ==========================================
            // CATEOGORÍA: JUGUETES (10 items)
            // ==========================================
            [
                'nombre' => 'Juguete Soga de Tela con Nudos 25 Cm Antiestrés Línea de Sogas Fun Cancat',
                'descripcion' => 'CLa Soga de Tela con nudos de CanCat es el juguete perfecto para estimular a tu perro. Consta de sogas anudadas resistentes, que permite que tu perro tire de ellas sin que las rompa. Encontrala en distintos colores y tamaños que mejor se ajusten a tu mascota.
',
                'precio' => 3655.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156942-800-auto?v=638344063095170000&width=800&height=auto&aspect=true',
                'stock' => 10,
            ],
            [
                'nombre' => 'Juguete de Caucho Rellenable Glotoni Extreme Grande',
                'descripcion' => 'CGlotoni extreme es un juguete para perros medianos/grandes de 15 a 35 kg, fabricado con caucho natural. Resistentes y duraderos. Soportan intemperie, ayudan a calmar su ansiedad y son rellenables. Ideal para los que se quedan solos. Asegura entretenimiento por más tiempo y dosifica su alimento.
',
                'precio' => 20230.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157614-800-auto?v=638484402448230000&width=800&height=auto&aspect=true',
                'stock' => 30,
            ],
            [
                'nombre' => 'Juguete Pelota con Púas y Chifle de Caucho Natural 9 Cm Bestia Peluda',
                'descripcion' => 'La Pelota con púas con sonido Bestia Peluda es un juguete de caucho natural, diseñado para proporcionarle a tu perro una gran diversión y una higiene dental adecuada. Mascar ayuda a mantener fresco el aliento de tu perro, así como a controlar la placa y el sarro. Además, su sonido captura la atención de tu perro, fomentando aún más su diversión.
',
                'precio' => 7800.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156624-800-auto?v=638343211982500000&width=800&height=auto&aspect=true',
                'stock' => 5,
            ],
            [
                'nombre' => 'Juguete Cuerda Dental Mickey Para Perro',
                'descripcion' => 'Juguete Cuerda Dental Mickey para perros. Esta hecho en tejido reforzado. Su resistente cuerda bicolor hecha 100% en algodón ayuda a limpiar los dientes de tu perro y le proporciona una correcta higiene dental. Adicionalmente, incluye sonido en la parte interior para mas diversión. Esta cuerda dental es perfecta para mantener a tu mascota saludable mientras juega y se ejercita. Con medidas de 15 cm de diámetro.
',
                'precio' => 22000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/158118-800-auto?v=638726452308200000&width=800&height=auto&aspect=true',
                'stock' => 25,
            ],
            [
                'nombre' => 'Juguete Pesa Fútbol de Vinilo con Sonido Trixie',
                'descripcion' => 'La pelota de Futbol Trixie es un juguete de vinilo, diseñado para que tu perro se entretenga y se divierta liberando todo su estrés, además de para ayudar a ejercitar su mandíbula. Su suave textura está pensada para no dañar los dientes de tu mascota y su sonido le proporciona una mayor diversión. Incluso, facilita la higienización de su boca, controlando la placa y el sarro. Además, su sonido captura la atención de tu perro, fomentando aún más su diversión.',
                'precio' => 3500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156957-800-auto?v=638344063138800000&width=800&height=auto&aspect=true',
                'stock' => 2,
            ],
            [
                'nombre' => 'Juguete Pelota Verde con Erizos Dipensador de Alimento Rascals
',
                'descripcion' => 'La Pelota Dispensador De Alimento Rascals es un juguete dispensador de comida, diseñado para proporcionarle una gran diversión a tu perro y una correcta higienización de su boca. Sus protuberancias masajean las encías de tu mascota y facilitan la limpieza de los dientes y espacios interdentales. Mascar ayuda a mantener fresco el aliento de tu perro, así como a controlar la placa y el sarro. Es un juguete que te permite rellenarlo con snacks saludables para hacer todo más divertido y sano.
',
                'precio' => 5000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156218-800-auto?v=638342752453370000&width=800&height=auto&aspect=true',
                'stock' => 8,
            ],
            [
                'nombre' => 'Juguete Pelota de Rugby Violeta Rascals
',
                'descripcion' => 'La Pelota Rugby Rascals es un juguete diseñado para proporcionarle a tu perro una gran diversión, fomentando una correcta higienización de su boca. Sus protuberancias masajean las encías de tu mascota y facilitan la limpieza de los dientes y espacios interdentales. Mascar ayuda a mantener fresco el aliento de tu perro, así como a controlar la placa y el sarro.
',
                'precio' => 11500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156206-800-auto?v=638342752417100000&width=800&height=auto&aspect=true',
                'stock' => 22,
            ],
            [
                'nombre' => 'Juguete Pelota Erizo Fluorescente de Vinilo con Sonido 9 cm Bestia Peluda
',
                'descripcion' => 'La Pelota Erizo Fluorescente con sonido Bestia Peluda es un juguete de vinilo diseñado para proporcionarle a tu perro una gran diversión y una higiene dental adecuada. Sus protuberancias masajean las encías de tu mascota y facilitan la limpieza de los dientes y espacios interdentales. Mascar ayuda a mantener fresco el aliento de tu perro, así como a controlar la placa y el sarro. Además, su sonido captura la atención de tu perro, fomentando aún más su diversión.
',
                'precio' => 5000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156620-800-auto?v=638343211971570000&width=800&height=auto&aspect=true',
                'stock' => 5,
            ],
            [
                'nombre' => 'Juguete Pesa de Látex Mini Junior 10 cm Trixie',
                'descripcion' => 'Juguete de látex, con forma de pesa, para jugar y mantener una adecuada higiene dental. Diseño llamativo para una mayor diversión
',
                'precio' => 4500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157311-800-auto?v=638403192856130000&width=800&height=auto&aspect=true',
                'stock' => 60,
            ],
            [
                'nombre' => 'Juguete Bionic Ball Large Hagen
',
                'descripcion' => 'Pelota con durabilidad. La pelota BIONIC tiene el tamaño adecuado para la mayoría de los lanzadores de pelotas y, con su brillante color naranja ayuda a tu perro a no perderla nunca de vista.
',
                'precio' => 2800.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157973-800-auto?v=638661504654970000&width=800&height=auto&aspect=true',
                'stock' => 10,
            ],

            // ==========================================
            // CATEOGORÍA: SNACKS (10 items)
            // ==========================================
            [
                'nombre' => 'Dentalife Snack Dental Para Perros Razas Pequeñas x 42 gr',
                'descripcion' => 'Es un snack dental masticable para perros pequeños que ayuda con la limpieza de los dientes. Reduce la acumulación de sarro y no contiene saborizantes ni colorantes artificiales. Está hecho con una innovadora textura porosa que hace que los perros mastiquen usando incluso esos dientes en áreas difíciles de alcanzar.
',
                'precio' => 25000.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157958-800-auto?v=638654611294970000&width=800&height=auto&aspect=true',
                'stock' => 10,
            ],
            [
                'nombre' => 'Palitos de Carne Horneados Para Perros x 80 gr (5 Unidades) Golocan',
                'descripcion' => 'ALos Palitos de Carne Horneados Golocan son snacks horneados con forma de palitos que los convierten en el snack ideal para sacar a pasear a tu perro. Con auténtico sabor a carne y una textura ideal que contribuye a desarrollar dientes fuertes y sanos de tu mascota. Sin colorantes artificiales. Ayuda a mantener el pelo de tu perro más suave y brillante.
',
                'precio' => 18000.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156548-800-auto?v=638343211775700000&width=800&height=auto&aspect=true',
                'stock' => 12,
            ],
            [
                'nombre' => 'Mini Bocaditos Para Perros Bajos en Sodio x 100 gr Golocan',
                'descripcion' => 'Golocan Mini Bocaditos Bajo en Sodio es un snack sin sal agregada, siendo esta la opción ideal para perros que necesitan cuidar su salud. Son mucho más que un simple snack, son la respuesta perfecta para los perros que merecen un mimo saludable. La ausencia de sal agregada los convierte en un premio sabroso y benéfico. Además, son ideales para recompensas durante el entrenamiento.
',
                'precio' => 3500.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156547-800-auto?v=638343211772270000&width=800&height=auto&aspect=true',
                'stock' => 50,
            ],
            [
                'nombre' => 'Huesitos Horneados Para Perros con Chips de Carne x 120 gr Golocan',
                'descripcion' => 'Los Huesitos Horneados Golocan son crocantes y exquisitos snacks con forma de huesitos. Los chips de carne son el toque mágico que hace que estos huesitos sean verdaderamente irresistibles para tu perro. Perfectos para recompensas, entrenamiento o simplemente para hacer sonreír a tu perro en cualquier ocasión.
',
                'precio' => 15500.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156544-800-auto?v=638343211765870000&width=800&height=auto&aspect=true',
                'stock' => 8,
            ],
            [
                'nombre' => 'Disfraz de Calabaza Halloween',
                'descripcion' => 'Divertido disfraz acolchado para octubre. Talle ajustable.',
                'precio' => 21000.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://images.unsplash.com/photo-1508285296758-c0527339893d?auto=format&fit=crop&w=600&q=80',
                'stock' => 15,
            ],
            [
                'nombre' => 'Mini Bocaditos Para Perros Bajos en Grasas x 100 gr Golocan',
                'descripcion' => 'Golocan Mini Bocaditos Bajo en Grasas es un snack reducido en calorías perfecto para mascotas pequeñas Indoor y Outdoor que necesitan cuidar su peso. Su fórmula reducida en calorías está diseñada para satisfacer el paladar de tu perro sin comprometer su peso. Además, son ideales para recompensas durante el entrenamiento.
',
                'precio' => 35000.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156546-800-auto?v=638343211770100000&width=800&height=auto&aspect=true',
                'stock' => 5,
            ],
            [
                'nombre' => 'Snack de Carne Natuplus x 500 ml',
                'descripcion' => 'Los Snacks Natuplus son bocados 100% Carne (Bola de Lomo). Sin harinas, ni aditivos ni conservantes. Contienen 70% Proteína. Elaborados con 1 solo ingrediente: Carne vacuna. Listo para dar como premio. Apto para perros, gatos, hurones y erizos.
',
                'precio' => 2500.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/158247-800-auto?v=638742854134270000&width=800&height=auto&aspect=true',
                'stock' => 40,
            ],
            [
                'nombre' => 'Snack de Pollo Natuplus x 200 ml',
                'descripcion' => 'Los Snacks Natuplus son bocados 100% Carne Liofilizados. Presentación de Pollo (Pechuga de Pollo). Sin harinas, ni aditivos ni conservantes. Contienen 70% Proteína. Elaborados con 1 solo ingrediente: Pechuga de Pollo. Listo para dar como premio. Apto para perros, gatos, hurones y erizos.
',
                'precio' => 16500.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/158252-800-auto?v=638742874535630000&width=800&height=auto&aspect=true',
                'stock' => 20,
            ],
            [
                'nombre' => 'Palitos de Pollo Horneados Para Perros x 450 gr Golocan',
                'descripcion' => 'Los Palitos de Pollo Horneados Golocan son snacks horneados con forma de palitos que los convierten en el snack ideal para sacar a pasear a tu perro. Con auténtico sabor a pollo y una textura ideal que contribuye a desarrollar dientes fuertes y sanos de tu mascota. Sin colorantes artificiales. Fuente de omega 9 y vitamina E. Ayuda a mantener el pelo de tu perro más suave y brillante.

',
                'precio' => 14000.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156549-800-auto?v=638343211778800000&width=800&height=auto&aspect=true',
                'stock' => 15,
            ],
            [
                'nombre' => 'Bocaditos Blandos Para Perros Sabor Carne, Pollo y Chocolate x 100 gr Golocan',
                'descripcion' => 'Golocan Bocaditos son unos deliciosos bocaditos blandos y semihúmedos con sabor a carne, pollo y chocolate que ofrecen una textura suave y jugosa con un mix de sabores ideales para premiar, entrenar o simplemente mostrar cariño a tu mascota.
',
                'precio' => 9000.00,
                'categoria' => 'snacks',
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156537-800-auto?v=638343211746930000&width=800&height=auto&aspect=true',
                'stock' => 30,
            ],

            // ==========================================
            // CATEGORIA: HIGIENE (10 items)
            // ==========================================
            [
                'nombre' => 'Paños Sanitarios Train-e Medium para perros x 40 unidades Beepaw',
                'categoria' => 'Higiene',
                'precio' => 8500,
                'stock' => 50,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/159938-800-auto?v=639008881067700000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'Los Paños de Entrenamiento Beepaw Train-e Medium son paños sanitarios para perros diseñados con tecnología SAP de alta absorción y materiales premium, ofreciendo un rendimiento superior a los paños tradicionales del mercado. Incorporan una superficie hidrofílica de secado rápido que absorbe al instante, un núcleo con tecnología SAP de alta densidad que retiene más líquido que un paño estándar del mismo tamaño y una capa impermeable que evita filtraciones y protege el piso. Su base antideslizante mantiene el paño firme incluso con movimiento, y el sticker de fijación ayuda a evitar que se arrugue o se desplace.
'
            ],
            [
                'nombre' => 'Repuesto Bolsa x 3 unidades Cancat
',
                'categoria' => 'Higiene',
                'precio' => 7200,
                'stock' => 30,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/159634-800-auto?v=638985469558430000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'Respuesto bolsitas de plastico x 3 unidades. Medidas:32 cm de largo x 21 cm de ancho
'
            ],
            [
                'nombre' => 'Cepillo Fruta Verde con Vapor',
                'categoria' => 'Higiene',
                'precio' => 5400,
                'stock' => 40,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/160001-800-auto?v=639011477774730000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'Cepillo fruta color verde con vapor. Recargable y resistente a salpicaduras, no sumergible. Ideal para mascotas de todo tipo de pelo.
'
            ],
            [
                'nombre' => 'Bandeja Sanitaria Medium Con Pasto Sintetico para perros Beepaw
',
                'categoria' => 'Higiene',
                'precio' => 9800,
                'stock' => 25,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/159953-800-auto?v=639008889603630000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'La Bandeja Sanitaria Medium con Pasto Sintético para perros Beepaw es una bandeja diseñada para enseñar a perros medianos a realizar sus necesidades en un lugar adecuado, siendo también apta para gatos. Es portátil, fácil de limpiar y está fabricada con materiales no tóxicos, incorporando un espacio para colocar paños absorbentes. Cuenta con tres capas funcionales: césped sintético con agentes antimicrobianos y aroma atrayente, una bandeja plástica con drenaje eficiente y una base recolectora para líquidos. Sus dimensiones son 67 cm x 41,5 cm x 4 cm, y el material completamente lavable permite eliminar desechos y enjuagá con agua tibia y jabón. Es adecuada para etapas de entrenamiento y para su uso en departamentos, balcones, patios o interiores.
'
            ],
            [
                'nombre' => 'Paños Sanitarios Home Guard x 50 Unidades',
                'categoria' => 'Higiene',
                'precio' => 11200,
                'stock' => 20,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/157623-800-auto?v=638484452918570000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'Los paños sanitarios con tecnología quick dry son ideales para perros de cualquier edad. Las almohadillas de entrenamiento Dogit HOME GUARD brindan 5 capas de protección superior para proteger sus pisos de las manchas, facilitar la limpieza y absorben eficazmente la humedad y los olores. Los paños sanitarios tienen un aroma tentador que ayuda a atraer a los perros, lo que ayuda a garantizar que su perro siempre vaya al lugar correcto.
.'
            ],
            [
                'nombre' => 'Repuesto Bolsa x 4 Unidades Trixie',
                'categoria' => 'Higiene',
                'precio' => 4500,
                'stock' => 100,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/158267-800-auto?v=638745360479930000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'Bolsas para recoger residuos de las mascotas. Contiene 3 unidades.
'
            ],
            [
                'nombre' => 'Rodillo Sacapelo Rash-On',
                'categoria' => 'Higiene',
                'precio' => 13500,
                'stock' => 15,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156371-800-auto?v=638342752973200000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'El Rodillo Saca Pelo Rash On está diseñado para que puedas sacar los pelos de tu perro o tu gato de los sillones, cubrecamas, tapizados y sillas. Cuenta con 60 hojas adhesivas que te permiten realizar una pasada perfecta eliminando todos los pelos. Ideal para mantener limpio tu hogar. Es fácil de transportar.
'
            ],
            [
                'nombre' => 'Shampoo Algas x 250 ml Osspret',
                'categoria' => 'Higiene',
                'precio' => 6900,
                'stock' => 35,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156374-800-auto?v=638342752981800000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'El Osspret Algas es un shampoo diseñado para mantener una adecuada higiene, cuidado y bienestar de tu perro o gato. Remueve la suciedad, la caspa, los residuos grasos y su olor, dejando un aroma más fresco y limpio. Este shampoo revitaliza el pelaje de tu mascota, aportando suavidad y brillo en cada baño. Ofrece una limpieza profunda y cuidadosa para todo tipo de pelajes. Además, su práctico envase de 250 mL facilita su uso y almacenamiento.
'
            ],
            [
                'nombre' => 'Shampoo Máximo Color Blanco x 250 ml Osspret',
                'categoria' => 'Higiene',
                'precio' => 8900,
                'stock' => 18,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/156376-800-auto?v=638342752987630000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'El Osspret Maximo Color Blanco es un shampoo diseñado para dar brillo y realzar el color natural del pelaje de tu perro o gato sin modificarlo, otorgándole belleza máxima y luminosidad. Está especialmente formulado para pelaje blanco, plata, crema, gris y otros tonos de la misma gama. Contiene una fórmula especializada en tonalizar y evitar manchas amarillas. Además, limpia a fondo el pelaje de tu mascota, dándole un aspecto saludable y radiante. Indicaciones: Mojar completamente el pelo de tu mascota con agua tibia, aplicar suficiente cantidad de shampoo para que llegue hasta el cuero cabelludo (30ml para un animal de talla media), masajear hasta obtener abundante espuma y dejar actuar entre 3 y 5 minutos. Enjuagar con agua tibia. Realizar una segunda aplicación y volver a enjuagar completamente.
'
            ],
            [
                'nombre' => 'Shampoo Belleza x 200 ml Maskota',
                'categoria' => 'Higiene',
                'precio' => 5400,
                'stock' => 40,
                'imagen_url' => 'https://kangoopetfoodar.vtexassets.com/arquivos/ids/158379-800-auto?v=638792980072600000&width=800&height=auto&aspect=true',
                'activo' => true,
                'descripcion' => 'Shampoo para perros y gatos diseñado para otorgar brillo y docilidad, dejando un agradable aroma de larga duración. Elaborado con pH neutro. Es el producto apropiado para todas las razas. Limpia en profundidad respetando la piel y el manto. Recomendado como shampoo de uso frecuente. Se puede diluir 1 parte del producto en 3 partes de agua.
'
            ],
        ];

        $now = now();
        foreach ($productos as &$producto) {
            $producto['created_at'] = $now;
            $producto['updated_at'] = $now;
            $producto['activo'] = true;
        }

        DB::table('products')->insert($productos);
    }
}