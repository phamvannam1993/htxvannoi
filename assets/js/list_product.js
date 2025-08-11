
var search = ""
function getProduct(page = 1, limit = 15, search = '') {
    var category_id = $('#category_id').val()
    fetch("/api/products?page="+page+"&limit="+limit+"&search="+search+"&category_id="+category_id)
    .then(res => res.text())
    .then(data => {
        $("#products").html(data)
    })
    .catch(err => {
        console.error("Lỗi:", err);
    });
}
getProduct()
$("body").on("click", '.page-number', function() {
    var page = $(this).attr('data-page')
    getProduct(page)
})
$("body").on("click", '.btn-tab', function() {
    var id = $(this).attr('id')
    if(id == 'list') {
        $('.grid-group-item').addClass('list-group-item')
    } else {
        $('.grid-group-item').removeClass('list-group-item')
    }
})
$("body").on("click", ".close-popup-fc", function() {
    $('.popup-fc-wrapper').find(".popup-fc-container").hide()
})

$(".e-search-submit").click(function() {
    var search = $("#search-font").val()
    getFont(1, 15, search)
})

document.getElementById('search-font').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        var search = $("#search-font").val()
        getFont(1, 15, search)
    }
});