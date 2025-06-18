$(document).ready( function()
{
    getTabDataList();
})

function getTabDataList()
{
    var activeValue = $("a.nav-link.tab-active.active").data('value');
    console.log(activeValue);
    $.ajax({
        method:"get",
        data:{},
        url:base_url+"admin/"+activeValue+"/get-list",
        success :function (result) {
            console.log('result',result.htmlStore);
            $('.result-'+activeValue).html(result.htmlStore);
            $('#myTable-'+activeValue).DataTable();

        },
        error: function()
        {

        }
    })
}
$(document).on('click','.tab-list', function()
{
    getTabDataList();
})