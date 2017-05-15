var isDrawing = false;
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
// canvas.width = window.innerWidth - 60;
// canvas.height = window.innerHeight*0.6;

context.fillStyle = "white";
////context.fillRect(0, 0, canvas.width, canvas.height);
context.fillRect(0, 0, 680, 450);
//var restore = new Array();
var resloc = -1;
var strokeColor = 'black';
var strokeWidth = "2";
var esTraslacion = false;

// nuevas lineas para colocar background
if(context){
  var imgBackground = new Image();
  //imgBackground.crossOrigin = '';
  imgBackground.src = 'Bolsa.png';
  // imgBackground.setAttribute('crossOrigin', '');
  
  imgBackground.onload = function(){
    // context.drawImage(imgBackground, 96, 0); // Para Playera.png
    // context.drawImage(imgBackground, 175, 0); // Para Vestido.png
    context.drawImage(imgBackground, 147, 0); // Para Bolsa.png
  } 
}

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
  }else{
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
}

function draw(event) {
  if(!esTraslacion){
    if (isDrawing) {
      context.lineTo(getX(event), getY(event));
      context.strokeStyle = strokeColor;
      context.lineWidth = strokeWidth;
      context.lineCap = "round";
      context.lineJoin = "round";
      context.stroke();
    }
    event.preventDefault();
  }else{
    if(objetoActual != null) {
      objetoActual.x = event.clientX - inicioX;
      objetoActual.y = event.clientY - inicioY;
      actualizar();
    }
  }
}

function stop(event) {
  if(!esTraslacion){
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
  }else{
    objetoActual = null;
  }
}

function getX(event) {
  if (event.pageX == undefined) {return event.targetTouches[0].pageX - canvas.offsetLeft}
  else {return event.pageX - canvas.offsetLeft}
  }


function getY(event) {
  if (event.pageY == undefined) {return event.targetTouches[0].pageY - canvas.offsetTop}
  else {return event.pageY - canvas.offsetTop}
}

//canvas.addEventListener("touchstart", start, false);
//canvas.addEventListener("touchmove", draw, false);
//canvas.addEventListener("touchend", stop, false);
canvas.addEventListener("mousedown", start, false);
canvas.addEventListener("mousemove", draw, false);
canvas.addEventListener("mouseup", stop, false);
canvas.addEventListener("mouseout", stop, false);



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
  // Lineas nuevas
  var filename = prompt("Guardar como...","Nombre del archivo");

  link = document.getElementById("download");
  link.href = canvas.toDataURL("image/png");
  link.download = filename;

/*
  var img = canvas.toDataURL('image/png');
  img = img.replace("image/png", "image/octet-stream");
  document.location.href = img;
*/
  ////a.href = img;
}

function Clear() {
  ////var confirmClear = confirm('¿Limpiar el área de trabajo?');
  ////if (confirmClear == true) {
    context.fillStyle = "white";
    ////context.clearRect(0, 0, canvas.width, canvas.height);
    ////context.fillRect(0, 0, canvas.width, canvas.height);
    context.clearRect(0, 0, 680, 450);
    context.fillRect(0, 0, 680, 450);

    // Al limpiar se debe quedar la imagen de fondo
    var imgBackground = new Image();
    imgBackground.src = 'Bolsa.png'
    // usar flag para saber cuál debe ser el fondo
    // context.drawImage(imgBackground, 96, 0); // Para Playera.png
    // context.drawImage(imgBackground, 175, 0); // Para Vestido.png
    context.drawImage(imgBackground, 147, 0); // Para Bolsa.png
    // Fin de lineas nuevas

    //// restore = new Array();
    resloc = -1;
  ////} else {}
}

function ActivarTraslacion() {
  if(esTraslacion){
    esTraslacion = false;
  }else{
    esTraslacion = true;
  }
}

document.getElementById("fileUpload").addEventListener("change", readImage, false);

function readImage() {
  if( comprueba_extension(this.files[0].name) ){

    if ( this.files && this.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
           var img = new Image();
           img.onload = function() {
             context.drawImage(img, 0, 0);
           };
           img.src = e.target.result;
        };       
        FR.readAsDataURL( this.files[0] );
    }
  }
}


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

// Para transformaciones sobre las imágenes
var objetos, objetoActual = null;
var inicioX = 0, inicioY = 0;

function actualizar() {
  //// context.fillStyle = '#f0f0f0';// Para limpiar cada que se actualiza
  //// context.fillRect(0, 0, 400, 300);
  Clear();
  for(var i = 0; i < objetos.length; i++){
    context.fillStyle = objetos[i].color;
    context.fillRect(objetos[i].x, objetos[i].y, objetos[i].width, objetos[i].height);
  }
}

window.onload = function() {
  objetos = [];
  // cv = document.getElementById('lienzo');
  // cx = cv.getContext('2d');

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
  ////actualizar();
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
*/
/*
  canvas.onmousemove = function(event) {
    if(objetoActual != null) {
      objetoActual.x = event.clientX - inicioX;
      objetoActual.y = event.clientY - inicioY;
      actualizar();
    }
    
  };
*/
/*
  canvas.onmouseup = function(event) {
    objetoActual = null;
  }
*/
};
