alert("Welcome");

function applyAccessibilityFeatures() {

    let applied = localStorage.getItem("accessibilityFeatures");

    if (applied == null) {
        return;
    }
    applied = JSON.parse(applied);

    let elements = ["p", "label", "a", "button", "h1", "h2", "h3", "h4", "h5"];
    let texts = ["p", "label", "a", "button"];


    if (applied.darkMode) {
        try { document.getElementsByTagName("header")[0].style.backgroundColor = "#202020" } catch (err) { };
        try { document.getElementsByClassName("content")[0].style.backgroundColor = "#252525" } catch (err) { };
        try { document.getElementsByClassName("sidebar")[0].style.backgroundColor = "#303030" } catch (err) { };
        try { document.getElementsByClassName("main")[0].style.backgroundColor = "#404040" } catch (err) { };
    } else {
        try { document.getElementsByTagName("header")[0].style.backgroundColor = "aquamarine" } catch (err) { };
        try { document.getElementsByClassName("content")[0].style.backgroundColor = "#ffffff" } catch (err) { };
        try { document.getElementsByClassName("sidebar")[0].style.backgroundColor = "#ffffff" } catch (err) { };
        try { document.getElementsByClassName("main")[0].style.backgroundColor = "#ffffff" } catch (err) { };
    }


    for (var i = 0; i < elements.length; i++) {
        let element = elements[i];

        let elms = document.getElementsByTagName(element);

        for (var j = 0; j < elms.length; j++) {
            if (texts.includes(element)) {
                elms[j].style.fontSize = applied.textSize;
            }
            if (applied.darkMode) {
                if (element == "button") {
                    elms[j].style.backgroundColor = "#606060";
                }
                elms[j].style.color = "#909090";
            } else {
                if (element == "button") {
                    elms[j].style.backgroundColor = "aquamarine";
                }
                elms[j].style.color = "#000000";
            }
            elms[j].style.color = applied.color;
        }
    }


}


applyAccessibilityFeatures();