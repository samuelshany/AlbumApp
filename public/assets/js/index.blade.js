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
            <div>
            <img src="images/mofasa.jpg" class="imgg " >    
            <h2><span class="badge badge-primary w">`+data[i].productCat+`</span>`+data[i].productName+`</h2>
           <p>`+data[i].productDesc +`</p>
           <div class="price"><h4>`+data[i].buyPrice+`</h4></div>
           <h2> الكمية :`+data[i].productAmount+` </h2>
           <h3> سعر البيع :`+data[i].sellPrice+`</h3>
           <h2> الربح :`+data[i].profit+`</h2>
           </div>
           <div id="key">
      
       </div>`;
        }
    }
    document.getElementById('product').innerHTML=temp;
    //document.getElementById('key').innerHTML='';
}