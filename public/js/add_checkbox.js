// if(window.location.href.split('/').pop() == "add"){
let checkboxes = document.querySelectorAll(`input[type='checkbox']`);
function check() {
    const selectedValues = [];
    let flg = [];
    for (let i = 0; i < checkboxes.length; i++) {
        let id = i+1;
        let spot_id = "check"+id;
        if (document.getElementById(spot_id).checked) {
            flg.push(true);
        } else {
            flg.push(false);
        }
    }
    console.log(flg);
    for(let i = 0; i < flg.length; i++){
        if(flg[i] == true){
            selectedValues.push(checkboxes[i].value);
        }
    }
    document.getElementById("selectedValues").textContent = selectedValues.join(
        ", "
    );
    let name = document.getElementById('spot_select');
    name.value = selectedValues;
    console.log(document.getElementById('spot_select').value);
}
// }