/**
 * Created by Mwibutsa on 04/07/2018.
 */


function submitComment(){
    var comment = document.getElementById("comment").value;
    var postId = document.getElementById("postId").value;
    var userId = document.getElementById("userId").value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("allComments").innerHTML = this.responseText;
            xmlhttp.open("GET", "submitcomment.php?comment=" + comment+"&userId=1&postId="+postId, true);
            xmlhttp.send();
        }
    }
}
