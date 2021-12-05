export default function doDelete(deptID){
    let data = {
        "deptID":deptID,
    }

    axios.post("http://localhost/newMVC/backend/index.php?action=removeDept",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}