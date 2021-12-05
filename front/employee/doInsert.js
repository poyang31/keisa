export default function doInsert(){
    let data = {
        "name":$("#name").val(),
        "password":$("#password").val(),
        "workdate":$("#workdate").val(),
        "address":$("#address").val(),
        "email":$("#email").val(),
        "phone":$("#phone").val(),
    }

    axios.post("http://localhost/newMVC/backend/index.php?action=newUser",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        console.log(response);
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}