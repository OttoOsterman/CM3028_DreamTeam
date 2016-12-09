
var myImage = document.getElementById("homepage");

var imageArray=["downies.jpg","beachSunset.jpg"];

var imageIndex = 0;

function changeImage(){
    myPhoto.setAttribute("/src/images",imageArray [imageIndex]);

    imageIndex++;

    if(imageindex >=imageArray.length){
        imageIndex=0;
    }
}

var intervalHandle = setInterval(changeImage,3000);

myPhoto.onclick=function(){
    clearInterval(intervalHandle);
}

