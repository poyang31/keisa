export default function doUpdate(){
    let data = {
        "supplierID":$("#supplierID").val(),
        "supplierName":$("#supplierName").val(),
        "contactPerson":$("#contactPerson").val(),
        "phoneNumber":$("#phoneNumber").val(),
        "address":$("#address").val(),
    }

    axios.post("index.php?action=updateSupplier",Qs.stringify(data))
    .then(res => {        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}