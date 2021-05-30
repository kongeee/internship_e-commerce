function searchSomething(){
    document.getElementById("searchForm").submit();
}


if(document.getElementsByClassName("discount").innerHTML != "0%"){
    
    document.getElementsByClassName("price").style.color = "red";
    document.getElementsByClassName("price").style.textDecoration = "line-through";

}
    
