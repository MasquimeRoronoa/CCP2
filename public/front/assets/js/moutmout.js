$(document).ready(function () {

    $(".imgfoot").click(function (event) {
        event.preventDefault()
        $(".miel").attr("src", $(this).attr('src'))

    })

}