const categories = document.querySelector('#categories');
const catTittle = document.querySelector('.cat');
const  container = document.querySelector('.container');
const row = document.querySelector('.row');
const home = document.querySelector('#home');
const result = document.querySelector('#result');
const prod2 =[];

console.log(result);
console.log('connected');
const url = "prod_dataAll.php";


console.log(container);
console.log(catTittle);
const productDisp = function(product){
    const dispalay = `
    <div class="col" >
    <div class="d-flex gap-4 mt-3">
    <div class="card text-bg-light" style="width: 10rem;" >
    <img src="Uploads/${product.prod_image}" class="card-image-top" alt=""> 
    <div class="card-body">
    <h5 class="card-title">${product.prod_name}</h5>
    <p class="card-text">
    <p class="oldprice">Ksh. 400.00</p>
    <p class="price" >Ksh. ${product.prod_price}</p>
    </p>
    </div>
    </div>
    </div>
    `
    return dispalay;
  }


  

  result.textContent = " ";


const getAllProduct = function(url){
    fetch(url)
    .then(function(respo){
        console.log(respo);
        return respo.json();
    })    
    .then(function(data){
        console.log(data);
        data.forEach(product => {
          console.log(product);
          prod2.push(product)
          row.innerHTML += productDisp(product);
        });

    })
}

getAllProduct(url);

const getSelectedProduct = function(prod){
  fetch(`prod_data.php`,{
    "method":"POST",
    "headers" : {

      "Content-Type": "application/json;charset=utf-8;"
    },
    "body":JSON.stringify(prod)
  })
  .then(function(respo){
    console.log(respo);
    return respo.json();
  }).then(function(data){
    if(data[0]){
    console.log(typeof(data));
    console.log(data);
    data.forEach(function(product){
      console.log(product.prod_image);
      result.textContent = " ";
      row.innerHTML += productDisp(product);
    })    
    }else{
      console.log("No such product found");
      result.textContent = "Product Out of Stock ";
    }
    })
  }
// }


  

categories.addEventListener('click', function(ev){
    console.log("btn cliked")
    const prod= ev.target.textContent;
    console.log(prod);
    row.innerHTML = "";
    getSelectedProduct(prod);

});

home.addEventListener('click', function(ev){
  ev.preventDefault();
  console.log(prod2);
  row.innerHTML="";
  prod2.forEach(function(product2){
    console.log(product2);
    row.innerHTML += productDisp(product2);

  })
})


