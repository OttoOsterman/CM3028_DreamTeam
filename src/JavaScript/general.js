/**
 * Created by 1405741 on 06/12/2016.
 */

    var imageCount = 1;
    var total = 2;


function slide(x) {
    var Image = document.getElementById('img');

    imageCount = imageCount+x;

    if(imageCount > total){imageCount = 1;}

    if(imageCount < 1 ){imageCount = total;}

    Image.src="/src/imageSlider/img" +imageCount + ".jpg";
}

window.setInterval(function slideAuto(){
    
    var Image = document.getElementById('img');

    imageCount = imageCount+1;

    if(imageCount > total){imageCount = 1;}

    if(imageCount < 1 ){imageCount = total;}

    Image.src="/src/imageSlider/img" +imageCount + ".jpg";
    
},5000);


