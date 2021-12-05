export default function doUpdate(){
    let data = {
        "deptID":$("#deptID").val(),
        "deptName":$("#deptName").val(),
    }

    axios.post("index.php?action=updateDept",Qs.stringify(data))
    .then(res => {        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}