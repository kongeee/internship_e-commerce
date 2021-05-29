function searchSomething(){
    document.getElementById("searchForm").submit();
}


if(document.getElementsByClassName("discount").innerHTML != "0%"){
    
    document.getElementsByClassName("discount").style.color = "red";
    document.getElementsByClassName("discount").style.textDecoration = "line-through";

}
    
