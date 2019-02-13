//////////// <button class="button button1" onclick = "sliderImages.prev()">Назад</button>  <img id= "slider" src = "images/1.jpg"> /////////////////Слайдер с помощью функций
/*
var sliderImages = ['images/1.jpg','images/2.jpg','images/3.jpg']; // Создаём массив содержащий изображения для слайдера
var id = 0;
function nextClick() { // Функция отвечающая за кнопку next 
    var slider = document.getElementById('slider');
    id++;
    if(id >= sliderImages.length){
        id = 0;
    }
    slider.src = sliderImages[id];
}

function prevClick() { // Функция отвечающая за кнопку prev 
    var slider = document.getElementById ('slider');
    id--;
    if (id < 0){
        id = sliderImages.length-1;
    }
    slider.src = sliderImages [id];
}
*/
/*
///////////////////////////////<button class="button button1" onclick = "sliderImages.prev()">Назад</button>  <img id= "slider" src = "images/1.jpg"> ///////////Слайдер с помощью обьектов 
function slide (){ //Функция-конструктор обьектов типа slide
    this.id = 0; //this. для того чтобы id был виден только в данной задаче, можно было и глобально задать его, тогда везде без this. 
    this.sliderImages = ['images/1.jpg','images/2.jpg','images/3.jpg', 'images/4.jpg']; // Массив определили в функции-конструкторе, по другому undefined
    this.prev = prevClick; //Свойство prev, вызывает метод prevClick
    this.next = nextClick; //Свойство next, вызывает метод nextClick
};

function nextClick(){ //Методы для обьектов функции slide
    var slider = document.getElementById('slider');
    this.id++;
    if (this.id >= this.sliderImages.length){
        this.id = 0;
    }
    slider.src = this.sliderImages[this.id]; 
};

function prevClick(){ //Методы для обьектов функции slide
    var slider = document.getElementById('slider');
    this.id--;
    if (this.id < 0){
        this.id = this.sliderImages.length-1;
    }  
    slider.src = this.sliderImages[this.id];  
};

var sliderImages = new slide();
*/
///Тоже самое но с классами

class slide {
    constructor()
    {
        this.id = 0; //this. для того чтобы id был виден только в данной задаче, можно было и глобально задать его, тогда везде без this. 
        this.sliderImages = ['images/1.jpg','images/2.jpg','images/3.jpg', 'images/4.jpg']; // Массив определили в функции-конструкторе, по другому undefined
        this.prev = prevClick; //Свойство prev, вызывает метод prevClick
        this.next = nextClick; //Свойство next, вызывает метод nextClick
    }
};

function nextClick(){ //Методы для обьектов функции slide
    var slider = document.getElementById('slider');
    this.id++;
    if (this.id >= this.sliderImages.length){
        this.id = 0;
    }
    slider.src = this.sliderImages[this.id]; 
};

function prevClick(){ //Методы для обьектов функции slide
    var slider = document.getElementById('slider');
    this.id--;
    if (this.id < 0){
        this.id = this.sliderImages.length-1;
    }  
    slider.src = this.sliderImages[this.id];  
};

var sliderImages = new slide();

// function changeSlide(){
//     setInterval(sliderImages.next, 1000);
// }