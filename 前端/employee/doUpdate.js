export default function doUpdate(){
    let data = {
        "id":$("#id").val(),
        "name":$("#name").val(),
        "password":$("#password").val(),
        "workdate":$("#workdate").val(),
        "address":$("#address").val(),
        "email":$("#email").val(),
        "phone":$("#phone").val(),
    }

    axios.post("index.php?action=updateUser",Qs.stringify(data))
    .then(res => {        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}