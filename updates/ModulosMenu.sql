/**
 * Author:  arizaandres
 * Created: 2/02/2018
 */
CREATE TABLE `ModulosMenu` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`itemId`  int(11) NULL DEFAULT 0 ,
`modulo`  varchar(255) NULL ,
`estado`  int(3) NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
;
