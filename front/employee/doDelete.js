export default function doInsert(id){
    let data = {
        "id":id,
    }

    axios.post("http://localhost/newMVC/backend/index.php?action=removeUser",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}