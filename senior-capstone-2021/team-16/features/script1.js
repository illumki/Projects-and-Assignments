
function loadPosts() {
    let posts = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var text = this.responseText;
            let lines = text.split("\n");
            for (var i = 0; i < lines.length; i++) {
                let info = lines[i].split(",");
                let message = {
                    "id": info[0],
                    "message": info[2],
                    "date": info[3],
                    "email": info[4],
                    "comments": []
                }
                let parent = info[1];
                let found = false;
                if (parent != "-1") {
                    for (var j = 0; j < posts.length; j++) {
                        let obj = posts[j];
                        if (obj.id == parent) {
                            obj.comments.push(message);
                            found = true;
                            break;
                        }
                    }
                }

                if (!found) {
                    posts.push(message);
                }
            }

            displayPosts(posts);
        }
    };
    xhttp.open("GET", "posts.txt", true);
    xhttp.send();
}


function displayPosts(posts) {
    let htmlString = "";

    for (var i = 0; i < posts.length; i++) {
        if (posts[i].hasOwnProperty("email"))
            htmlString += "<div class='post'><img src='" + posts[i].email + ".jpg' alt='Profile'/><p><i>" + posts[i].date + "</i><br>" + posts[i].message
                + "</p><button onclick='show(\"" + posts[i].id + "\")' id='btn-" + posts[i].id + "'>Comment</button><br>" +
                "<form id='cmt-" + posts[i].id + "' class='cmt' action='posts.php' method='post'><textarea name='message'></textarea>" +
                "<input type='hidden' name='parent' value='" + posts[i].id + "'/><input type='submit' value='send' name='post'/></form>";
        if (posts[i].comments.length > 0) {
            htmlString += "<div class='cmts'>";
            for (var j = 0; j < posts[i].comments.length; j++) {
                htmlString += "<div class='post'><img src='profile.png' alt='Profile'/><p><i>" + posts[i].comments[j].date + "</i><br>" + posts[i].comments[j].message
                    + "</p></div>";
            }
            htmlString += "</div>";
        }

        htmlString += "</div>";
    }
    htmlString += "<h3>Say Something...</h3><form action='posts.php' method='post'><textarea name='message'></textarea>" +
        "<input type='submit' value='send' name='post'/></form></div>";
    document.getElementById("posts").innerHTML = htmlString;
}

function show(id) {
    document.getElementById("cmt-" + id).classList.toggle("show");
}
loadPosts();
