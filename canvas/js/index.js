var isDrawing = false;
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
// canvas.width = window.innerWidth - 60;
// canvas.height = window.innerHeight*0.6;

context.fillStyle = "white";
////context.fillRect(0, 0, canvas.width, canvas.height);
context.fillRect(0, 0, 680, 476);
//var restore = new Array();
var resloc = -1;
var strokeColor = 'black';
var strokeWidth = "2";
var esTraslacion = false;
var prenda = "Playera.png";

// 1 Playera
// 2 Vestido
// 3 bolsa

window.dateFromPost = "<?=$_POST['tipo']?>"; // That's for a string

if(dateFromPost == 1){
  prenda = "Playera.png";
}
else{
  if(dateFromPost == 2){
    prenda = "Vestido.png";
  }
  else{
    prenda = "Bolsa.png"; 
  }
}


// nuevas lineas para colocar background
//function setBackground(){
  if(context){
    var imgBackground = new Image();
    
    // imgBackground.src = 'Bolsa.png';
    imgBackground.src = prenda;
    
    imgBackground.onload = function(){

      if(dateFromPost == 1){
        context.drawImage(imgBackground, 96, 0); // Para Playera.png
      }
      else{
        if(dateFromPost == 2){
          context.drawImage(imgBackground, 175, 0); // Para Vestido.png
        }
        else{
          context.drawImage(imgBackground, 147, 0); // Para Bolsa.png
        }
      }

      // context.drawImage(imgBackground, 96, 0); // Para Playera.png
      // context.drawImage(imgBackground, 175, 0); // Para Vestido.png
      // context.drawImage(imgBackground, 147, 0); // Para Bolsa.png
    } 
  }
//}

function strokeCOLOR(a) {
  strokeColor = a.style.background;
}

function strokeWIDTH(a) {
  strokeWidth = a.innerHTML;
}

function start(event) {
  if(!esTraslacion){
    isDrawing = true;
    context.beginPath();
    context.moveTo(getX(event), getY(event));
    event.preventDefault();
  }
}

function draw(event) {
  if (isDrawing) {
    context.lineTo(getX(event), getY(event));
    context.strokeStyle = strokeColor;
    context.lineWidth = strokeWidth;
    context.lineCap = "round";
    context.lineJoin = "round";
    context.stroke();
  }
  event.preventDefault(); 
}

function stop(event) {
  if (isDrawing) {
    context.stroke();
    context.closePath();
    isDrawing = false;
  }
  event.preventDefault();
  // Deshabilitar todas las funcionalidades del botón Deshacer
  ////restore.push(context.getImageData(0, 0, canvas.width, canvas.height));
  ////restore.push(context.getImageData(0, 0, 680, 450));
  resloc += 1;
}

function getX(event) {
  if (event.pageX == undefined) {return event.targetTouches[0].pageX - canvas.offsetLeft}
  else {return event.pageX - canvas.offsetLeft}
}


function getY(event) {
  if (event.pageY == undefined) {return event.targetTouches[0].pageY - canvas.offsetTop}
  else {return event.pageY - canvas.offsetTop}
}

// Agregando y quitando Listeners dependiendo si se desea mover objetos
// o dibujar a mano alzada
if(!esTraslacion){
  canvas.addEventListener("touchstart", start, false);
  canvas.addEventListener("touchmove", draw, false);
  canvas.addEventListener("touchend", stop, false);

  canvas.addEventListener("mousedown", start, false);
  canvas.addEventListener("mousemove", draw, false);
  canvas.addEventListener("mouseup", stop, false);
  canvas.addEventListener("mouseout", stop, false);
}else{
  canvas.removeEventListener("touchstart", start, false);
  canvas.removeEventListener("touchmove", draw, false);
  canvas.removeEventListener("touchend", stop, false);

  canvas.removeEventListener("mousedown", start, false);
  canvas.removeEventListener("mousemove", draw, false);
  canvas.removeEventListener("mouseup", stop, false);
  canvas.removeEventListener("mouseout", stop, false);
}


// Para transformaciones
/*
canvas.addEventListener("mousedown", presionar, false);
canvas.addEventListener("mousemove", mover, false);
canvas.addEventListener("mouseup", soltar, false);
*/

function Restore() {
  if (resloc <= 0) {
    Clear()
  } else {
    resloc += -1;
    restore.pop();
    context.putImageData(restore[resloc], 0, 0);
  }
}

function Save(a) {
  var filename = prompt("Guardar como...","Nombre del archivo");

  link = document.getElementById("download");
  link.href = canvas.toDataURL("image/png");
  link.download = filename;
}

function Clear() {
    context.fillStyle = "white";
    ////context.clearRect(0, 0, 680, 450);
    context.fillRect(0, 0, 680, 476);

    // Al limpiar se debe quedar la imagen de fondo
    var imgBackground = new Image();
    // imgBackground.src = 'Bolsa.png';
    imgBackground.src = prenda;

    // todo: usar flag para saber cuál debe ser el fondo
    // context.drawImage(imgBackground, 96, 0); // Para Playera.png
    // context.drawImage(imgBackground, 175, 0); // Para Vestido.png
    // context.drawImage(imgBackground, 147, 0); // Para Bolsa.png
    // Fin de lineas nuevas

    if(dateFromPost == 1){
      context.drawImage(imgBackground, 96, 0); // Para Playera.png
    }
      else{
        if(dateFromPost == 2){
          context.drawImage(imgBackground, 175, 0); // Para Vestido.png
        }
        else{
          context.drawImage(imgBackground, 147, 0); // Para Bolsa.png
        }
      }
    
    //// restore = new Array();
    resloc = -1;
}

function ActivarTraslacion(a) {
  if(esTraslacion){
    document.getElementById("trasladar").style['backgroundColor'] = "#F15928";
    esTraslacion = false;
  }else{
    document.getElementById("trasladar").style['backgroundColor'] = "#D2C7C7";
    esTraslacion = true;
  }
}

// Este es el bueno
document.getElementById("fileUpload").addEventListener("change", readImage, false);



/*
var inputfile = document.getElementById("fileUpload");
if(inputfile.value != "")
{
  Ya hay un archivo
}
*/
//esTraslacion

var actualPos;
var isMove=false;
// Esta es la buena
function readImage(){
  var canvas  = document.getElementById("canvas");
  var context = canvas.getContext("2d");

  if( comprueba_extension(this.files[0].name) ){

    if ( this.files && this.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
          var img = new Image();
          img.onload = function() {
            ////context.drawImage(img, 0, 0,260,110);
            context.drawImage(img, 260, 110);
          };

          function moverImagen(){
            if(esTraslacion){
              console.log("dentro de mousemove");
              if(isMove){
                actualPos=obtenerCoordenadas(event);
                ////context.fillStyle = '#f0f0f0';
                ////context.clearRect(0,0,canvas.width,canvas.height);
                ////context.fillRect(0, 0, 600, 500);
                Clear();
                context.drawImage(img,actualPos.x-(img.width/2),actualPos.y-(img.height/2));
              }
            }
          };

          canvas.addEventListener('mousedown',cambiarEstado,false);
          canvas.addEventListener('mouseup',cambiarEstado,false);
          canvas.addEventListener('mousemove',moverImagen,false);

          // Para touch
          canvas.addEventListener("touchstart", cambiarEstado, false);
          canvas.addEventListener("touchmove", moverImagen, false);
          canvas.addEventListener("touchend", cambiarEstado, false);
          canvas.style.cursor="hand";

          img.src = e.target.result;
        }; 

        function cambiarEstado(){
          if(esTraslacion){
            console.log("dentro de mousedown o mouseup");
            isMove=!isMove;
            actualPos=obtenerCoordenadas(event);
          }
        }

        function obtenerCoordenadas(event){
          var posX;
          var posY;

          if (event.pageX || event.pageY) {
            posX = event.pageX- canvas.offsetLeft;
            posY = event.pageY- canvas.offsetTop;
          }
          else {
            posX = event.clientX - canvas.offsetLeft;
            posY = event.clientY -  canvas.offsetTop;
          }

          return {
            x:posX,
            y:posY
          };
        }             
        FR.readAsDataURL( this.files[0] );  
    }// Llave del if
  }// Llave del if que checa extension
}// llave de readImage

function comprueba_extension(archivo) { 
  var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
  var permitida = false; 
          
  if(extension == ".png"){ 
    permitida = true; 
  }

  if (!permitida) { 
    alert ("Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extension png"); 
    return 0;
  }else{             
    return 1; 
  } 
}

/*

// Para traslación
var cv, cx, objetos, objetoActual = null;
var inicioX = 0, inicioY = 0;

function actualizar() {
  //cx.fillStyle = '#f0f0f0';// Para limpiar cada que se actualiza
  ////cx.fillStyle = "white";
  ////cx.fillRect(0, 0, 680, 450);
  Clear();

  for(var i = 0; i < objetos.length; i++){
    cx.fillStyle = objetos[i].color;
    cx.fillRect(objetos[i].x, objetos[i].y, objetos[i].width, objetos[i].height);
  }
}
*/

/*

window.onload = function() {
  objetos = [];
  //cv = document.getElementById('canvas');
  cx = canvas.getContext('2d');

  // agregar objetos de prueba
  objetos.push({
    x: 0, y: 0,
    width: 100, height: 200,
    color: '#00f'
  });
  objetos.push({
    x: 300, y: 150,
    width: 50, height: 100,
    color: '#f00'
  });
  actualizar();
*/

 /* 

  canvas.onmousedown = function(event){
    console.log("Dentro de onmousedown");
    for(var i = 0; i < objetos.length; i++) {
      if(objetos[i].x < event.clientX
        && (objetos[i].width + objetos[i].x > event.clientX)
        && objetos[i].y < event.clientY
        && (objetos[i].height + objetos[i].y > event.clientY)) {
        objetoActual = objetos[i];
        inicioY = event.clientY - objetos[i].y;
        inicioX = event.clientX - objetos[i].x;
        break;
      }
    }
  };

  canvas.onmousemove = function(event) {
    if(objetoActual != null) {
      objetoActual.x = event.clientX - inicioX;
      objetoActual.y = event.clientY - inicioY;
      actualizar();
    }
  };

  canvas.onmouseup = function(event) {
    objetoActual = null;
  }
*/

/////}


/*
function presionar(event) {
  console.log("Dentro de onmousedown");
  for(var i = 0; i < objetos.length; i++) {
    if(objetos[i].x < event.clientX
      && (objetos[i].width + objetos[i].x > event.clientX)
      && objetos[i].y < event.clientY
      && (objetos[i].height + objetos[i].y > event.clientY)) {
      objetoActual = objetos[i];
      inicioY = event.clientY - objetos[i].y;
      inicioX = event.clientX - objetos[i].x;
      break;
    }
  }
}

function mover(event) {
  console.log("Dentro de mover");
  if(objetoActual != null) {
    objetoActual.x = event.clientX - inicioX;
    objetoActual.y = event.clientY - inicioY;
    actualizar();
  }
}

function soltar(event) {
  console.log("Dentro de soltar");
  objetoActual = null;
};

*/