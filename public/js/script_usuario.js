function archivo(evt) {
  var files = evt.target.files; // FileList object
  // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
    //Solo admitimos imágenes.
    if (!f.type.match('image.*')) {
      continue;
    }
    var reader = new FileReader();
    reader.onload = (function(theFile) {
      return function(e) {
        // Insertamos la imagen
        document.getElementById("pre-view").innerHTML = ['<img class="img-pre" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
      };
    })(f);
    reader.readAsDataURL(f);
  }
}
function portada(evt) {
  var files = evt.target.files; // FileList object
  // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
    //Solo admitimos imágenes.
    if (!f.type.match('image.*')) {
      continue;
    }
    var reader = new FileReader();
    reader.onload = (function(theFile) {
      return function(e) {
        // Insertamos la imagen
        document.getElementById("file-view").innerHTML = ['<img class="img-pre" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
      };
    })(f);
    reader.readAsDataURL(f);
  }
}

document.addEventListener('DOMContentLoaded',function(){
  document.getElementById('boton_archivo').addEventListener('change', archivo, false);
  document.getElementById('btn_file').addEventListener('change', portada, false);
  $('#nPass2').keyup(function(){ 
    var pass1 = $('#nPass1').val();
    var pass2 = $('#nPass2').val();
    if (pass1 == pass2) {
      $('#alert-one').text("Las contraseñas coinciden!").css("color","green").css("width","100%").css("text-align","center");
    }else{
      $('#alert-one').text("Las contraseñas NO coinciden!").css("color","red").css("width","100%").css("text-align","center");
    }
    if (pass2 == "") {
      $('#alert-one').text("No deje espacios en blanco").css("color","red").css("width","100%").css("text-align","center");
    }
  });
});