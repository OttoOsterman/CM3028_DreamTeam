/**
 * Created by 1405741 on 06/12/2016.
 */

    var imageCount = 1;
    var total = 5;


function slide(x) {
    var total = 2;
    var Image = document.getElementById('img');
    imageCount = imagecount+x;
    if(imageCount > total){
        imageCount = 1;
    }
    if(imageCount < 1 ){
        imagecount = total;
    }
    Image.src="/src/imageSlider/img" +imagecount + ".jpg"
}

