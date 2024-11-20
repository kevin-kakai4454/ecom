const validate = document.querySelector('form');
const submit = document.querySelector('.submit');
const prod_name = document.querySelector('.prod_name')
const prod_price = document.querySelector('.prod_price')
const prod_desc = document.querySelector('.prod_desc')
const prod_image = document.querySelector('.prod_image');
const prod_size = document.querySelector('.prod_size');
let product={};
const url = 'prod_api2.php';
let img;



const selects = async function(prod_image){
prod_image.addEventListener('chnge', function(ev){
    ev.target
    console.log(prod_image.files[0]);
    let file = prod_image.files[0]
    console.log(file)
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.addEventListener('load', function(){
            img = reader.result
            console.log(img);
        })

    })
    const image = await img;
    return image;

}

console.log(selects(prod_image));
selects(prod_image)
.then(function(res){
    console.log(res);
})
/*

    //////
    
    
    // console.log(files[1])
  function mydata(){
            let files = prod_image.files

        
        for (let i = 0; i<=files.length-1;i++){
            const reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.addEventListener('load', function(){
            // console.log(reader.result);
            // console.log(reader);
            images.push(reader.result);
    console.log(images);

        })
    // console.log(images);

    }
    
    product= {
        prod_name:prod_name.value,
        prod_desc:prod_desc.value,
        prod_price:prod_price.value,
        prod_size:prod_size.value,
        prod_image:images
    }


    return product;


}
(async function() {
    try {
        const mdata = await mydata();
        console.log(mdata);
    } catch (error) {
        console.log(error);
    }
    console.log("Finished")
})();
    
    // console.log(images);
    /////


    // product= {
    //     prod_name:prod_name.value,
    //     prod_desc:prod_desc.value,
    //     prod_price:prod_price.value,
    //     prod_size:prod_size.value,
    //     prod_image:images
    // }
    // sendtoDB(url, product);
    // fetch(url,{
    //     "method":"POST",
    //     "headers":{
    //         "content-Type": "application/JSON ; charset=utf-8"
    //     },
    //     "body":JSON.stringify(product)
    // })
    // .then(function(response) {
    //     console.log(response)
    //     return response.json()
    // }).then(function(data){
    //     console.log(data)
    // })

// const state= await ("completer");
//     console.log(state)
})


*/

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
    })
}


submit.addEventListener('click', function(ev){
    ev.preventDefault();
    //////


    //////
    /*
    let files = prod_image.files
    let images = [];


for (let i = 0; i<=files.length-1;i++){
    const reader = await new FileReader();
    reader.readAsDataURL(files[i]);
    reader.addEventListener('load', function(){
    // console.log(reader.result);
    // console.log(reader);
    images.push(reader.result)
    // console.log(images);
    
})

}
    */
   /////
    
    
    // console.log(files[1])
  const mydata = async function(){
            let files = prod_image.files
            let images;

        
            const reader = await new FileReader();
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
                prod_image:images
            }
        console.log(product);
        sendtoDB(url,product)
        });
        console.log(images);
    
    const newimage = await images;
    return newimage;
  }
  console .log (mydata());
  ( async () => {
    // let dei = await mydata();
    mydata().then(function(how){
        console.log(how);
    })
  })()
    mydata().then(function(response){
    console.log(response);
    return response

//   })
    
    product= {
            prod_name:prod_name.value,
            prod_desc:prod_desc.value,
            prod_price:prod_price.value,
            prod_size:prod_size.value,
            prod_image:response
        }
    console.log(product);
    // sendtoDB(url, product);
    // try{
    fetch(url,{
        "method":"POST",
        "headers":{
            "content-Type": "application/JSON ; charset=utf-8"
        },
        "body":JSON.stringify(product)
    })
    .then(function(respo) {
        console.log(respo)
        return respo.json();
    }).then(function(data){
        console.log(data)
    })
  })
  .catch((error) => console.error('Error:', error));
// }
})
// })();

