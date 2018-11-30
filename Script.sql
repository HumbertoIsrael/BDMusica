create table Proveedor(rfc varchar(45) primary key not null, email varchar(45), dir varchar(45), tel int, nombre varchar(45), cond tinyint);
create table Producto(idProducto int primary key not null, nombre varchar(45), precio double, imagen varchar(45), descripcion varchar(100));
create table Socio(curp varchar(45) primary key not null, fechaExpira date, fechaAlta date, nombre varchar(45), apPat varchar(45), apMat varchar(45));
create table Gerente(rfc varchar(45) primary key not null, dir varchar(45), usuario varchar(45), password varchar(45), nombre varchar(45), apPat varchar(45), apMat varchar(45), tel int);
create table Sucursal(idSucursal int primary key not null auto_increment , idGerente varchar(45) unique, dir varchar(45), nombre varchar(45), tel int, foreign key(idGerente) references Gerente(rfc) on delete cascade on update cascade);
create table Inventario(idProducto int not null, idSucursal int not null, unidades int, primary key(idProducto, idSucursal), foreign key(idSucursal) references Sucursal(idSucursal) on delete cascade on update cascade, foreign key(idProducto) references Producto(idProducto) on delete cascade on update cascade);
create table Compra(idCompra int primary key not null, idProveedor varchar(45), idSucursal int, idProducto int, unidades int, fecha date, importe float, foreign key(idProveedor) references Proveedor(rfc) on delete cascade on update cascade, foreign key(idSucursal) references Sucursal(idSucursal) on delete cascade on update cascade, foreign key(idProducto) references Producto(idProducto) on delete cascade on update cascade);
create table Cajero(rfc varchar(45) primary key not null, idSucursal int, dir varchar(45), nombre varchar(45), apPat varchar(45), apMat varchar(45), tel int, cond tinyint, foreign key(idSucursal) references Sucursal(idSucursal) on delete cascade on update cascade);
create table Venta(idVenta int primary key not null auto_increment, idCajero varchar(45), idSocio varchar(45), fecha date, importe float, foreign key(idCajero) references Cajero(rfc) on delete cascade on update cascade, foreign key(idSocio) references Socio(curp) on delete cascade on update cascade);
create table productosVta(idVenta int not null, idProducto int not null, unidades int, primary key(idVenta, idProducto), foreign key(idVenta) references Venta(idVenta) on delete cascade on update cascade, foreign key(idProducto) references Producto(idProducto) on delete cascade on update cascade);
insert into Gerente values('OERA971231', 'Av. Mi moto Col. Al Pino Derrapante', 'blak', SHA1('blak'), 'Angel', 'Ortega', 'Ramirez', 55555555);
insert into Gerente values('OERA971232', 'Av. Mi moto Col. Al Pino Derrapante', 'blak2', SHA1('blak'), 'Angel', 'Ortega', 'Ramirez', 55555555);
insert into Sucursal values(1, 'OERA971231', 'Av. El perrito #100', 'El perrito', 25252525);
insert into Sucursal values(2, 'OERA971232', 'Calle 11 #2', 'Lomas Estrella', 10203040);
insert into Proveedor values('XNOR335522', 'contacto@frms.com', 'El monte 22', 15231523, 'Frozen Music', 1);
insert into Producto values(1, 'Cepillo', 12.95, 'cepillo.jpg', 'Cepillo de dientes');
insert into Producto values(2, 'Cartera', 100.00, 'cartera.jpg', 'Para billetes y monedas - Hombre');
insert into Compra values(1, 'XNOR335522', 1, 1, 3, '2010-10-10', 38.95);
insert into Inventario values(1, 1, 12);
insert into Inventario values(2, 1, 20);
insert into Inventario values(1, 2, 5);
insert into Inventario values(2, 2, 3);
insert into Cajero values('PENX123456', 1, 'Los pinos 123', 'Enrique', 'Pena', 'Nieto', 00990099, 1);
insert into Socio values('AABB998877HDFCDE22', '2019-01-01', '2018-12-31', 'AAAA', 'BBBB', 'BBBB');
insert into Venta values(1, 'PENX123456', 'AABB998877HDFCDE22', '2018-11-18', 12.95);
insert into productosVta values(1, 1, 1);
