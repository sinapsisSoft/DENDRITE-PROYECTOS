//**************************//
//Author: LAURA GRISALES
//Date: 16/09/2020
//Description : functions data process
//************GET DATA FORM**************//

var calendar;

//**Function set Event **/
function setDataEvent(dataSetEvent, typeSend) {
  try {
    loadPageView();
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../php/bo/bo_request.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {     
        var json = JSON.parse(xhttp.responseText);
        if (json.length != 0) {
          if(typeSend == 0){ 
            createModalAlert("Operación realizada con éxito", 1, 3000);    
            viewModal("actionModal", 1);
            enableScroll();         
            setTimeout(function(){ 
              location.reload();              
            }, 1000);
                       
          }   
        }
         else {
          createModalAlert("Valide la información", 3, 4000);
          enableScroll();
        }
      }
    };
    if(typeSend == 0){      
      dataSetEvent = '{"POST":"POST_ACTION",' + dataSetEvent + "}";
    }
    xhttp.send(dataSetEvent);
  } catch (error) {
    console.error(error);
    enableScroll();
  }
}
//**Function get Event **/
function getDataEvent(table, dataSetEvent, typeSend) {
  try {
    loadPageView();
    var xhttp = new XMLHttpRequest();
    var arrayCell1 = new Array("Suscriptor", "Asunto", "Fecha creación","Estado", "","Ver");
    var arrayCell = new Array("Observación", "Fecha", "Estado","");
    var JsonData;
    xhttp.open("POST", "../../php/bo/bo_event.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var json = JSON.parse(xhttp.responseText);
        if (json.length != 0) {
          if (typeSend == 0) {
            setCalendar(json);
            enableScroll();
          }   
        } else {
          setCalendar(json);
          enableScroll();
        }
      }
    };
    if (typeSend == 0) {
      JsonData = '{"GET":"GET_EVENT_CLIENT","Client_id":"' + dataSetEvent + '"}';
    }  

    xhttp.send(JsonData);
  } catch (error) {
    console.error(error);
    enableScroll();
  }
}

//**********************END Process****************************//
function loadView() {
  loadPageView();  
  getActionStorage();
  nobackbutton();        
}
//************ LOAD VIEW STORAGE ******************/
function getActionStorage() {
  let obj = new StoragePage();
  let json = JSON.parse(obj.getStorageLogin()); 0
  if (json !== null) {
    // console.log(json);
    getDataUserId(json[0]["User_id"]);
  } else {
    locationLogin();
  }

}
//************GET DATA FORM**************//
function sendData(idForm, e, typeSend) {
  let jSon = "";
  if (validatorForm(idForm)) {
    jSon = getDataForm(idForm);
    let user = document.getElementById("User_id");
    let request = document.getElementById("Req_id");
    let dateNow = new Date();
    dateNow = dateNow.getFullYear() + "-" + month2digits(dateNow.getMonth()+1) + "-" + dateNow.getDate() + " " + dateNow.getHours() + ":" + dateNow.getMinutes() + ":" + dateNow.getSeconds();
    jSon += ',"'+user.id+'":'+'"'+user.value+'",';
    jSon += '"'+request.id+'":'+'"'+request.value+'",';
    jSon += '"Act_date":'+'"'+dateNow+'"';
    setDataEvent(jSon, typeSend);  
  } else {
    createModalAlert("Error al realizar el registro", 4, 4000);
  }
  e.preventDefault();
}

//************SEARCH Process**************//
function searchEvent(e) {
  try {
    var objForm = document.getElementById('formSearchEvent');
    let selectForm = objForm.querySelectorAll('select');
    let jsonData = '';
    for (let i = 0; i < selectForm.length; i++) {
      let objSelect = document.getElementById(selectForm[i].id);
      jsonData += objSelect.options[objSelect.selectedIndex].value;
    }
    getDataEvent("", jsonData, 0);
  }
  catch (error) {
    console.error(error);
  }
  e.preventDefault();
}

 //**Function get List Status **/
 function getListProcess(idSelect,typeSend) {
  try {      
      var xhttp = new XMLHttpRequest();
      var JsonData;
      xhttp.open("POST", "../../php/bo/bo_subprocess.php", true);
      xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
      xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
              var jsonObj = JSON.parse(xhttp.responseText);
              if (jsonObj.length!=0) {
                  if(typeSend==0){
                  selectStatus = new SelectList(idSelect, jsonObj);
                  selectStatus.createListProcess();
                  }             
              }
          }
      };
      if (typeSend == 0) {
          JsonData = '{"GET":"GET_LIST_PROCESS"}';
      }
      xhttp.send(JsonData);
  } catch (error) {
      console.error(error);
  }
}
//**********************END Process****************************//

 //**Function get List Clients **/
 function getListClient(idSelect,typeSend) {
  try {      
      var xhttp = new XMLHttpRequest();
      var JsonData;
      xhttp.open("POST", "../../php/bo/bo_client.php", true);
      xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
      xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
              var jsonObj = JSON.parse(xhttp.responseText);
              if (jsonObj.length!=0) {
                  if(typeSend==0){
                  selectStatus = new SelectList(idSelect, jsonObj);
                  selectStatus.createListClient();
                  loadView();
                  $("#"+idSelect).selectpicker();            
                  }             
              }
          }
      };
      if (typeSend == 0) {
          JsonData = '{"GET":"GET_LIST_CLIENT"}';
      }
      xhttp.send(JsonData);
  } catch (error) {
      console.error(error);
  }
}
//**********************END Process****************************//

function getProcess(){
  let id = document.getElementById("Proc_id").value;
  return id;
}

//************GET VIEW **************//
function getAction() {  
  loadPageView();
  // getListProcess("Ptype_id",0);
  let strURl = window.location.href;
  let getData = strURl.substring(strURl.indexOf("?") + 1, strURl.length);  
  if (getData.split("=")[1] == 0) {            
      getActionStorage();
      getDataNotReq("","",1);
  } 
  else {
      let getDataEdit = strURl.substring(strURl.indexOf("&") + 1, strURl.length);
      let jsonArray = getDataEdit.split("=");
      getDataEvent("tableAction", jsonArray[1], 1);      
      getDataEvent("", jsonArray[1], 2);    
      getActionStorage();       
      getDataNotReq("","",1); 
      // getDataEvent("tablePerformance", jsonArray[1], 3);      
      // viewCard("performanceCard", 1);
  }
  
}

function getDataEdit(id){
  getDataEvent("", id, 1);  
}

function enableUpdate(buttons, json) {
  if (json[0]["Stat_name"] == "Resuelto") {
    editButtons = document.getElementsByClassName(buttons);
    for (i = 0; i < editButtons.length; i++) {
      editButtons[i].style.display = "none";
    }
  }
}

function setCalendar(json) {    
  var jsonData = [];
  var objDate = new Date();
  var day = objDate.getDate();
  var month = objDate.getMonth();
  var year = objDate.getFullYear();
  var getDate = year + "-" + (month + 1) + "-" + day;
  var calendarEl = document.getElementById('calendar');
  $.each(json, function(idx, e){
    jsonData.push({
      id: "" + e.id + "",
      title: "" + e.title + "",
      start: "" + e.start + "",
      end: "" + e.end + "",
      color: "" + e.color + ""
    })
  });
  calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'es',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    defaultDate: getDate,
    editable: true,
    eventLimit: true,
    selectable: true,
    selectHelper: true,
    navLinks: true, // can click day/week names to navigate views
    select: function (arg) {
      $('#modalAdd #Event_start').val(moment(arg.startStr).format('YYYY-MM-DD HH:mm:ss'));
      $('#modalAdd #Event_end').val(moment(arg.end).format('YYYY-MM-DD HH:mm:ss'));
      $('#modalAdd').modal('show');
    },
    eventClick: function (arg) {
      $('#modalEdit #Event_id').val(arg.event.id);
      $('#modalEdit #Event_title').val(arg.event.title);
      $('#modalEdit #Event_color').val(arg.event.borderColor);
      $('#modalEdit #Event_start').val(moment(arg.event.start).format('YYYY-MM-DD HH:mm:ss'));
      $('#modalEdit #Event_end').val(moment(arg.event.end).format('YYYY-MM-DD HH:mm:ss'));
      $('#modalEdit').modal('show');
    },

    eventDrop: function (arg) {
      edit(arg);

    },
    eventResize: function (arg) {
      edit(arg);
    },
    events: jsonData    
  }); 
  calendar.render();
}

function addEvent(obj) {
  id = document.getElementById("Event_id").value;
  start = document.getElementById("Event_start").value;
  end = document.getElementById("Event_end").value;
  title = document.getElementById("Event_title").value;
  color = document.getElementById("Event_color").value;
  idClient = document.getElementById("Client_id");
  client = idClient.options[idClient.selectedIndex].value;

  var JsonData = '"Event_id"' + ':' + '"' + id + '","Event_start"'+':' + '"' + start + '","Event_end"' + ':' + '"' + end + '","Event_title"' + ':' + '"' + title + '","Event_color"' + ':' + '"' + color + '","Client_id"' + ':' + '"' + client + '"';
  
  try {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../php/bo/bo_event.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var jsonObj = JSON.parse(xhttp.responseText);
        if (jsonObj == 1) {
          searchEvent(event);
          createModalAlert("Evento creado con éxito", 1, 3000);
        }
        else {
          createModalAlert("No se pudo crear el evento", 3, 4000);
        }
        $('#modalAdd').modal('hide');
      }
    };
    JsonData = '{"POST":"POST",' + JsonData + '}';
    xhttp.send(JsonData);
  } catch (error) {
    console.error(error);
  }
}

function edit(arg) {
  idClient = document.getElementById("Client_id");
  client = idClient.options[idClient.selectedIndex].value;
  start = moment(arg.event.start).format('YYYY-MM-DD HH:mm:ss');
  if (arg.event.end) {
    end = moment(arg.event.end).format('YYYY-MM-DD HH:mm:ss');
  } else {
    end = start;
  }
  id = arg.event.id;
  title = arg.event.title;
  color = arg.event.color;
  var JsonData = '"Event_id"' + ':' + '"' + id + '","Event_start"' + ':' + '"' + start + '","Event_end"' + ':' + '"' + end + '","Event_title"' + ':' + '"' + title + '","Event_color"' + ':' + '"' + color + '","Client_id"' + ':' + '"' + client + '"';

  try {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../php/bo/bo_event.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var jsonObj = JSON.parse(xhttp.responseText);
        if (jsonObj.length != 0) {
          createModalAlert("Evento guardado correctamente", 1, 3000);
        } else {
          createModalAlert("No se pudo guardar el evento", 3, 4000);
        }  
      }
    };
    JsonData = '{"POST":"POST",' + JsonData + '}';
    xhttp.send(JsonData);
  } catch (error) {
    console.error(error);
  }
  calendar.render();
}

function deleteEvent(typeAction) {
  idClient = document.getElementById("Client_id");
  client = idClient.options[idClient.selectedIndex].value;
  var obj = document.getElementById("editForm");
  id = obj[0].value;
  start = obj[1].value;
  end = obj[2].value;
  title = obj[4].value;
  color = obj[5].value;
  
  if (typeAction) {
    if (confirm("Esta seguro de eliminar este evento")) {
      try {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../php/bo/bo_event.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
            var jsonObj = JSON.parse(xhttp.responseText);
            if (jsonObj == 1) {
              searchEvent(event);
              createModalAlert("Evento eliminado con éxito", 1, 3000);
            } else {
              createModalAlert("El evento no pudo ser eliminado", 3, 4000);
            }
            $('#modalEdit').modal('hide');
          }
        };
        JsonData = '{"POST":"DELETE","Event_id":"' + id + '"}';
        xhttp.send(JsonData);
      } catch (error) {
        console.error(error);
      }
    } else {
      return false;
    }
  } else {
    try {
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "../../php/bo/bo_event.php", true);
      xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
      xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          var jsonObj = JSON.parse(xhttp.responseText);
          if (jsonObj == 1) {
            searchEvent(event);
            createModalAlert("Evento editado con éxito", 1, 3000);
          } else {
            createModalAlert("El evento no pudo ser editado", 3, 4000);
          }
          $('#modalEdit').modal('hide');
        }
      };
      JsonData = '{"POST":"POST","Event_id":"' + id + '","Event_title":"' + title + '","Event_color":"' + color + '","Client_id":"' + client + '","Event_start":"' + start + '","Event_end":"' + end + '"}';
      xhttp.send(JsonData);
    } catch (error) {
      console.error(error);
    }
  }
}