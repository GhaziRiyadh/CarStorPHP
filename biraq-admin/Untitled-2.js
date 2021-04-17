function getType() {
    var toyota = ['Camry','Corolla','Yaris'];
    var x = document.getElementById('brand').value;
    var items;
    if (x == "Toyota") {
        items = toyota;
    }
    var str = "";
    for (var item of items) {
        str += "<option value=\""+item+"\">"+item+"</option>";
    }
    document.getElementById("model").innerHTML = str;
    document.getElementById("model").selectpicker('refresh');
}

document.getElementById('brand').addEventListener("select", getType);