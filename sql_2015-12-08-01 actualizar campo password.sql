-- Al utilizar el sistema de encriptación de PHP 5.5 en CakePHP, el campo
-- donde se guarda la contraseña encriptada debe tener una longitud de 60
-- caracteres minimo para que pueda almacenarse correctamente. Eso si se
-- usa el algoritmo de hash de tipo "PASSWORD_BCRYPT" en la configuracion
-- del componente "Auth" en el atributo "passwordHasher", sino debe tener
-- entre 60 y 255 caracteres si se usa el tipo "PASSWORD_DEFAULT" que es
-- el predeterminado.
-- El usuario que se crea con ID=1 tiene de clave "admin".
ALTER TABLE `daw_recetas`.`usuarios` CHANGE `password` `password` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

INSERT INTO `daw_recetas`.`usuarios` (`id`, `email`, `password`, `nombre`, `rol`, `aceptado`, `creado`) VALUES ('1', 'admin@admin.es', '$2y$10$LCEFSOiRqUrVLET3macDQ.3ZwYmtMpQtqFWR.Oz56w6hLu1T6kHKS', 'Admin', 'A', '1', '2015-12-08 20:07:00');