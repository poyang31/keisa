export default function doInsert(supplierID ){
    let data = {
        "supplierID":supplierID ,
    }

    axios.post("index.php?action=removeSupplier",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}