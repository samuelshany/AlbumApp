let data=[];
let httpReq = new XMLHttpRequest();
httpReq.open('GET',"http://localhost/inventorySystem/public/api/viewAllApi");
httpReq.send();

httpReq.onreadystatechange=function ()
{
    if(httpReq.readyState == 4 && httpReq.status == 200 )
    {
        data=JSON.parse(httpReq.response);
        console.log(data);
        
    }
}

function search(x)
{
    let temp=``;
    for(var i=0;i<data.length;i++)
    {
        
        if(data[i].productName.toLowerCase().includes(x.toLowerCase()))
        {
            temp+=`
            
            <div class="col-md-3  " >
            <div class="productt text-right "  >
            <img src="images/mofasa.jpg" class="imgg " >    
            <h2><span class="badge badge-primary w">`+data[i].productCat+`</span>`+data[i].productName+`</h2>
           <p>`+data[i].productDesc +`</p>
           <div class="price"><h4>`+data[i].buyPrice+`</h4></div>
           <h2> الكمية :`+data[i].productAmount+` </h2>
           <h3> سعععععر البيع :`+data[i].sellPrice+`</h3>
           <h2> الربح :`+data[i].profit+`</h2>
          
       
           <form class="form-inline mx-2 py-2  my-lg-0" onsubmit="sell(`+data[i].id+`)">
           
       <button class="btn btn-primary" type="submit">بيع</button>
       </form>
       <form class="form-inline mx-2 py-2  my-lg-0" onsubmit="update(`+data[i].id+`)" >
       <button  class="btn btn-warning" type="submit"  >تعديل</button>
       </form>
       <form class="form-inline mx-2 py-2  my-lg-0"  onsubmit="delete(`+data[i].id+`)">
           
       <button class="btn btn-danger " type="submit">مسح</button>
       </form>
            </div>
            </div>
          `;
        }
    }
    document.getElementById('product').innerHTML=temp;
    //document.getElementById('key').innerHTML='';
}

function update(x)
{
    console.log('update '+x);
}
function sell(x)
{
    console.log('sell '+x);
}
function Delete(x)
{
    console.log('dlete '+x);
}