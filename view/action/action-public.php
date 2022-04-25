<?php 
if (isset($_POST['modificar_galeria'])) {
    $img_id  = $_POST['img_id'];
    $img_nom = $_POST['img_nom'];
    $img_des = $_POST['img_des'];
    $img_fec = $_POST['img_fec'];
    $img_url = $_POST['img_url'];
    if ($_FILES['img_arc']['name'] != "") {
        $typePermitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $tamañoLimite = 5000;
        if (in_array($_FILES['img_arc']['type'], $typePermitido) && $_FILES['img_arc']['size'] <= 6024) {
            $carpeta = "img/publicaciones/" . $idUser . "/";
            $destino = $carpeta . $_FILES['img_arc']['name'];
            if (!file_exists($carpeta)) {
                mkdir($carpeta);
            }
            if (!file_exists($destino)) {
                copy($_FILES['img_arc']['tmp_name'], $destino);
                $updateImg = "UPDATE tbl_galeria SET gal_nom ='$img_nom', gal_des = '$img_des', gal_fec = '$img_fec', gal_url = '$destino' WHERE gal_id = '$img_id'";
                $ejecutar  = $conexion->query($updateImg);
                unlink("$img_url");
                echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=1&text=Publicación+modificada+correctamente!';
                                            </script> ";
            } else {
                echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=El+archivo+ya+existe!';
                                            </script> ";
            }
        } else {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Archivo+no+permitido,+valide+que+se+de+tipo+(jpg,+jpeg,+png,+gif)+y+que+no+supere+el+tamaño+de+1MB';
                                            </script> ";
        }
    } else {
        $updateImg = "UPDATE tbl_galeria SET gal_nom ='$img_nom', gal_des = '$img_des', gal_fec = '$img_fec', gal_url = '$img_url' WHERE gal_id = '$img_id'";
        $ejecutar  = $conexion->query($updateImg);
        if ($ejecutar) {
            echo "<script language =javascript>
                                    self.location = 'gestionar-publicacion?alert=1&text=Publicación+modificada+correctamente!';
                                    </script> ";
        } else {
            echo "<script language =javascript>
                                        self.location = 'gestionar-publicacion?alert=0&text=Publicación+NO+modificada!';
                                        </script> ";
        }
    }
} else if (isset($_POST['modificar_blog'])) {
    $blog_cod = $_POST['art_cod'];
    $blog_fec = $_POST['art_fec'];
    $blog_tit = $_POST['art_tit'];
    $blog_des = $_POST['art_des'];
    $blog_vid = $_POST['art_vid'];
    $blog_img = $_POST['art_img'];
    if ($_FILES['arc_img']['name'] != "") {
        $typePermitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $tamanoLimite  = 6000;
        if (in_array($_FILES['arc_img']['type'], $typePermitido) && $_FILES['arc_img']['size'] <= $tamanoLimite * 1024) {
            $carpeta = "img/blog/" . $idUser . "/";
            $destino = $carpeta . $_FILES['arc_img']['name'];
            if (!file_exists($carpeta)) {
                mkdir($carpeta);
            }
            if (!file_exists($destino)) {
                copy($_FILES['arc_img']['tmp_name'], $destino);
                $updateImg = "UPDATE tbl_blog SET blog_tit ='$blog_tit', blog_des = '$blog_des', blog_fec = '$blog_fec',blog_vid = '$blog_vid',blog_img = '$destino' WHERE blog_cod = $blog_cod";
                $ejecutar  = $conexion->query($updateImg);
                if ($ejecutar) {
                    unlink("$img_url");
                    echo "<script language =javascript>
                                                    self.location = 'gestionar-publicacion?alert=1&text=Articulo+modificada+correctamente!';
                                                    </script> ";
                } else {
                    echo "<script language =javascript>
                                                    self.location = 'gestionar-publicacion?alert=0&text=Error+al+modificar+el+articulo';
                                                    </script> ";
                }
            } else {
                echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=El+archivo+ya+existe!';
                                            </script> ";
            }
        } else {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Archivo+no+permitido,+valide+que+se+de+tipo+(jpg,+jpeg,+png,+gif)+y+que+no+supere+el+tamaño+de+5MB';
                                            </script> ";
        }
    } else {
        $updateImg = "UPDATE tbl_blog SET blog_tit ='$blog_tit', blog_des = '$blog_des', blog_fec = '$blog_fec',blog_vid = '$blog_vid' WHERE blog_cod = $blog_cod";
        $ejecutar  = $conexion->query($updateImg);
        if ($ejecutar) {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=1&text=Articulo+modificada+correctamente!';
                                            </script> ";
        } else {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Error+al+modificar+el+articulo';
                                            </script> ";
        }
    }

} else if (isset($_POST['publicar_img'])) {
    $img_nom = $_POST['img_nom'];
    $img_des = $_POST['img_des'];
    $img_fec = $_POST['img_fec'];
    if ($_FILES['archivo_img']['name'] != "") {
        $typePermitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $tamanoLimite  = 3000;
        if (in_array($_FILES['archivo_img']['type'], $typePermitido) && $_FILES['archivo_img']['size'] <= $tamanoLimite * 1024) {
            $carpeta = "img/publicaciones/" . $idUser . "/";
            $destino = $carpeta . $_FILES['archivo_img']['name'];
            if (!file_exists($carpeta)) {
                mkdir($carpeta);
            }
            if (!file_exists($destino)) {
                copy($_FILES['archivo_img']['tmp_name'], $destino);
                include 'conexion.php';
                $insertImg = "INSERT INTO tbl_galeria(gal_nom, gal_des, gal_fec, gal_fpub, gal_url, usu_id) VALUES ('$img_nom', '$img_des', '$img_fec', '$fechaHora', '$destino', $idUser);";
                $ejecutar  = $conexion->query($insertImg);
                echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=1&text=Articulo+publicado++correctamente!';
                                            </script> ";
            } else {
                echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=El+archivo+ya+existe!';
                                            </script> ";
            }
        } else {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Tama単o-o-tipo-de-archivo+no+permitido(jpg,+jpeg,+png,+gif+y+<+6MB)';
                                            </script> ";
        }
    } else {
        echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Selecciones+un+archivo!';
                                            </script> ";
    }
} else if (isset($_POST['publicar_art'])) {
    $art_tit = $_POST['art_tit'];
    $art_des = $_POST['art_des'];
    $art_fec = $_POST['art_fec'];
    $art_vid = $_POST['art_vid'];
    if ($_FILES['archivo_img']['name'] != "") {
        $typePermitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $tamanoLimit   = 3000;
        if (in_array($_FILES['archivo_img']['type'], $typePermitido) && $_FILES['archivo_img']['size'] <= $tamanoLimit * 1024) {
            $carpeta = "img/blog/" . $idUser . "/";
            $destino = $carpeta . $_FILES['archivo_img']['name'];
            if (!file_exists($carpeta)) {
                mkdir($carpeta);
            }
            if (!file_exists($destino)) {
                copy($_FILES['archivo_img']['tmp_name'], $destino);
                include 'conexion.php';
                $insertArt = "INSERT INTO tbl_blog(blog_tit, blog_des, blog_fec, blog_fpu, blog_img,blog_vid,blog_usu) VALUES ('$art_tit', '$art_des', '$art_fec', '$fechaHora','$destino', '$art_vid', $idUser);";
                $ejecutar  = $conexion->query($insertArt);
                if ($ejecutar) {
                    echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=1&text=Articulo+publicado+correctamente!';
                                            </script> ";
                } else {
                    echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Error+al+publicar+el+articulo';
                                            </script> ";
                }
            } else {
                echo "<script language =javascript>
                                        self.location = 'gestionar-publicacion?alert=0&text=El+archivo+ya+existe!';
                                        </script> ";
            }
        } else {
            echo "<script language =javascript>
                                    self.location = 'gestionar-publicacion?alert=0&text=Tamaño+o+tipo+de+archivo+no+permitido(jpg,+jpeg,+png,+gif+y+<+6MB)';
                                    </script> ";
        }
    } else {
        include 'conexion.php';
        $insertArt = "INSERT INTO tbl_blog(blog_tit, blog_des, blog_fec, blog_fpu,blog_vid,blog_usu) VALUES ('$art_tit', '$art_des', '$art_fec', '$fechaHora', '$art_vid', $idUser);";
        $ejecutar  = $conexion->query($insertArt);
        if ($ejecutar) {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=1&text=Articulo+publicado+correctamente!';
                                            </script> ";
        } else {
            echo "<script language =javascript>
                                            self.location = 'gestionar-publicacion?alert=0&text=Error+al+publicar+el+articulo';
                                            </script> ";
        }
    }

}
?>