export default function doInsert(productID){
    let data = {
        "productID":productID,
    }

    axios.post("index.php?action=removeProduct",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}