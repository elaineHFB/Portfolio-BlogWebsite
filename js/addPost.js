//This function shows different color of notice when sth's not entered
function stop(){
    var title = document.forms["addpost"]["title"].value;
    var blog = document.forms["addpost"]["blog"].value;
    
    clear();

    if(title==null || title==""){
        document.getElementById('notice').style.color="red";
        document.getElementById('title').style.borderColor="red";
        event.preventDefault();
    }
    
    if(blog==null || blog==""){
        document.getElementById('notice').style.color="red";
        document.getElementById('blog').style.borderColor="red";
        event.preventDefault();
    }
}
function clear(){
    //reset all color at beginning
    document.getElementById('notice').style.color="black";
    document.getElementById('blog').style.borderColor="black";
    document.getElementById('title').style.borderColor="black";

}
function confirm_reset(){
    return conf = window.confirm("Are you sure you wanna clear the post?");
}
