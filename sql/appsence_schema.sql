DROP DATABASE IF EXISTS db_appsence;

CREATE DATABASE IF NOT EXISTS db_appsence;

USE db_appsence;

CREATE TABLE tbl_estado(
	esta_id int(1) AUTO_INCREMENT PRIMARY KEY,
	esta_nom varchar(25) NOT NULL
);

CREATE TABLE tbl_compania(
	comp_nit varchar(11) PRIMARY KEY,
	comp_nom varchar(50) NOT NULL,
	comp_tel varchar(10) NOT NULL,
	comp_cor varchar(30) UNIQUE,
	comp_dir varchar(40)
);


CREATE TABLE tbl_area(
	area_id int(5) AUTO_INCREMENT PRIMARY KEY,
	area_nom varchar(50) NOT NULL,
	area_tel varchar(10) NOT NULL,
	area_cor varchar(30) UNIQUE,
	area_comp_fk varchar(11) NOT NULL,
	FOREIGN KEY (area_comp_fk) REFERENCES tbl_compania(comp_nit) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_cargo_area(
	care_id int(5) AUTO_INCREMENT PRIMARY KEY,
	care_nom varchar(50) NOT NULL,
	care_area_fk int(5) NOT NULL,
	FOREIGN KEY (care_area_fk) REFERENCES tbl_area(area_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_usuario (
	usua_id int(5) AUTO_INCREMENT PRIMARY KEY,
	usua_ema varchar(150) UNIQUE NOT NULL,
	usua_nid varchar(12) NOT NULL,
	usua_pas varchar(50) NOT NULL,
	usua_pno varchar(25) NOT NULL,
	usua_sno varchar(25),
	usua_pap varchar(25) NOT NULL,
	usua_sap varchar(25),
	usua_sex varchar(2) NOT NULL,
	usua_pro varchar(255) NOT NULL,
	usua_dir varchar(150),
	usua_ciu varchar(50) NOT NULL,
	usua_pai varchar(50) NOT NULL,
	usua_fna date NOT NULL,
	usua_cel varchar(12) NOT NULL,
	usua_rol varchar(2) NOT NULL,
	usua_ipe varchar(200),
	usua_ipo varchar(200),
	usua_col varchar(15) NOT NULL,
	usua_esta_fk int(1) NOT NULL,
	usua_care_fk int(5) NOT NULL,
	FOREIGN KEY (usua_esta_fk) REFERENCES tbl_estado(esta_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (usua_care_fk) REFERENCES tbl_cargo_area(care_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_cuenta_banco(
	cban_id	int(5)	AUTO_INCREMENT PRIMARY KEY,
	cban_nom varchar(50)	NOT NULL
);

CREATE TABLE tbl_cuenta(
	cuen_id int(5) AUTO_INCREMENT PRIMARY KEY,
	cuen_num varchar(12) NOT NULL,
	cuen_usua_fk int(5)NOT NULL,
	cuen_banc_fk int(5)NOT NULL,
	FOREIGN KEY (cuen_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (cuen_banc_fk) REFERENCES tbl_cuenta_banco(cban_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_publicacion(
	publ_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	publ_tit varchar(100) NOT NULL,
	publ_des text NOT NULL,
	publ_fec date NOT NULL,
	publ_fpu date NOT NULL,
	publ_tip int(2)	NOT NULL,
	publ_mgt int(9) NOT NULL,
	publ_usua_fk int(5) NOT NULL,
	FOREIGN KEY (publ_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_publicacion_detalle(
	pdet_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	pdet_img text,
	pdet_vid text,
	pdet_publ_fk int(10) NOT NULL,
	FOREIGN KEY (pdet_publ_fk) REFERENCES tbl_publicacion(publ_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE tbl_empresa_tipo(
	etip_id	int(1) AUTO_INCREMENT PRIMARY KEY,
	etip_nom varchar(25) NOT NULL
);

CREATE TABLE tbl_empresa(
	empr_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	empr_nom varchar(50) NOT NULL,
	empr_nit varchar(15),
	empr_des varchar(255),
	empr_web varchar(50),
	empr_dir varchar(100),
	empr_ciu varchar(30) NOT NULL,
	empr_pai varchar(30) NOT NULL,
	empr_ipe varchar(200),
	empr_ipo varchar(200),
	empr_fec date NOT NULL,
	empr_vis int(1) NOT NULL,
	empr_tipo_fk int(1) NOT NULL,
	empr_usua_fk int(5) NOT NULL,
	FOREIGN KEY (empr_tipo_fk) REFERENCES tbl_empresa_tipo(etip_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (empr_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_cliente(
	clie_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	clie_ema varchar(50) UNIQUE NOT NULL,
	clie_pas varchar(50) NOT NULL,
	clie_pno varchar(25) NOT NULL,
	clie_sno varchar(25),
	clie_pap varchar(25) NOT NULL,
	clie_sap varchar(25),
	clie_cel varchar(12) NOT NULL,
	clie_nid varchar(12) NOT NULL,
	clie_dir varchar(100),
	clie_ciu varchar(30) NOT NULL,
	clie_pai varchar(30) NOT NULL,
	clie_ipe varchar(200),
	clie_fec date,
	clie_empr_fk int(10) NOT NULL,
	clie_esta_fk int(1) NOT NULL,
	clie_usua_fk int(5) NOT NULL,
	FOREIGN KEY (clie_empr_fk) REFERENCES tbl_empresa(empr_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION,
	FOREIGN KEY (clie_esta_fk) REFERENCES tbl_estado(esta_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (clie_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_servicio(
	serv_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	serv_tit varchar(255),
	serv_nom varchar(100) NOT NULL,
	serv_des varchar(255) NOT NULL,
	serv_usua_fk int(5) NOT NULL,
	FOREIGN KEY (serv_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_servicio_detalle(
	sdet_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	sdet_nom varchar(150) NOT NULL,
	sdet_des text NOT NULL,
	sdet_gar varchar(15) NOT NULL,
	sdet_val varchar(10) NOT NULL,
	sdet_serv_fk int(10) NOT NULL,
	FOREIGN KEY (sdet_serv_fk) REFERENCES tbl_servicio(serv_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE tbl_factura_estado(
	fest_id	int(2)	AUTO_INCREMENT PRIMARY KEY,
	fest_nom varchar(25) NOT NULL
);

CREATE TABLE tbl_factura(
	fact_id	int(4)	UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
	fact_tit varchar(150) NOT NULL,
	fact_des text NOT NULL,
	fact_fin date NOT NULL,
	fact_fec date NOT NULL,
	fact_vto varchar(30) NOT NULL,
	fact_esta_fk int(2) NOT NULL,
	fact_usua_fk int(5) NOT NULL,
	fact_clie_fk int(5) NOT NULL,
	FOREIGN KEY (fact_esta_fk) REFERENCES tbl_factura_estado(fest_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (fact_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE NO ACTION ON UPDATE NO ACTION,
	FOREIGN KEY (fact_clie_fk) REFERENCES tbl_cliente(clie_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_factura_detalle(
	fdet_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	fdet_fec date NOT NULL,
	fdet_dto varchar(5) NOT NULL,
	fdet_pre varchar(25) NOT NULL,
	fdet_sdet_fk int(10) NOT NULL,
	fdet_fact_fk int(4) UNSIGNED ZEROFILL NOT NULL,
	FOREIGN KEY (fdet_sdet_fk) REFERENCES tbl_servicio_detalle(sdet_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (fdet_fact_fk) REFERENCES tbl_factura(fact_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE tbl_fact_tipopago (
	ftpa_id int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador del tipo de pago
	ftpa_nom varchar(20) NOT NULL -- Nombre del tipo de pago
);
CREATE TABLE tbl_fact_mediopago (
	fmpa_id int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador del medio de pago
	fmpa_nom varchar(20) NOT NULL -- Nombre del medio de pago
);
CREATE TABLE tbl_fact_pago (
	fpag_id int(9) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY, -- Identificador del sistema para el pago
	fpag_fec date NOT NULL, -- Fecha en que se realiza el pago
	fpag_nco varchar(50) NOT NULL, -- Numero de comprobante del pago
	fpag_npa varchar(50) NOT NULL, -- Nombre de quien paga
	fpag_vpa varchar(20) NOT NULL, -- Valor del pago
	fpag_fact_fk int(4) UNSIGNED ZEROFILL NOT NULL, -- Llave forarena Identificador de factura
	fpag_mpag_fk int(5), -- Llave foranea del medio de pago
	fpag_tpag_fk int(5), -- Llave foranea del tipo de pago
	FOREIGN KEY (fpag_fact_fk) REFERENCES tbl_factura(fact_id) 
		ON DELETE CASCADE ON UPDATE NO ACTION,
	FOREIGN KEY (fpag_tpag_fk) REFERENCES tbl_fact_tipopago(ftpa_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (fpag_mpag_fk) REFERENCES tbl_fact_mediopago(fmpa_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);


CREATE TABLE tbl_cotizacion_estado(
	cest_id	int(1) AUTO_INCREMENT PRIMARY KEY,
	cest_nom varchar(25) NOT NULL
);

CREATE TABLE tbl_solicitud(
	soli_id	int(5) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
	soli_asu varchar(100) NOT NULL,
	soli_des text,
	soli_nom varchar(50) NOT NULL,
	soli_ema varchar(70) NOT NULL,
	soli_emp varchar(100) NOT NULL,
	soli_cel varchar(12) NOT NULL,
	soli_ubi varchar(50),
	soli_fec date NOT NULL,
	soli_esta_fk int(1) NOT NULL,
	soli_serv_fk int(10) NOT NULL,
	FOREIGN KEY (soli_esta_fk) REFERENCES tbl_cotizacion_estado(cest_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (soli_serv_fk) REFERENCES tbl_servicio(serv_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_cotizacion(
	coti_id	int(10)	UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
	coti_des varchar(255) NOT NULL,
	coti_tyc varchar(100) NOT NULL,
	coti_fec varchar(255) NOT NULL,
	coti_esta_fk int(1) NOT NULL,
	coti_soli_fk int(5) UNSIGNED ZEROFILL NOT NULL,
	coti_usua_fk int(5)	NOT NULL,
	FOREIGN KEY (coti_esta_fk) REFERENCES tbl_cotizacion_estado(cest_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (coti_soli_fk) REFERENCES tbl_solicitud(soli_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (coti_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);
CREATE TABLE tbl_cotizacion_detalle(
	cdet_id	int(10)	AUTO_INCREMENT PRIMARY KEY,
	cdet_pre varchar(20) NOT NULL,
	cdet_dto int(5) NOT NULL,
	cdet_coti_fk int(10) UNSIGNED ZEROFILL NOT NULL,
	cdet_sdet_fk int(10) NOT NULL,
	FOREIGN KEY (cdet_coti_fk) REFERENCES tbl_cotizacion(coti_id)
		ON DELETE CASCADE ON UPDATE NO ACTION,
	FOREIGN KEY (cdet_sdet_fk) REFERENCES tbl_servicio_detalle(sdet_id)
		ON DELETE RESTRICT ON UPDATE NO ACTION
);

CREATE TABLE tbl_ausencia_tipo(
	taus_id	int(1) AUTO_INCREMENT PRIMARY KEY,
	taus_nom varchar(25) NOT NULL,
	taus_col varchar(10) NOT NULL
);

CREATE TABLE tbl_ausencia(
	ause_id	int(3) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
	ause_des text NOT NULL,
	ause_fin date NOT NULL,
	ause_ffi date,
	ause_dia int(3),
	ause_sop text,
	ause_med int(1),
	ause_est int(1) NOT NULL,
	ause_usua_fk int(5) NOT NULL,
	ause_tipo_fk int(1) NOT NULL,
	FOREIGN KEY (ause_usua_fk) REFERENCES tbl_usuario(usua_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION,
	FOREIGN KEY (ause_tipo_fk) REFERENCES tbl_ausencia_tipo(taus_id) 
		ON DELETE RESTRICT ON UPDATE NO ACTION
);