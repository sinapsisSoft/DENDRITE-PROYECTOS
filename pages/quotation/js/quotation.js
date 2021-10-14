//**************************//
//Author: EDWIN OCAMPO
//Date: 12/10/2021
//Description : functions data quotations


//************GET DATA FORM**************//
//**Function set  Quotation **/
var objSorted = "";
function setDataQuotation(dataSetQuotaion, typeSend) {
  try {
    loadPageView();
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../php/bo/bo_quotation.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {             
        if (xhttp.responseText != 0) {
          if(typeSend == 0){ 
          }   
        }
         else {
          createModalAlert("Valide la información", 3, 4000);
          enableScroll();
        }
      }
    };
    if(typeSend == 0){
      dataSetQuotaion = '{"POST":"POST",' + dataSetQuotaion + "}";
    }    
    xhttp.send(dataSetQuotaion);
  } catch (error) {
    console.error(error);
    enableScroll();
  }
}
//**Function get Quotation **/
function getDataQuotation(table, dataSetQuotaion, typeSend) {
  try {
    loadPageView();
    var xhttp = new XMLHttpRequest();
    var arrayCell = new Array("Consecutivo","# Versiones", "Horas estimadas", "Estado", "");
    var JsonData;
    xhttp.open("POST", "../../php/bo/bo_quotation.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var json = JSON.parse(xhttp.responseText);
        if (json.length != 0) {
          objSorted = json;
          if (typeSend == 0) {            
            tableQuotations = new Table(table, arrayCell, json);
            tableQuotations.createTableQuotations();
            enableScroll();
          } 
        } else {
          enableScroll();
        }
      }
    };     
    if (typeSend == 0) {      
      JsonData = '{"GET":"GET_BY_DATE",' + dataSetQuotaion + '}';
    } 
    xhttp.send(JsonData);
  } catch (error) {
    console.error(error);
    enableScroll();
  }
}

//**********************END Process****************************//
// function loadView() {
//   loadPageView();
//   let strURl = window.location.href;
//   let getData = strURl.substring(strURl.indexOf("?") + 1, strURl.length);  
//   if (getData.split("=")[1] == 0) {            
//       getActionStorage();
//   } 
//   else {
//       let getDataEdit = strURl.substring(strURl.indexOf("&") + 1, strURl.length);
//       let jsonArray = getDataEdit.split("=");
//       jsonData = '"Client_id":"'+ jsonArray[1] + '","Proc_name":""';
//       getDataQuotation("tableProcess", jsonData , 2);
//       getActionStorage();
//       getDataNotReq("","",1);
//   }  
// }

function loadViewQuotations(){
  loadPageView();
  date = new Date();
  month = date.getMonth() > 10 ? date.getMonth() + 1 : "0" + (date.getMonth() + 1); 
  year = date.getFullYear();
  initialDate = year + "-" + month + "-01";
  finalDay = new Date(year,month,0).getDate();
  finalDate = year + "-" + (month) + "-" + finalDay;
  getDataQuotation("tableQuotations",'"Quo_iniDate":"' + initialDate + '","Quo_finDate":"' + finalDate + '"', 0);
  getActionStorage();
  // getDataNotReq("", "", 1); Función para traer notificaciones en la campana
  nobackbutton();
}

//************ LOAD VIEW STORAGE ******************/
function getActionStorage() {
  let obj = new StoragePage();
  let json = JSON.parse(obj.getStorageLogin()); 0
  if (json !== null) {
    getDataUserId(json[0]["User_id"]);
  } else {
    locationLogin();
  }
}
//************GET DATA FORM**************//
// function sendData(idForm, e, typeSend) {
//   let jSon = "";
//   if (validatorForm(idForm)) {
//     jSon = getDataForm(idForm);
//     setDataQuotation(jSon, typeSend);  
//   } else {
//     createModalAlert("Error al realizar el registro", 4, 4000);
//   }
//   e.preventDefault();
// }

//************SEARCH All Process**************//
// function searchAllProcess(e) {
//   try {
//     var objForm = document.getElementById('formSearchProcess');
//     let intLogForm = objForm.querySelectorAll('input').length;
//     let data = "";
//     for (let i = 0; i < intLogForm; i++) {
//       data = objForm[i].value;
//     }     
//     getDataQuotation("tableProcessAll", data, 7);
//   }
//   catch (error) {
//     console.error(error);
//   }
//   e.preventDefault();
// }

function getSorted(prop, order){
  return function(a,b){
    if(order == 0){ //ASC
      var a1 = 1;
      var b1 = -1;
    }
    else if(order == 1){ //DESC
      var a1 = -1;
      var b1 = 1;
    }      
    if(a[prop] > b[prop]){
      return a1;
    }
    else if(a[prop] < b[prop]){
      return b1;
    }
    return 0;
  }
}

function filter(id, type){    
  var arrayCell;
  let selected = document.getElementById(id).value;
  let order = selected.split("-");
  objSorted.sort(getSorted(order[0],order[1]));
  if(type == 0){
    arrayCell = new Array("# Interno","Suscriptor", "Edificio", "Origen", "Despacho", "Radicado", "Consecutivo", "Apoderado", "Estado", "Editar");
    tableProcess = new Table("tableProcessAll", arrayCell, objSorted);
    tableProcess.createtableProcessAll();
  }
  else if(type == 1){
    arrayCell = new Array("# Interno","Suscriptor", "Edificio", "Origen", "Despacho", "Radicado", "Consecutivo", "Apoderado", "Estado", "Editar");
    tableProcess = new Table("tableProcess", arrayCell, objSorted);
    tableProcess.createtableProcess();
  }  
}

function toUpperForm(e){
  e.value = e.value.toUpperCase();
}