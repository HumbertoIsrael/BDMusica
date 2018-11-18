create table Proveedor(rfc varchar(45) primary key not null, email varchar(45), dir varchar(45), tel int, nombre varchar(45), cond tinyint);
create table Producto(id_producto int primary key not null, nombre varchar(45), precio double, imagen varchar(45));
create table Socio(curp varchar(45) primary key not null, fechaExpira date, fechaAlta date, nombre varchar(45), ap_pat varchar(45), ap_mat varchar(45));
create table Gerente(rfc varchar(45) primary key not null, dir varchar(45), usuario varchar(45), password varchar(45), nombre varchar(45), ap_pat varchar(45), ap_mat varchar(45), tel int);
create table Sucursal(id_sucursal int primary key not null, id_gerente varchar(45), dir varchar(45), nombre varchar(45), tel int, foreign key(id_gerente) references Gerente(rfc) on delete cascade on update cascade);
create table Inventario(id_producto int not null, id_sucursal int not null, unidades int, primary key(id_producto, id_sucursal), foreign key(id_sucursal) references Sucursal(id_sucursal) on delete cascade on update cascade, foreign key(id_producto) references Producto(id_producto) on delete cascade on update cascade);
create table Compra(id_compra int primary key not null, id_proveedor varchar(45), id_sucursal int, id_producto int, unidades int, fecha date, importe float, foreign key(id_proveedor) references Proveedor(rfc) on delete cascade on update cascade, foreign key(id_sucursal) references Sucursal(id_sucursal) on delete cascade on update cascade, foreign key(id_producto) references Producto(id_producto) on delete cascade on update cascade);
create table Cajero(rfc varchar(45) primary key not null, id_sucursal int, dir varchar(45), nombre varchar(45), ap_pat varchar(45), ap_mat varchar(45), tel int, cond tinyint, foreign key(id_sucursal) references Sucursal(id_sucursal) on delete cascade on update cascade);
create table Venta(id_venta int primary key not null, id_cajero varchar(45), id_socio varchar(45), fecha date, importe float, foreign key(id_cajero) references Cajero(rfc) on delete cascade on update cascade, foreign key(id_socio) references Socio(curp) on delete cascade on update cascade);
create table productosVta(id_venta int not null, id_producto int not null, unidades int, primary key(id_venta, id_producto), foreign key(id_venta) references Venta(id_venta) on delete cascade on update cascade, foreign key(id_producto) references Producto(id_producto) on delete cascade on update cascade);
insert into Gerente values('OERA971231', 'Av. Mi moto Col. Al Pino Derrapante', 'blak', 'blak', 'Angel', 'Ortega', 'Ramirez', 55555555);
insert into Sucursal values(1, 'OERA971231', 'Av. El perrito #100', 'El perrito', 25252525);
insert into Proveedor values('XNOR335522', 'contacto@frms.com', 'El monte 22', 15231523, 'Frozen Music', 1);
insert into Producto values(1, 'Cepillo', 12.95, 'cepillo.jpg');
insert into Compra values(1, 'XNOR335522', 1, 1, 3, '2010-10-10', 38.95);
insert into Inventario values(1, 1, 12);
insert into Cajero values('PENX123456', 1, 'Los pinos 123', 'Enrique', 'Pena', 'Nieto', 00990099, 1);
insert into Socio values('AABB998877HDFCDE22', '2019-01-01', '2018-12-31', 'AAAA', 'BBBB', 'BBBB');
insert into Venta values(1, 'PENX123456', 'AABB998877HDFCDE22', '2018-11-18', 12.95);
insert into productosVta values(1, 1, 1);