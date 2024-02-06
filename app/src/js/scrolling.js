"use strict";
class Scroll{
    constructor(elements){
        this.elements = elements;
        this.current = 1;
        this.display = elements[0].style.display;
        for(let i=3; i<this.elements.length; i++){
            this.elements.item(i).style.display = "none";
        }
    }
    
    scrollLX(){
        if(this.current>1){
            this.elements.item(this.current+1).style.display = "none";
            this.current--;
            this.elements.item(this.current-1).style.display = this.display;
        }
    }
    
    scrollDX(){
        if(this.current<this.elements.length-2){
            this.elements.item(this.current-1).style.display = "none";
            this.current++;
            this.elements.item(this.current+1).style.display = this.display;
        }
    }
}
const divs = document.getElementsByClassName("scrolling");
for(let i = 0; i < divs.length; i++){
    let current = divs.item(i);
    let s = new Scroll(current.getElementsByTagName("div"));
    current.getElementsByClassName("arrow sx").item(0).addEventListener("click", function(){s.scrollLX()});
    current.getElementsByClassName("arrow dx").item(0).addEventListener("click", function(){s.scrollDX()});
}