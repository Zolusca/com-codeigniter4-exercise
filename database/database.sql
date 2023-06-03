create database muammalah;
use muammalah;

create table user
(
id_user tinyint(3) auto_increment,
nama varchar(20) not null,
password varchar(10) not null,
tipe_user enum('konsumen','penjual') default 'konsumen',
primary key(id_user)
)engine=innoDB;

create table toko
(
id_toko tinyint(3) auto_increment,
id_user tinyint(3) not null,
nama_toko varchar(20) not null,
gambar varchar(20) default (""),
jmlh_produk tinyint(3) default 0,
primary key (id_toko),
foreign key (id_user) references user(id_user) on delete cascade on update cascade
)engine=innoDB;

create table produk
(
id_produk tinyint(3) auto_increment,
id_toko tinyint(3) not null,
nama_produk varchar(20) not null,
gambar varchar(20) default (""),
harga int(20) not null,
stok int(5) default 0,
primary key(id_produk),
foreign key(id_toko) references toko(id_toko) on delete cascade on update cascade
)engine=InnoDB;
