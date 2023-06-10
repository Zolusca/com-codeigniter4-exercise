create database muammalah;
use muammalah;

create table user
(
id_user tinyint(3) auto_increment,
nama varchar(20) not null,
email varchar(20) not null,
password varchar(10) not null,
tipe_user enum('konsumen','penjual') default 'konsumen',
primary key(id_user),
unique key(email)
)engine=innoDB;

create table toko
(
id_toko tinyint(3) auto_increment,
id_user tinyint(3) not null,
nama_toko varchar(20) not null,
gambar varchar(20) default (""),
jmlh_produk tinyint(3) default 0,
primary key (id_toko),
foreign key (id_user) references user(id_user) on delete cascade on update cascade,
unique key(id_user)
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


create table pesanan
(
id_pesanan tinyint(2) auto_increment,
id_toko tinyint(3) not null,
id_produk tinyint(3) not null,
no_resi varchar(10) not null,
jumlah_pesanan tinyint(2) not null,
status varchar(10) not null,
primary key(id_pesanan),
foreign key(id_toko) references toko(id_toko) on delete cascade on update cascade,
foreign key(id_produk) references produk(id_produk) on delete cascade on update cascade
)engine=InnoDB;
insert into pesanan (id_toko,id_produk,no_resi,jumlah_pesanan,status) values(1,1,'y467ssa',1,'on going');
select no_resi,jumlah_pesanan,status,nama_produk,harga from pesanan inner join produk on (pesanan.id_produk=produk.id_produk) where pesanan.id_toko=1; 

insert into user (nama,email,password) values ('soleh','soleh@bsi.id','junaa');
insert into toko (id_user,nama_toko) values (3,'stores');
insert into produk (id_toko,nama_produk,gambar,harga,stok) values (1,'celana dalakms','scelana.jpg',1000,3);

update toko set jmlh_produk=jmlh_produk+1 where id_user=9;
update produk set nama_produk="dasi",harga=100,stok=10 where id_produk=1;


select id_toko from toko inner join user on (toko.id_user = user.id_user) where email='rini@bsi.id';
select nama from toko where id_user=1;
select * from produk where id_toko=1;
select nama_produk,harga,stok from produk where id_produk=2;
select * from pesanan;

drop table user;
show create table toko;
truncate table toko;
delete from toko where id_toko=1;