export default function doUpdate(){
    let data = {
        "productID":$("#productID").val(),
        "productName":$("#productName").val(),
        "productCost":$("#productCost").val(),
        "unitprice":$("#unitprice").val(),
        "productCount":$("#productCount").val(),
    }

    axios.post("index.php?action=updateProduct",Qs.stringify(data))
    .then(res => {        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}