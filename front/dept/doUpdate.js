export default function doUpdate(){
    let data = {
        "deptID":$("#deptID").val(),
        "deptName":$("#deptName").val(),
    }

    axios.post("http://localhost/newMVC/backend/index.php?action=updateDept",Qs.stringify(data))
    .then(res => {        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}