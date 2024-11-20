/*
const cont =document.querySelector('.container');
const validate = document.querySelector('form');
const submit = document.querySelector('.submit');
const prod_name = document.querySelector('.prod_name')
const prod_price = document.querySelector('.prod_price')
const prod_desc = document.querySelector('.prod_desc')
const prod_image = document.querySelector('.prod_image');
const prod_size = document.querySelector('.prod_size');
let product={};
const url = 'prod_api3.php';
let img;
console.log(cont);
let files = prod_image.files;
const file = files[0];


        
const image = function(url){
  const imageurl=  `<img id="imageDisplay" src="url" alt="Image" />`;
  return imageurl;
}
const sendtoDB = function(url, file){
    fetch(url,{
        "method":"POST",
        "headers":{
            "content-Type": "image/jpeg;application/JSON; charset=utf-8"
        },
        "body":file
    })
    .then(function(response) {
        console.log(response)
        // const imageblob = response.json()
        // console.log(imageblob);
        // const imageUrl = URL.createObjectURL(imageblob);
        return response.json();
        // console.log(imageUrl);
    })
    .then(function(data){
        console.log(data)
        // const imageUrl = URL.createObjectURL(data);
        // console.log(imageUrl);
// cont.innerHTML = image(imageUrl);
        // document.getElementById('imageDisplay').src = imageUrl;
    })
    .catch(function(err){
        console.log(err);
    })
}

const mydata = function(){
    let files = prod_image.files
    let images;

console.log(files[0]);
console.log( files[0].name);
const files1 = files[0];
//     const reader =  new FileReader();
//     reader.readAsDataURL(files[0]);
//     reader.addEventListener('load', function(){
//     // console.log(reader.result);
//     // console.log(reader);
//     images=reader.result
//     console.log(images);
//     product= {
//         prod_name:prod_name.value,
//         prod_desc:prod_desc.value,
//         prod_price:prod_price.value,
//         prod_size:prod_size.value,
//         prod_image:images
//     }
// console.log(product);
// // sendtoDB(url,product)
// });


img = files[0];

product= {
    prod_name:prod_name.value,
    prod_desc:prod_desc.value,
    prod_price:prod_price.value,
    prod_size:prod_size.value,
    prod_image:file
}
console.log(product);
}


        submit.addEventListener('click', function(ev){
            ev.preventDefault();
            mydata();
            sendtoDB(url, file);

})
*/
const prod_name = document.querySelector('.prod_name')
const prod_price = document.querySelector('.prod_price')
const prod_desc = document.querySelector('.prod_desc')
const prod_image = document.querySelector('.prod_image');
const prod_size = document.querySelector('.prod_size');
let product={};
const submit = document.querySelector('.submit');
const url = "prod_api3.php";

const image64 = function(image){
    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.addEventListener('load', function(){
        console.log(reader);
        const image64 = reader.result;
        // console.log(image64);
        product = {
        prod_name:prod_name.value,
        prod_desc:prod_desc.value,
        prod_price:prod_price.value,
        prod_size:prod_size.value,
        prod_image:image64
        }

        console.log(product);
        sendToPHP(product);
    })
}

const sendToPHP = function(product){
    fetch("prod_api3.php",
        {
        "method": "POST",
        "headers": {
            "content-Type":"application/json;charset=utf-8"
        },
        "body": JSON.stringify(product)
    })
    .then(function(rspo){
        console.log()
        return rspo.json();
    })
    .then(function(data){
        console.log(data);
    })
}

submit.addEventListener('click', function(ev){
    ev.preventDefault();
    const image = prod_image.files
    console.log(image[0].name);
    image64(image[0])
    const img64 =image[0].name ;
    // sendToPHP(img64)
})