function searchSomething(){
    document.getElementById("searchForm").submit();
}


let elements = document.querySelectorAll(".price");
elements.forEach(function(element){
    element.style.color = "red";
    element.style.textDecoration = "line-through";
});



    
