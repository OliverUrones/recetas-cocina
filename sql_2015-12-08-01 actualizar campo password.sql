-- Al utilizar el sistema de encriptación de PHP 5.5 en CakePHP, el campo
-- donde se guarda la contraseña encriptada debe tener una longitud de 60
-- caracteres minimo para que pueda almacenarse correctamente. Eso si se
-- usa el algoritmo de hash de tipo "PASSWORD_BCRYPT" en la configuracion
-- del componente "Auth" en el atributo "passwordHasher", sino debe tener
-- entre 60 y 255 caracteres si se usa el tipo "PASSWORD_DEFAULT" que es
-- el predeterminado.
ALTER TABLE `usuarios` CHANGE `password` `password` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;