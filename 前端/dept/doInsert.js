export default function doInsert(){
    let data = {
        "deptName":$("#deptName").val(),
    }

    axios.post("index.php?action=newDept",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        console.log(response);
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}