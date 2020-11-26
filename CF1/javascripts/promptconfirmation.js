function PopIt() {
    return "Are you sure you want to leave?";
}
function UnPopIt() { /* nothing to return */
}

$(document).ready(function() {
    window.onbeforeunload = PopIt;
    $(".tabs, #nextBtn, #submitBtn, #prevBtn").click(function() {
        window.onbeforeunload = UnPopIt;
    });
});
            