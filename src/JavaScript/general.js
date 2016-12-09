var imageCount = 1;
var total = 2;

function slide(x) {
    var Image = document.getElementById('img');
    Image.src = "/src/imageSlider/img" + imageCount + ".jpg";
    imageCount++;
    if (imageCount > total) {
        imageCount = 1;
    }
    if (imageCount < 1){
        imageCount = total;
    }

}