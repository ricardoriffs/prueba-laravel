
var reader = new XMLHttpRequest() || new ActiveXObject('MSXML2.XMLHTTP');

function loadFile() {
    reader.open('get', 'count.txt', true); 
    reader.onreadystatechange = displayContents;
    reader.send(null);
}

function displayContents() {
    if(reader.readyState == 4) {
        
        
        var num = reader.responseText;
        if(isInt(num)){
           contador = num + 1; 
        }
        alert('Cont '+contador);
        el.innerHTML = contador;
    }
}

var ie_writeFile = function (fname, data) {
    var fso, fileHandle;
    fso = new ActiveXObject("Scripting.FileSystemObject");
    fileHandle = fso.CreateTextFile(fname, true);
    fileHandle.write(data);
    fileHandle.close();
};


function readTextFile(file){
    var rawFile = new XMLHttpRequest();
    var allText = '0';
    rawFile.open("GET",file, false);
    rawFile.onreadystatechange = function (){
        if(rawFile.readyState === 4){
            if(rawFile.status === 200 || rawFile.status == 0){
                allText = rawFile.responseText;
            }
        }
    }
    return allText;
    rawFile.send(null);
}

function writeinhtmlinfile(){
    var el = document.getElementById('count');
    var vfile = 'js/count.txt';
    var allText = readTextFile(vfile);
    var contador = 0;    
    if(isInt(allText)){
       contador = parseInt(allText) + 1; 
    }
    ie_writeFile(vfile,contador);
    el.innerHTML = contador;    
}

function isInt(value) { 
    return !isNaN(parseInt(value,10)) && (parseFloat(value,10) == parseInt(value,10)); 
}

