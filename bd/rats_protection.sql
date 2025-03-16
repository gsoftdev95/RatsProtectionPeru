-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2025 a las 03:48:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rats_protection`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventosrats`
--

CREATE TABLE `eventosrats` (
  `idevento` int(11) NOT NULL,
  `nombreevento` varchar(50) NOT NULL,
  `imgevento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventosrats`
--

INSERT INTO `eventosrats` (`idevento`, `nombreevento`, `imgevento`) VALUES
(1, 'Cerro viejo2', 'evento-67c217cd8780c.jpeg'),
(2, 'Bike Park Huaral', 'evento-67c1e4e809061.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombreProducto` varchar(255) NOT NULL,
  `categoriaProducto` varchar(20) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(5000) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `tallas` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `especificaciones` text NOT NULL,
  `tipoid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombreProducto`, `categoriaProducto`, `fecha_creacion`, `avatar`, `precio`, `tallas`, `descripcion`, `especificaciones`, `tipoid`) VALUES
(1, 'Canilleras', 'MTB', '2025-03-04 20:31:34', '[\"producto_67c763265f12f.jpeg\",\"producto_67c763265f3c6.jpeg\",\"producto_67c763265f602.jpeg\",\"producto_67c763265f896.jpeg\"]', 65.00, '[\"Estandar regulable\"]', 'Las canilleras RTS, están fabricadas en neoprene, una tela flexible y adaptable fácilmente a la piel sin generar incomodidad al hacer tus entrenamientos. Adicionalmente, tiene el mejor velcro y elástico para regular el ajuste evitando que resbale de su posición. En el interior lleva plástico duro PVC con espuma EVA como sistema reductor de impacto. Las espinilleras son diseñados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter. Preguntar por diseños disponibles.', '[\"\"]', 1),
(2, 'Coderas', 'MTB', '2025-03-02 18:19:55', '[\"producto_67c4a14ba2fea.jpeg\",\"producto_67c4a14ba31be.jpeg\",\"producto_67c4a14ba34f1.jpeg\",\"producto_67c4a14ba3d13.jpeg\"]', 119.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las coderas v3.0 resguardan el codo ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA. El enterizo está fabricado en neoprene con el plus frontal de poliester.', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de maniobrabilidad superior y comodidad en la bicicleta.\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de eva en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(3, 'Guantes', 'MTB', '2025-03-02 18:24:05', '[\"producto_67c4a2458e6ea.jpeg\",\"producto_67c4a2458e9aa.jpg\",\"producto_67c4a2458ec1e.jpg\",\"producto_67c4a2458ef1a.jpeg\"]', 59.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Los guantes RATS ofrecen un ajuste ergonómico con materiales de primera calidad que dan como resultado un guante ligero y de alto rendimiento. Con la adición del sistema de cierre TPR, el ridefit logra un ajuste seguro sin restricciones, lo que le permite concentrarse en el terreno por delante.', '[\"La Palma clarino perforada de una sola capa mejora la comodidad y reduce la vibraci\\u00f3n.\\r\",\"Los paneles de manguito y pulgar airprene brindan m\\u00e1xima protecci\\u00f3n y transpirabilidad.\\r\",\"Ajuste en velcro para cualquier tipo de mu\\u00f1eca.\\r\",\"Polymesh detr\\u00e1s de la mano promueve el flujo de aire y elimina el exceso de humedad.\\r\",\"Los refuerzos el\\u00e1sticos para los dedos mejoran la movilidad y eliminan la humedad.\\r\",\"Puntas de los dedos compatibles con pantalla t\\u00e1ctil para usar con tel\\u00e9fonos inteligentes y GPS.\"]', 1),
(4, 'Impact Short', 'MTB', '2025-03-02 18:25:53', '[\"producto_67c4a2b16d135.jpg\",\"producto_67c4a2b16d4ff.jpg\",\"producto_67c4a2b16d7a7.jpg\",\"producto_67c4a2b1726eb.jpg\"]', 185.00, '[\"28\",\"30\",\"32\",\"34\",\"36\"]', 'Short diseñado pensando en los deportes extremos de alta montaña, lleva espuma EVA como reductor de impacto en la zona de muslos, coxis y cintura. La comodidad es perfecta gracias al enterizo de suplex stretch y a cada pieza de EVA que tiene divisiones en los puntos necesarios para el movimiento, es súper ergonómico y liviano para que te diviertas y estés seguro en cada entrenamiento. Además, cuenta con culote compuesto por un gel 20D que te brinda buena transpirabilidad y alta elasticidad de la esponja para aliviar el dolor o el malestar de la zona de contacto con el sillín. El impact short es perfecto para hacer Enduro, DH, Freeride, XC, Dirt, BMX.', '[\"\"]', 1),
(5, 'Peto', 'MTB', '2025-03-02 18:32:14', '[\"producto_67c4a42e98e0c.jpeg\",\"producto_67c4a42e990ce.jpeg\",\"producto_67c4a42e993e9.jpeg\",\"producto_67c4a42e99604.jpeg\"]', 179.90, '[\"Estandar regulable\"]', 'El Impact forward se puede llevar encima o debajo del jersey. Presenta un diseño articulado de perfil bajo y un ajuste ceñido que se amolda al cuerpo para garantizar una gran libertad de movimientos y mejores resultados sobre la bicicleta . La protección de eva integrada absorbe los impactos sin limitar la movilidad. Su gran cantidad de orificios de ventilación cortados a láser mejoran la transpirabilidad y el flujo de aire.', '[\"Dise\\u00f1o ventilado y articulado que se amolda al cuerpo para darte la m\\u00e1xima comodidad.\\r\",\"La espaldera y pechera extra\\u00edbles aportan protecci\\u00f3n contra los impactos.\\r\",\"Tirantes regulables y cinturilla con hebillas de bloqueo para un ajuste sencillo y seguro\"]', 1),
(6, 'Rodilleras', 'MTB', '2025-03-02 18:34:40', '[\"producto_67c4a4c030033.jpeg\",\"producto_67c4a4c030270.jpeg\",\"producto_67c4a4c03052d.jpeg\",\"producto_67c4a4c030913.jpeg\"]', 169.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las rodilleras v 3 0 resguardan la rodilla ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA El enterizo está fabricado en neoprene con el plus frontal de poliester', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de pedal superior y comodidad en la bicicleta..\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de EVA en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter\"]', 1),
(7, 'Tobilleras', 'MTB', '2025-03-02 18:35:31', '[\"producto_67c4a4f324b03.jpeg\",\"producto_67c4a4f324d7b.jpeg\",\"producto_67c4a4f325038.jpeg\",\"producto_67c4a4f3252e2.jpeg\"]', 75.00, '[\"Estandar regulable\"]', 'La tobillera V3.0 ha sido diseñada para riders de BMX, pero también se adapta para otros deportes como scooter, Skate, MTB o para cualquier deporte de acción en el que conectar con unos pedales o una base es parte del juego. Están fabricadas en malla nylon acompañados de eva y plástico pp en ambos tobillos incluyendo el empeine, que funcionan como reductores de impactos, y a su vez, lleva dos cinturones que estabilizara el tobillo evitando las lesiones de esguince.', '[\"\"]', 1),
(8, 'Bag Bike MTB', 'MTB', '2025-03-02 18:39:21', '[\"producto_67c4a5d9e1d5c.jpeg\",\"producto_67c4a5d9e1f4a.jpeg\",\"producto_67c4a5d9e2179.jpeg\",\"producto_67c4a5d9e25f2.jpeg\"]', 699.00, '[\"Estandar\"]', 'La maleta de viaje es la solución compacta para transportar cualquier tipo de bicicleta. Puedes empacar de forma segura, rápida y comenzar cómodamente tu próxima aventura. Esta maleta de primera calidad está fabricada con materiales extremadamente duraderos que garantizan la perfecta protección de su bicicleta durante el transporte. Adecuado para bicicletas de enduro, gravel, XC, FR, DH < 29“. Distancia máxima entre ejes 130 cm.', '[\"Medidas: 1.33m x 0.90m x 0.27m\\r\",\"Fabricado en tela lona pesada, muy fuerte, impermeable y resistente a desgarros. -Fabricado con correas de velcro para sujetar su bicicleta de forma segura.\\r\",\"Dos compartimentos separados para ruedas, reforzados con varillas de PVC y placas de pl\\u00e1stico para ejes.\\r\",\"Compartimento para todos los accesorios como herramientas, pedales etc.\\r\",\"10 asas externas para maniobrar la bolsa de la bicicleta de forma f\\u00e1cil y adecuada. -Base de madera de 10mm con dos ruedas firmes y dos tubos cuadrados de aluminio super estables para garantizar un desplazamiento perfecto mientras caminas.\\r\",\"Fondo resistente fabricado con un material recubierto de PU y acolchado superior con espuma de 10mm.\\r\",\"La horquilla delantera est\\u00e1 sujetada en dos bloques regulables de espuma, con dos straps y una placa de pl\\u00e1stico debajo para mayor protecci\\u00f3n.\"]', 3),
(9, 'Bolsa Hidratante', 'MTB', '2025-03-02 18:40:56', '[\"producto_67c4a638a9d8d.jpg\",\"producto_67c4a638aa291.jpg\"]', 75.00, '[\"Estandar\"]', '', '[\"Largo: 24 cm.\\r\",\"Ancho: 21 cm..\\r\",\"Peso: 145 g.\\r\",\"\\u2022Material: PU.\\r\",\"Color: azul.\\r\",\"Capacidad: 1 litro.\\r\",\"limpieza: pasar pa\\u00f1o h\\u00famedo.\\r\",\"No aplicar detergentes ni l\\u00edquidos abrasivos\"]', 3),
(10, 'Helmet Bag', 'MTB', '2025-03-02 18:51:44', '[\"producto_67c4a8c088c57.jpeg\",\"producto_67c4a8c088f9b.jpeg\",\"producto_67c4a8c089b0b.jpeg\",\"producto_67c4a8c089d80.jpeg\",\"producto_67c4a8c089fda.jpeg\",\"producto_67c4a8c08a21e.jpeg\"]', 149.00, '[\"Estandar\"]', '', '[\"Gran compartimento principal.\\r\",\"Bolsillo inferior de malla para accesorios.\\r\",\"Bolsillo lateral para protecciones.\\r\",\"Mall a microperforado para permitir un buen flujo de aire y evitar que los malos olores se encierren.\\r\",\"Asa de agarre para facilitar el transporte.\\r\",\"Forro interior de espuma suave y acolchado que mantiene el casco seguro y libre de rayones.\\r\",\"Cuerpo principal duradero de Nylon.\\r\",\"Dimensiones: 25 x 32 x 50 cm.\\r\",\"Puntos de anclaje para conversi\\u00f3n a mochila\\r\",\"Colores disponibles: Camo , acero y negro.\"]', 3),
(11, 'Hip Pack', 'MTB', '2025-03-02 18:53:13', '[\"producto_67c4ab400dec7.jpeg\",\"producto_67c4ab400e0ab.jpeg\",\"producto_67c4ab400e2bf.jpeg\",\"producto_67c4ab400e4d0.jpeg\",\"producto_67c4ab400e6f1.jpeg\"]', 99.00, '[\"Estandar regulable\"]', 'La riñonera HIP PACK esta diseñada para ciclismo de montaña, pensando en los deportistas de alto rendimiento que necesiten hidratarse y llevar muchas cosas en sus viajes o salidas cortas, sin necesidad de ir cargados con una mochila. Se puede usar para trekking o senderismo.', '[\"Material Lona impermeable con forro interior.\\r\",\"Cinturon regulable.\\r\",\"M\\u00faltiples compartimientos interiores y exteriores.\\r\",\"Compartimiento interior para bolsa hidratante de 1.5 L.\\r\",\"Medidas : 26 cm de largo , 21 cm de alto, 12cm de ancho.\\r\",\"Capacidad total 6.5 L.\\r\",\"Salida superior para manguera de hidrataci\\u00f3n.\\r\",\"02 compartimientos en malla con seguros , para botella.\\r\",\"11 Colores disponibles\\r\",\"No incluye bolsa hidratante.\"]', 3),
(12, 'Jersey Space Air', 'MTB', '2025-03-02 19:04:26', '[\"producto_67c4abba17ea6.jpeg\",\"producto_67c4abba180af.jpeg\",\"producto_67c4abba182a2.jpeg\",\"producto_67c4abba1849e.jpeg\",\"producto_67c4abba186af.jpeg\",\"producto_67c4abba188a0.jpeg\"]', 99.00, '[\"L\",\"XL\"]', 'Llévalo contigo a tus mejores trails con el estilo y corte único slimfit sabiendo que e l cuerpo principal de la camiseta utiliza una tela que disipa la humedad gracias a los agujeros para mayor flujo de aire , mientras que los puños delgados de las muñecas y el estiramiento en 4 direcciones te brindaran un ajuste excepcional y una movilidad sin restricciones.', '[\"Materiales: 98 % poli\\u00e9ster, 4 % elastano.\"]', 2),
(13, 'Pantalón MTB Kevlar', 'MTB', '2025-03-02 19:06:30', '[\"producto_67c4ac3654385.jpeg\",\"producto_67c4ac3654698.jpeg\",\"producto_67c4ac36549c6.jpeg\",\"producto_67c4ac3654c00.jpeg\",\"producto_67c4ac3654e49.jpeg\",\"producto_67c4ac3655054.jpeg\",\"producto_67c4ac365529d.jpeg\",\"producto_67c4ac36554d9.jpeg\",\"producto_67c4ac3655710.jpeg\"]', 189.00, '[\"28\",\"30\",\"32\",\"34\",\"36\"]', 'El pantalón MTB ha sido probado en los senderos más duros por nuestros atletas profesionales de MTB. La silueta delgada y la parte inferior de la pierna cónica proporcionan un ajuste listo para la carrera, lo que reduce los enganches y el arrastre. El tejido elástico en todas las direcciones garantiza una impresionante eficiencia de pedaleo para que subas a las cumbres más altas y disfrutes de los descensos. Los paneles de KEVLAR en rodillas aumentan la durabilidad para mejorar la resistencia a la abrasión. Mantén la frescura todo el día gracias a los puntos claves de ventilación hechos a laser en la parte delantera y trasera del pantalón para eliminar el sudor de tu cuerpo. El material lleva un acabado de doble costura para que soporte cualquier tipo de fuerza y el cierre de hebilla perfecto para competición, ofrece un ajuste seguro y rápido sobre la marcha. Poliéster 94% ,Spandex 6%.', '[\"\"]', 2),
(14, 'Short MTB', 'MTB', '2025-03-02 19:07:34', '[\"producto_67c4ac763ee45.jpg\",\"producto_67c4ac763f281.jpg\",\"producto_67c4ac763f5ec.jpeg\",\"producto_67c4ac764022f.jpeg\"]', 139.00, '[\"28\",\"30\",\"32\",\"34\",\"36\"]', 'El Short es fundamental para tus entrenamientos de MTB, incluso puedes usarlo para acampar, hacer senderismo, correr y cualquier otra actividad al aire libre. Funcionarán en las condiciones más duras, día tras día. El cierre trinquete de carrera, proporciona un ajuste seguro y rápido sobre la marcha. El tejido elástico y de secado rapido en todos los sentidos ofrece una gama completa de comodidad y movimiento. Las áreas perforadas con láser mapeadas en los paneles frontales y posteriores aumentan el flujo de aire y lo mantienen fresco en cada momento. Las costuras están selladas para un refuerzo adicional en las zonas críticas de rendimiento.', '[\"Colores: Negro, Plomo rats, rojo y acero.\"]', 2),
(15, 'Straps MTB', 'MTB', '2025-03-02 19:09:03', '[\"producto_67c4ad2f47867.jpg\",\"producto_67c4ad2f47a41.jpg\"]', 22.00, '[\"Estandar\"]', 'Olvídate del canguro o mochila , pero no te olvides de lo esencial en tu pedaleo.', '[\"Tejido nylon de alta durabiliad.\\r\",\"Velcro americano.\\r\",\"Fijaci\\u00f3n Interior.\\r\",\"Fijaci\\u00f3n exterior.\\r\",\"45cm de longitud.\\r\",\"04cm de ancho.\\r\",\"1.05mm de espesor.\\r\",\"Dise\\u00f1o anticaidas.\\r\",\"Super practico de usar.\\r\",\"Comodidad al manejar.\\r\",\"08 colores disponibles.\"]', 3),
(16, 'Tailgate Cover Pick Up', 'MTB', '2025-03-02 19:13:07', '[\"producto_67c4adc3a5e25.jpeg\",\"producto_67c4adc3a6170.jpeg\",\"producto_67c4adc3a63f5.jpeg\",\"producto_67c4adc3a66bc.jpeg\"]', 299.00, '[\"S\\/M\",\"L\\/XL\"]', 'Nuestro TAILGATE COVER para tu portón trasero, cuenta con protección acolchada para tus posesiones más preciadas. Con un resistente nylon y un revestimiento interior microcepillado , el pad está diseñado para mantener su camioneta y hasta 06 bicicletas limpias y seguras.', '[\"Las almohadillas elevadas protegen las bicicletas y su veh\\u00edculo de da\\u00f1os.\\r\",\"Las correas aseguran las bicicletas en su lugar para que no se muevan.\\r\",\"Medidas S\\/M: 1.35 m x 0.90 m para 5 bicicletas.\\r\",\"Medidas L\\/XL: 1.49 m x 1.05 m para 6 bicicletas.\\r\",\"Logo reflectivo para carretera.\\r\",\"El tama\\u00f1o es est\\u00e1ndar regulable para cualquier modelo de pick up.\"]', 3),
(17, 'Canilleras', 'BMX', '2025-03-02 19:35:30', '[\"producto_67c4b302056cf.jpeg\",\"producto_67c4b3020591b.jpeg\",\"producto_67c4b30205b61.jpeg\",\"producto_67c4b30205d3f.jpeg\"]', 65.00, '[\"Estandar regulable\"]', 'Las canilleras RTS, están fabricadas en neoprene, una tela flexible y adaptable fácilmente a la piel sin generar incomodidad al hacer tus entrenamientos. Adicionalmente, tiene el mejor velcro y elástico para regular el ajuste evitando que resbale de su posición. En el interior lleva plástico duro PVC con espuma EVA como sistema reductor de impacto. Las espinilleras son diseñados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter. Preguntar por diseños disponibles.', '[\"\"]', 1),
(18, 'Coderas', 'BMX', '2025-03-02 19:36:27', '[\"producto_67c4b33b62010.jpeg\",\"producto_67c4b33b62272.jpeg\",\"producto_67c4b33b62450.jpeg\",\"producto_67c4b33b62fec.jpeg\"]', 119.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las coderas v3.0 resguardan el codo ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA. El enterizo está fabricado en neoprene con el plus frontal de poliester.', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de maniobrabilidad superior y comodidad en la bicicleta.\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de EVA en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(19, 'Guantes', 'BMX', '2025-03-02 19:37:28', '[\"producto_67c4b378def08.jpeg\",\"producto_67c4b378df0e8.jpg\",\"producto_67c4b378df2d9.jpg\",\"producto_67c4b378df597.jpeg\"]', 59.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Los guantes RATS ofrecen un ajuste ergonómico con materiales de primera calidad que dan como resultado un guante ligero y de alto rendimiento. Con la adición del sistema de cierre TPR, el ridefit logra un ajuste seguro sin restricciones, lo que le permite concentrarse en el terreno por delante.', '[\"La Palma clarino perforada de una sola capa mejora la comodidad y reduce la vibraci\\u00f3n.\\r\",\"Los paneles de manguito y pulgar airprene brindan m\\u00e1xima protecci\\u00f3n y transpirabilidad.\\r\",\"Ajuste en velcro para cualquier tipo de mu\\u00f1eca.\\r\",\"Polymesh detr\\u00e1s de la mano promueve el flujo de aire y elimina el exceso de humedad.\\r\",\"Los refuerzos el\\u00e1sticos para los dedos mejoran la movilidad y eliminan la humedad.\\r\",\"Puntas de los dedos compatibles con pantalla t\\u00e1ctil para usar con tel\\u00e9fonos inteligentes y GPS.\"]', 1),
(20, 'Impact Short', 'BMX', '2025-03-02 19:38:09', '[\"producto_67c4b3a1ca40e.jpg\",\"producto_67c4b3a1ca5dc.jpg\",\"producto_67c4b3a1ca7cb.jpg\",\"producto_67c4b3a1ca9ca.jpg\"]', 185.00, '[\"28\",\"30\",\"32\",\"34\",\"36\"]', 'Short diseñado pensando en los deportes extremos de alta montaña, lleva espuma EVA como reductor de impacto en la zona de muslos, coxis y cintura. La comodidad es perfecta gracias al enterizo de suplex stretch y a cada pieza de EVA que tiene divisiones en los puntos necesarios para el movimiento, es súper ergonómico y liviano para que te diviertas y estés seguro en cada entrenamiento. Además, cuenta con culote compuesto por un gel 20D que te brinda buena transpirabilidad y alta elasticidad de la esponja para aliviar el dolor o el malestar de la zona de contacto con el sillín. El impact short es perfecto para hacer Enduro, DH, Freeride, XC, Dirt, BMX.', '[\"\"]', 1),
(21, 'Rodicanilleras', 'BMX', '2025-03-02 19:40:13', '[\"producto_67c4b41dc029d.jpeg\",\"producto_67c4b41dc0468.jpeg\",\"producto_67c4b41dc4849.jpeg\",\"producto_67c4b41dc4aeb.jpeg\"]', 169.00, '[\"Estandar regulable\"]', 'Las rodicanilleras RTS utilizan la tela neoprene como enterizo en combinación con diferentes espesores de EVA para evadir el impacto, todo eso para mantener segura tu rodilla; y para la canilla, usa una sección de cuero castor en compañía de un plástico duro y espuma EVA para darte niveles definitivos de protección sin sacrificar la maniobrabilidad.', '[\"\"]', 1),
(22, 'Rodilleras', 'BMX', '2025-03-02 19:41:07', '[\"producto_67c4b453d7f9b.jpeg\",\"producto_67c4b453d87c8.jpeg\",\"producto_67c4b453d8b95.jpeg\",\"producto_67c4b453d8e73.jpeg\"]', 169.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las rodilleras v 3 0 resguardan la rodilla ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA El enterizo está fabricado en neoprene con el plus frontal de poliester', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de pedal superior y comodidad en la bicicleta..\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de eva en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(23, 'Tobilleras', 'BMX', '2025-03-02 19:42:56', '[\"producto_67c4b4c08440c.jpeg\",\"producto_67c4b4c084614.jpeg\",\"producto_67c4b4c0847f6.jpeg\",\"producto_67c4b4c0849c1.jpeg\"]', 75.00, '[\"Estandar regulable\"]', 'La tobillera V3.0 ha sido diseñada para riders de BMX, pero también se adapta para otros deportes como scooter, Skate, MTB o para cualquier deporte de acción en el que conectar con unos pedales o una base es parte del juego. Están fabricadas en malla nylon acompañados de eva y plástico pp en ambos tobillos incluyendo el empeine, que funcionan como reductores de impactos, y a su vez, lleva dos cinturones que estabilizara el tobillo evitando las lesiones de esguince.', '[\"\"]', 1),
(24, 'Bag Pack', 'BMX', '2025-03-02 20:11:32', '[\"producto_67c4bb746b4c0.jpeg\",\"producto_67c4bb746b77a.jpeg\",\"producto_67c4bb746b9af.jpeg\",\"producto_67c4bb746bbbf.jpeg\"]', 115.00, '[\"Estandar\"]', 'u diseño tiene una funcionalidad para tu rutina diaria o aventuras lejanas', '[\"Compartimiento principal espacioso\\r\",\"Funda interna para laptop\\r\",\"Bolsillos laterales con seguro\\r\",\"Asa de arrastre en la parte superior\\r\",\"Correas frontales para casco\\r\",\"Hombreras acolchadas\\r\",\"Seguro de pecho tipo arn\\u00e9s\\r\",\"Material impermeable\\r\",\"Tela lona poli\\u00e9ster\\r\",\"Capacidad total de 25 L\"]', 3),
(25, 'Maleta BMX', 'BMX', '2025-03-02 20:13:13', '[\"producto_67c4bbd947cec.jpg\",\"producto_67c4bbd947ee8.jpeg\",\"producto_67c4bbd9480f4.jpeg\",\"producto_67c4bbd9482d7.jpeg\"]', 249.00, '[\"Estandar\"]', 'RATS BAG viaja como un profesional y evita problemas de aerolíneas. Diseñado en el paquete más pequeño posible Esta maleta de primera calidad está fabricada con materiales extremadamente duraderos que garantizan la perfecta protección de su bicicleta durante el transporte. Puedes aprovechar al máximo todos sus espacios para que tengas una aventura inolvidable', '[\"Medida: 88 cm * 49 cm * 25 cm\\r\",\"Fondo fibra pl\\u00e1stica.\\r\",\"M\\u00faltiples correas internas.\\r\",\"Laterales s\\u00faper acolchados.\\r\",\"02 asas para cargar la maleta vac\\u00eda en la espalda.\\r\",\"03 ruedas firmes para garantizar su libre transporte.\\r\",\"Tela lona pesada poli\\u00e9ster.\"]', 3),
(26, 'Frame Bag', 'BMX', '2025-03-02 20:16:26', '[\"producto_67c4bc9a9622e.jpg\",\"producto_67c4bc9a96412.jpg\",\"producto_67c4bc9a96690.jpg\",\"producto_67c4bc9a96882.jpg\"]', 20.00, '[\"Estandar\"]', '', '[\"Medidas: 15 cm * 24 cm * 0.5 cm\\r\",\"Impermeable.\\r\",\"S\\u00faper practico.\\r\",\"F\\u00e1cil instalaci\\u00f3n.\\r\",\"Adaptable a cualquier tipo de bicicleta.\\r\",\"04 sistemas de fijaci\\u00f3n.\"]', 3),
(27, 'Switch Pack', 'BMX', '2025-03-02 20:20:41', '[\"producto_67c4bd993a4e4.jpeg\",\"producto_67c4bd993a6a7.jpeg\",\"producto_67c4bd993a8d2.jpeg\",\"producto_67c4bd993aafe.jpeg\"]', 30.00, '', 'La manera más práctica de llevar tus accesorios, sin que te preocupes por donde transportarlo, esto gracias a su diseño convertible. Puede ser en el timón, en la cintura, el cuadro o en el pecho sea el lugar que sea, tus accesorios siempre estarán seguros y te sentiras cómodo porque encontraras todo de forma mas rápida Compatible con BMX y MTB', '[\"Medidas: 20 cm * 11.5 cm * 6 cm\\r\",\"Doble compartimiento.\\r\",\"Impermeable.\\r\",\"Regulable para pecho y cintura.\\r\",\"Incluye 06 velcros de fijaci\\u00f3n.\\r\",\"Adaptable a todo tipo de bicicleta.\"]', 3),
(28, 'Canilleras', 'Roller', '2025-03-04 16:17:41', '[\"producto_67c727a58c0d6.jpeg\",\"producto_67c727a58c2e3.jpeg\",\"producto_67c727a58c4dd.jpeg\",\"producto_67c727a58c6e9.jpeg\"]', 65.00, '[\"Estandar regulable\"]', 'Las canilleras RTS, están fabricadas en neoprene, una tela flexible y adaptable fácilmente a la piel sin generar incomodidad al hacer tus entrenamientos. Adicionalmente, tiene el mejor velcro y elástico para regular el ajuste evitando que resbale de su posición. En el interior lleva plástico duro PVC con espuma EVA como sistema reductor de impacto. Las espinilleras son diseñados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter. Preguntar por diseños disponibles.', '[\"\"]', 1),
(29, 'Coderas', 'Roller', '2025-03-04 16:19:35', '[\"producto_67c728179ba33.jpeg\",\"producto_67c728179bd4d.jpeg\",\"producto_67c728179c42b.jpeg\",\"producto_67c728179c81a.jpeg\"]', 119.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las coderas v3.0 resguardan el codo ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA. El enterizo está fabricado en neoprene con el plus frontal de poliester.', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de maniobrabilidad superior y comodidad en la bicicleta.\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de EVA en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(30, 'Guantes', 'Roller', '2025-03-04 16:31:26', '[\"producto_67c72ade24cb8.jpeg\",\"producto_67c72ade24f0d.jpg\",\"producto_67c72ade251a7.jpg\",\"producto_67c72ade254ad.jpeg\"]', 59.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Los guantes RATS ofrecen un ajuste ergonómico con materiales de primera calidad que dan como resultado un guante ligero y de alto rendimiento. Con la adición del sistema de cierre TPR, el ridefit logra un ajuste seguro sin restricciones, lo que le permite concentrarse en el terreno por delante.', '[\"La Palma clarino perforada de una sola capa mejora la comodidad y reduce la vibraci\\u00f3n.\\r\",\"Los paneles de manguito y pulgar airprene brindan m\\u00e1xima protecci\\u00f3n y transpirabilidad.\\r\",\"Ajuste en velcro para cualquier tipo de mu\\u00f1eca.\\r\",\"Polymesh detr\\u00e1s de la mano promueve el flujo de aire y elimina el exceso de humedad.\\r\",\"Los refuerzos el\\u00e1sticos para los dedos mejoran la movilidad y eliminan la humedad.\\r\",\"Puntas de los dedos compatibles con pantalla t\\u00e1ctil para usar con tel\\u00e9fonos inteligentes y GPS.\"]', 1),
(31, 'Impact Short', 'Roller', '2025-03-04 16:32:12', '[\"producto_67c72b0c10b59.jpg\",\"producto_67c72b0c10ed3.jpg\",\"producto_67c72b0c112fa.jpg\",\"producto_67c72b0c117f6.jpg\"]', 185.00, '[\"28\",\"30\",\"32\",\"34\",\"36\"]', 'Short diseñado pensando en los deportes extremos de alta montaña, lleva espuma EVA como reductor de impacto en la zona de muslos, coxis y cintura. La comodidad es perfecta gracias al enterizo de suplex stretch y a cada pieza de EVA que tiene divisiones en los puntos necesarios para el movimiento, es súper ergonómico y liviano para que te diviertas y estés seguro en cada entrenamiento. Además, cuenta con culote compuesto por un gel 20D que te brinda buena transpirabilidad y alta elasticidad de la esponja para aliviar el dolor o el malestar de la zona de contacto con el sillín. El impact short es perfecto para hacer Enduro, DH, Freeride, XC, Dirt, BMX.', '[\"\"]', 1),
(32, 'Rodilleras', 'Roller', '2025-03-04 16:33:07', '[\"producto_67c72b4355cb3.jpeg\",\"producto_67c72b4355efc.jpeg\",\"producto_67c72b43561b7.jpeg\",\"producto_67c72b4356489.jpeg\"]', 169.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las rodilleras v 3 0 resguardan la rodilla ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA El enterizo está fabricado en neoprene con el plus frontal de poliester', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de pedal superior y comodidad en la bicicleta..\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de eva en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(33, 'Canilleras', 'ScooterSkate', '2025-03-04 16:35:18', '[\"producto_67c72bc69dd51.jpeg\",\"producto_67c72bc69dfb2.jpeg\",\"producto_67c72bc69e255.jpeg\",\"producto_67c72bc69e53d.jpeg\"]', 65.00, '[\"Estandar regulable\"]', 'Las canilleras RTS, están fabricadas en neoprene, una tela flexible y adaptable fácilmente a la piel sin generar incomodidad al hacer tus entrenamientos. Adicionalmente, tiene el mejor velcro y elástico para regular el ajuste evitando que resbale de su posición. En el interior lleva plástico duro PVC con espuma EVA como sistema reductor de impacto. Las espinilleras son diseñados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter. Preguntar por diseños disponibles.', '[\"\"]', 1),
(34, 'Coderas', 'ScooterSkate', '2025-03-04 16:44:30', '[\"producto_67c72deed0cc8.jpeg\",\"producto_67c72deed0fb3.jpeg\",\"producto_67c72deed123d.jpeg\",\"producto_67c72deed14d2.jpeg\"]', 119.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las coderas v3.0 resguardan el codo ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA. El enterizo está fabricado en neoprene con el plus frontal de poliester.', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de maniobrabilidad superior y comodidad en la bicicleta.\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de EVA en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(35, 'Impact Short', 'ScooterSkate', '2025-03-04 16:45:16', '[\"producto_67c72e1c982cf.jpg\",\"producto_67c72e1c985f5.jpg\",\"producto_67c72e1c988e8.jpg\",\"producto_67c72e1c98bd6.jpg\"]', 185.00, '[\"28\",\"30\",\"32\",\"34\",\"36\"]', 'Short diseñado pensando en los deportes extremos de alta montaña, lleva espuma EVA como reductor de impacto en la zona de muslos, coxis y cintura. La comodidad es perfecta gracias al enterizo de suplex stretch y a cada pieza de EVA que tiene divisiones en los puntos necesarios para el movimiento, es súper ergonómico y liviano para que te diviertas y estés seguro en cada entrenamiento. Además, cuenta con culote compuesto por un gel 20D que te brinda buena transpirabilidad y alta elasticidad de la esponja para aliviar el dolor o el malestar de la zona de contacto con el sillín. El impact short es perfecto para hacer Enduro, DH, Freeride, XC, Dirt, BMX.', '[\"\"]', 1),
(36, 'Rodilleras', 'ScooterSkate', '2025-03-04 16:46:31', '[\"producto_67c72e678cc70.jpeg\",\"producto_67c72e678d1c4.jpeg\",\"producto_67c72e678d618.jpeg\",\"producto_67c72e678dac9.jpeg\"]', 169.00, '[\"S\",\"M\",\"L\",\"XL\"]', 'Las rodilleras v 3 0 resguardan la rodilla ante cualquier impacto, esto gracias a los diferentes espesores de EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad ya que lleva cortes internos y espacios en cada pieza de EVA El enterizo está fabricado en neoprene con el plus frontal de poliester', '[\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de pedal superior y comodidad en la bicicleta..\\r\",\"Muy resistentes a los impactos gracias a sus diferentes espesores de EVA en su estructura.\\r\",\"Dise\\u00f1ados para hacer Enduro, DH, Freeride, XC, Dirt, BMX, Skate, Roller y Scooter.\"]', 1),
(37, 'Coderas', 'Kids', '2025-03-04 16:47:02', '[\"producto_67c72eeb769b0.jpeg\",\"producto_67c72eeb76b6b.jpeg\"]', 65.00, '[\"Estandar\"]', 'Las coderas resguardan el codo ante cualquier impacto, esto gracias a la espuma EVA que lleva en el interior, al mismo tiempo permiten una gran flexibilidad gracias a los cortes internos y espacios en cada pieza de EVA.\r\nEl enterizo está fabricado en neoprene', '[\"02 a 12 a\\u00f1os\\r\",\"Mayor comodidad gracias al neoprene no t\\u00f3xico e hipoalerg\\u00e9nico.\\r\",\"Paneles de dise\\u00f1o anat\\u00f3mico que proporcionan una eficiencia de maniobrabilidad superior y comodidad.\\r\",\"Muy resistentes a los impactos gracias a su estructura de eva y neoprene.\"]', 1),
(38, 'Impact Short', 'Kids', '2025-03-04 17:22:33', '[\"producto_67c736d945f62.jpeg\",\"producto_67c736d94613c.jpeg\",\"producto_67c736d94634e.jpg\",\"producto_67c736d94654a.jpg\"]', 155.00, '[\"8\",\"10\",\"12\",\"14\",\"16\"]', 'Short diseñado pensando en los deportes extremos , lleva espuma EVA como reductor de impacto en la zona de muslos, coxis y cintura. La comodidad es perfecta gracias al enterizo suplex stretch y a cada pieza de EVA con divisiones en los puntos necesarios para el movimiento, es súper ergonómico y liviano para que te diviertas y estés seguro en cada entrenamiento. El impact short es perfecto para hacer MTB, BMX, Skate, Roller y Scooter.', '[\"\"]', 1),
(39, 'Peto', 'Kids', '2025-03-04 17:30:42', '[\"producto_67c738c2c0285.jpeg\",\"producto_67c738c2c0806.jpeg\"]', 129.00, '[\"Estandar regulable\"]', 'El Impact forward se puede llevar encima o debajo del jersey. Presenta un diseño articulado de perfil bajo y un ajuste ceñido que se amolda al cuerpo para garantizar una gran libertad de movimientos y mejores resultados. La protección de espuma eva integrada absorbe los impactos sin limitar la movilidad. Su gran cantidad de orificios de ventilación cortados a láser mejoran la transpirabilidad y el flujo de aire.', '[\"02 a 14 a\\u00f1os\\r\",\"Dise\\u00f1o ventilado y articulado que se amolda al cuerpo para darte la m\\u00e1xima comodidad.\\r\",\"La espaldera y pechera extra\\u00edbles aportan protecci\\u00f3n contra los impactos.\\r\",\"Tirantes regulables y cinturilla con hebillas de bloqueo para un ajuste sencillo y seguro.\"]', 1),
(40, 'Knee / Shin Guards', 'Kids', '2025-03-04 17:31:50', '[\"producto_67c73906d85e0.jpg\",\"producto_67c73906d8987.jpg\"]', 119.00, '[\"Estandar regulable\"]', 'Las rodicanilleras RTS utilizan la tela neoprene como enterizo en combinación con EVA para evadir el impacto, todo eso para mantener segura tu rodilla. Y para la canilla, usa una sección de cuero castor en compañía de un plástico duro y espuma EVA para darte niveles definitivos de protección sin sacrificar la maniobrabilidad.', '[\"02 a 14 a\\u00f1os\"]', 1),
(41, 'Bag Pack', 'Extras', '2025-03-04 19:53:10', '[\"producto_67c75f0d69031.jpeg\",\"producto_67c75f0d69222.jpeg\",\"producto_67c75f0d69419.jpeg\",\"producto_67c75f0d69606.jpeg\"]', 115.00, '[\"Estandar\"]', 'Su diseño tiene una funcionalidad para tu rutina diaria o aventuras lejanas', '[\"Compartimiento principal espacioso\\r\",\"Funda interna para laptop\\r\",\"Bolsillos laterales con seguro\\r\",\"Asa de arrastre en la parte superior\\r\",\"Correas frontales para casco\\r\",\"Hombreras acolchadas\\r\",\"Seguro de pecho tipo arn\\u00e9s\\r\",\"Material impermeable\\r\",\"Tela lona poli\\u00e9ster\\r\",\"Capacidad total de 25 L\"]', 3),
(42, 'Caps', 'Extras', '2025-03-04 19:55:22', '[\"producto_67c75aaa5237c.jpeg\",\"producto_67c75aaa525dd.jpeg\"]', 49.00, '[\"Estandar\"]', 'Obtén un estilo para todo el día con un forro DRI-FIT para mantener la cabeza seca y fresca, además de paneles traseros perforados y regulación con velcro.', '[\"\"]', 3),
(43, 'Key Chain', 'Extras', '2025-03-04 20:10:46', '[\"producto_67c75e46e21bd.jpeg\",\"producto_67c75e46e239b.jpeg\"]', 12.00, '[\"Estandar\"]', 'Descripción: La manera más fácil de localizar, transportar y organizar pequeños objetos como las llaves', '[\"\"]', 3),
(44, 'Poleras', 'Extras', '2025-03-04 20:11:56', '[\"producto_67c75e8cc5d02.jpeg\",\"producto_67c75e8cc5eec.jpeg\"]', 69.00, '[\"M\",\"L\",\"XL\"]', '', '[\"Descripci\\u00f3n:\\r\",\"100% Franela Reactiva..\\r\",\"Capucha\\r\",\"No encoge , no desti\\u00f1e.\\r\",\"Bolsillo en la parte inferior.\\r\",\"Excelente acabado y confecci\\u00f3n.\"]', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teamrats`
--

CREATE TABLE `teamrats` (
  `idteamrats` int(11) NOT NULL,
  `nombre` varchar(29) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `imgteamrats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `teamrats`
--

INSERT INTO `teamrats` (`idteamrats`, `nombre`, `apellido`, `imgteamrats`) VALUES
(7, 'Angel', 'Amaro', 'evento-67c2353c650e4.png'),
(8, 'Juan', 'Jara', 'avatar-67bfd75911807.png'),
(9, 'Julio', 'Roncal', 'avatar-67bfdb6e25adf.jpeg'),
(10, 'Luis', 'Andres', 'avatar-67bfdb79e05e5.jpg'),
(11, 'Manuel', 'Puma', 'avatar-67bfdb858179c.jpeg'),
(12, 'Marco', 'Nuñez', 'avatar-67bfdb918a665.jpeg'),
(13, 'Mathias', 'Dugarte', 'avatar-67bfdc062ecfd.jpeg'),
(14, 'Pablo', 'Montalvo', 'avatar-67bfdc12bc3bd.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductos`
--

CREATE TABLE `tipoproductos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproductos`
--

INSERT INTO `tipoproductos` (`id`, `categoria`) VALUES
(1, 'Protecciones'),
(2, 'Ropa'),
(3, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorats`
--

CREATE TABLE `usuariorats` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariorats`
--

INSERT INTO `usuariorats` (`id`, `nombre`, `apellidos`, `correo`, `password`, `perfil`) VALUES
(2, 'geanDEV', 'Huaman', 'gesoftdev@gmail.com', '$2y$10$A.yWkKYkZ7PK/QCjSjiX4erOdEJ5a35OTJQxm3KXo9ac0I1..76Wi', 9),
(3, 'gean', 'Huaman', 'gean@gmail.com', '$2y$10$JEGUIKy.6rYVfKP8uIiAuO6vBBzPuPbOiI1rfmsVf2whawCT.uaUu', 1),
(21, 'gean', 'Huaman', 'fransbmx1995@hotmail.com', '$2y$10$UzrFUZrgBKkuwMBWqnMLz.3IAfvz2wRD7KNnVrEaDtjkBdhJrTWK.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventosrats`
--
ALTER TABLE `eventosrats`
  ADD PRIMARY KEY (`idevento`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`tipoid`);

--
-- Indices de la tabla `teamrats`
--
ALTER TABLE `teamrats`
  ADD PRIMARY KEY (`idteamrats`);

--
-- Indices de la tabla `tipoproductos`
--
ALTER TABLE `tipoproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariorats`
--
ALTER TABLE `usuariorats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventosrats`
--
ALTER TABLE `eventosrats`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `teamrats`
--
ALTER TABLE `teamrats`
  MODIFY `idteamrats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipoproductos`
--
ALTER TABLE `tipoproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuariorats`
--
ALTER TABLE `usuariorats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`tipoid`) REFERENCES `tipoproductos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
