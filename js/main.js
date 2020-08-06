var data, st, ct;

document.addEventListener("DOMContentLoaded", function(event) {
     st = document.getElementById('state');
     ct = document.getElementById('city');
     readJSON("http://localhost:7700/js/colombia.json",
     function(text) {
      data = JSON.parse(text);
      loadState();
     });
});
function readJSON(file, callback) {
  let obj = new XMLHttpRequest();
  obj.overrideMimeType("application/json");
  obj.open("GET", file, true);
  obj.onreadystatechange = function() {
    if (obj.readyState === 4 && obj.status == "200") {
      callback(obj.responseText);
    }
  }
  obj.send(null);
}
function loadState() {
  for (let key in data) {
    let opt = document.createElement("option");
    opt.value = key;
    opt.text = key;
    st.appendChild(opt);
  }
}
function loadCity() {
    for (let i = ct.length-1;  i >=0; i--) 
       ct.remove(i);
    
    if(st != "noState"){
      ct.focus();
      for (let i = 0; i < data[st.value].length; i++) {
       let opt = document.createElement("option");
       opt.value = data[st.value][i];
       opt.text =  data[st.value][i];
       ct.appendChild(opt);
      }
    }
}
function validation(f) {
  let validate = true;
  let msg = "Favor ingresar datos correctamente";
  
  let name = f.name.value;
  let email = f.email.value;

  if (!( (name.length>0 && name.length<=50) && (email.length>0 && email.length<=30) )){
    validate = false;
  }
  if (!validate)
      alert(msg);
  return validate;
}
