const validate = document.querySelector('form');
const submit = document.querySelector('.submit');
let prod_name = document.querySelector('.prod_name')
let prod_price = document.querySelector('.prod_price')
let prod_desc = document.querySelector('.prod_desc')
let prod_image = document.querySelector('.prod_image');
let prod_size = document.querySelector('.prod_size');
let product={};
const url = 'prod_api2.php';
let img;



const sendtoDB = function(url, product){
    fetch(url,{
        "method":"POST",
        "headers":{
            "content-Type": "application/JSON ; charset=utf-8"
        },
        "body":JSON.stringify(product)
    })
    .then(function(response) {
        console.log(response)
        return response.json()
    }).then(function(data){
        console.log(data)
    }).catch(function( err){
        console.error(err);
})
}

const mydata = function(){
    let files = prod_image.files
    let images;

console.log(files);
    const reader =  new FileReader();
    reader.readAsDataURL(files[0]);
    reader.addEventListener('load', function(){
    // console.log(reader.result);
    // console.log(reader);
    images=reader.result
    // console.log(images);
    product= {
        prod_name:prod_name.value,
        prod_desc:prod_desc.value,
        prod_price:prod_price.value,
        prod_size:prod_size.value,
        prod_image:prod_image.files
    }
console.log(product);
sendtoDB(url,product)
});


}



submit.addEventListener('click', function(ev){
    ev.preventDefault();
     prod_name  = prod_name.value;
     prod_desc  = prod_desc.value;
     prod_price  = prod_price.value;
     prod_size  = prod_size.value;
     prod_image  = prod_image.files;

    prod_name.value = prod_name;
    prod_desc.value = prod_desc;
    prod_price.value = prod_price;
    prod_size.value = prod_size;
    prod_image.value = prod_image;



})
