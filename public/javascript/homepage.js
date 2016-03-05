/* To allow the rows to be clickable if they have JavaScript */
$(document).ready(function() {
    $(".post-table__cell--controls__details-link").each(function() {
        var url = $(this).attr("href");
        var $row = $(this).closest("tr");
        $row.click(function() {
            window.location.href = url;
        }).css("cursor", "pointer");
    });
});
