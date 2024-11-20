const categories = document.querySelector('#categories');
const catTittle = document.querySelector('.cat');
const  div = document.querySelector('.container');
const row = document.querySelector('.roo');

console.log(row);


console.log(div);
console.log(catTittle);

const imageDisplay = function(product){
  const phpto = product.prod_image

  const html =`
  
        <div class="d-flex mt-3 gap-3">
          <div>
            <div class="card text-bg-light" style="width: 10rem;">
              <img src="../images/dress-1.jpg" class="card-image-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Trouser</h5>
                <p class="card-text">
                <p class="oldprice">Ksh. 400.00</p>
                <p class="price">Ksh. 300.00</p>
                </p>
              </div>
            </div>
          </div>

  `
}



// const product = function(cloth,i){
//   const dispalay = `
//   <div class="d-flex gap-4 mt-3">
//   <div>
//   <div class="card text-bg-light" style="width: 10rem;" >
//   <img src="../../images/${cloth}-${i}.jpg" class="card-image-top" alt=""> 
//   <div class="card-body">
//   <h5 class="card-title">Jeans Troser</h5>
//   <p class="card-text">
//   <p class="oldprice">Ksh. 400.00</p>
//   <p class="price" >Ksh. 300.00</p>
//   </p>
//   </div>
//   </div>
//   </div>
  
//   `
//   return dispalay;
// }

  // <img src="../../images/${cloth}-${i}.jpg" class="card-image-top" alt=""> 

  const product = function(data){
    const dispalay = `
    <div class="d-flex gap-4 mt-3">
    <div>
    <div class="card text-bg-light" style="width: 10rem;" >
    <img src="Uploads/${data.prod_image}" class="card-image-top" alt=""> 
    <div class="card-body">
    <h5 class="card-title">${data.prod_name}</h5>
    <p class="card-text">
    <p class="oldprice">Ksh. 400.00</p>
    <p class="price" >${data.prod_price}</p>
    </p>
    </div>
    </div>
    </div>
    
    `
    return dispalay;
  }

  const base64_decode = function(data){
    const base64String = data[0].prod_image;
    // console.log(base64String);
    const mimeType = 'image/jpg';
    const byteCharacters = atob(base64String);
    const byteArrays = [];

    for(let offset = 0; offset < offset.length; offset += 1024){
      const slice = byteCharacters.slice(offset, offset+1024);
      const byteNumbers = new Array(slice.length);
      for(let i; i < slice.length; i++){
        byteNumbers[i] = slice.charCodeAt(i);
      }
      byteArrays.push(new Uint8Array(byteNumbers));
    }
    const blob = new Blob(byteArrays, {type: mimeType});
    const file = new File([blob], 'image/jpeg', {type:mimeType})
    console.log(file
      
    )

  }

  const getPic = function(cloth){
    fetch(`prod_data.php`,{
      "method":"POST",
      "headers" : {

            // header('Content-Type: image/jpeg');
        "Content-Type": "application/json;charset=utf-8;"
      },
      "body":JSON.stringify(cloth)
    })
    .then(function(respo){
      console.log(respo);
      return respo.json();
    }).then(function(data){
      console.log(data);
      div.appendChild = product(data);      
    })
  }




categories.addEventListener('click', function(ev){
    console.log("btn cliked")
    const cloth = ev.target.textContent;
    console.log(cloth);

  getPic(cloth);

})


const image_decode = async function(data){
  let filo = data.prod_image
            let images;
        
            const reader =  new FileReader();
            reader.readAsDataURL(filo);
            reader.addEventListener('load', function(){
            console.log(reader.result);
            console.log(reader);
            images=reader.result
            console.log(images);
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