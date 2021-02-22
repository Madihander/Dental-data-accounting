//http://shpargalkablog.ru/2013/08/checked.html
$(document).ready(function () {
    let cariesbut = $("caries");
for(let i=0;i<cariesbut.length; i++){
    cariesbut[i].on('click', ()=>{
        buttonsControl(this,i)
    });
function buttonsControl(button,i) {
    console.log(i);
}
}

});