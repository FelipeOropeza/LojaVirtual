function Valida(){
    let $data = document.getElementById("data").value;
    
    if($data == ''){
        document.getElementById("data").value = "xx-xx-xxxx";
    }
};