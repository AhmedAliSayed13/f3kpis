jQuery(function($) {
    // $('body').scrollToTop({
    //     skin: 'cycle'
    // });
    window.current = $(window).scrollTop();
});
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
var $btnmenu=$('#profile-icon');

$btnmenu.mouseover(function () {

    if($btnmenu.hasClass('d-block')){
        $btnmenu.removeClass('d-block');
    }
    else{
        $btnmenu.addClass('d-block');
    }
});

$("#priv_admin").change(function () {
    if ($(this).is(":checked")) {
        $("#user-privileges").hide();
    }
    else {
        $("#user-privileges").show();
    }
});


$('.selected-options').multiSelect('select');


$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


$('#btn_json').click(function(){
    $("#myTable").tableHTMLExport({
        // csv, txt, json, pdf
        type:'json',
        // file name
        filename:'sample.json'
    });

});
$('#btn_csv').click(function(){
    $("#myTable").tableHTMLExport({
        // csv, txt, json, pdf
        type:'xls',
        // file name
        filename:'file.xls'
    });
});
$('#btn_pdf').click(function(){

    $('#printTable').printThis({
        importCSS: true,
        // header: "<h1 class='text-center'>Look at all of my kitties!</h1>"
        //  header: "<div class='col-12 '>" +
        //      "<div class='col-lg-6 float-left  text-center'><img src='/ui/images/logo.png' /></div>" +
        //      "<div class='col-lg-6 float-left mt-2 text-center'><p >ÙˆÙƒØ§Ù„Ø© Ø§Ù„ÙˆØ§Ø²Ø§Ø±Ø© Ù„Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Ùˆ Ø§Ù„ØµÙŠØ§Ù†Ø©</p></div>" +
        //      "<div class='col-lg-6 float-left  text-center'><img src='/ui/images/logo.png' /></div>" +
        //      "</div>",
         //header: "<div class='col-12'><div class='col-4 float-left text-center'><img src='/ui/images/logo.png' /></div><div class='col-4 float-left text-center'><p style='font-size: 22px;font-weight: bold;margin-top: 30px'>ÙˆÙƒØ§Ù„Ø© Ø§Ù„ÙˆØ§Ø²Ø§Ø±Ø© Ù„Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Ùˆ Ø§Ù„ØµÙŠØ§Ù†Ø©</p></div><div class='col-4 float-left text-center'><img src='/ui/images/analytics.png' /></div></div>",
         //footer: "<div class='col-12'><p style='text-align:center;font-size: 16px;font-weight: bold;margin-top: 30px'> Ø¬Ù…ÙŠØ¹ Ø§Ù„Ø­Ù‚ÙˆÙ‚ Ù…Ø­ÙÙˆØ¸Ø© Ù„ÙˆØ²Ø§Ø±Ø© Ø§Ù„ØªØ¹Ù„ÙŠÙ…- Ø§Ù„Ù…Ù…Ù„ÙƒØ© Ø§Ù„Ø¹Ø±Ø¨ÙŠØ© Ø§Ù„Ø³Ø¹ÙˆØ¯ÙŠØ©</p></div>"
    });

    // const element = document.getElementById("printTable");
    // // Choose the element and save the PDF for our user.
    // const print_button = document.getElementById("print_div");
    // $(print_button).css("display", "none");
    // html2pdf()
    //     .from(element)
    //     .save();
    // $(print_button).css("display", "block");
});
$('#btn_csv').click(function(){

        var uri = 'data:application/vnd.ms-excel;base64,',
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
        var toExcel = document.getElementById("myTable").innerHTML;
        var ctx = {
            worksheet: name || '',
            table: toExcel
        };
        var link = document.createElement("a");
        link.download = "export.xls";
        link.href = uri + base64(format(template, ctx))
        link.click();

});
// $(function() {
//     // v2.24.6, change popup print & close button text
//     // See print_now description
//     $.tablesorter.language.button_print = "Print";
//     $.tablesorter.language.button_close = "Close";
//
//     $(".tablesorter").tablesorter({
//
//         sortList: [[0,0]],
//         widgets: ["zebra", "filter", "print", "columnSelector"],
//         widgetOptions : {
//             columnSelector_container : $('#columnSelector'),
//             columnSelector_name : 'data-name',
//             print_title      : 'ÙˆÙƒØ§Ù„Ø© Ø§Ù„ÙˆØ²Ø§Ø±Ø© Ù„Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Ùˆ Ø§Ù„ØµÙŠØ§Ù†Ø©',          // this option > caption > table id > "table"
//             print_dataAttrib : 'data-name', // header attrib containing modified header name
//             print_rows       : 'f',         // (a)ll, (v)isible, (f)iltered, or custom css selector
//             print_columns    : 's',         // (a)ll, (v)isible or (s)elected (columnSelector widget)
//             print_extraCSS   : '',          // add any extra css definitions for the popup window here
//             print_styleSheet : '/ui/css/ahmed-style.css', // add the url of your print stylesheet
//             print_now        : true,        // Open the print dialog immediately if true
//             // callback executed when processing completes - default setting is null
//             print_callback   : function(config, $table, printStyle) {
//                 // do something to the $table (jQuery object of table wrapped in a div)
//                 // or add to the printStyle string, then...
//                 // print the table using the following code
//                 $.tablesorter.printTable.printOutput( config, $table.html(), printStyle );
//             }
//         }
//     });
//
//     $('.print').click(function() {
//         $('.tablesorter').trigger('printTable');
//     });
//
// });
$(function() {
    $("#myTable").tablesorter({ sortList: [[0,0]]});
});
// $( "#list-option" ).mouseleave(function() {
//    alert('run');
// });
function createPDF() {
    var sTable = document.getElementById('table_div').innerHTML;
    var style = "<style>";
    style = style + "table {width: 100%;font: 30px Calibri;direction:rtl;  }";
    style = style + "h5 {margin: 33px auto; text-align: center; font-size:20px}";
    style = style + "table {border: 1; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center; margin-top:0px; }";
    style = style + "td {border:1px solid #0c8575; }";
    style = style + "th {color: #6a6b6b;font-size: 20px; padding: 20px;}";
    style = style + ".tablerow1{ width: 100%;display: inline-block;}";
    style = style + ".tablerow{ width: 33%;display: inline-block;float: right;}";
    style = style + ".tablerow img{ margin-top: 20px;}";
    style = style + "thead th {border: none;padding: 25px 0px; color: white; background : #0c8575;  }";
    style = style + "table {width: 100%;font: 30px Calibri;direction:rtl;  }";
    style = style + "h3 {margin: 33px auto; text-align: right; font-size:20px }";
    style = style + "p {margin: 33px auto; text-align: right; font-size:20px;color:#0c8575; }";
    style = style + "nav.page-header {border-bottom: 6px solid #0c8575; padding-bottom: 30px; border-top: 18px solid #0c8575;margin-top: -10px;padding : 60px 0px}";
    style = style + ".right-bookmark {height: 231px; float: right; display: inline-block;background-color: #0c8575;padding: 5px;  color: #fff;position: relative;  top: -100px;margin-left: 33px;width: 16px;  border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;}";
    style = style + ".text-right {   padding-right: 45px; margin-top: -31px; border-top: 39px solid #0c8575;}";
    style = style + ".right-bookmark p {    color: #0c8575; position: relative; top: 45%;right: 10px;   font-size: 0px;font-weight: bolder; }";
    style = style + "table {border: none; border-collapse: collapse; width: 90%; margin: auto;";
    style = style + "padding: 2px 3px;text-align: center; margin-top:0px; }";
    style = style + "td {border:none; }";
    style = style + "th {color: #6a6b6b;font-size: 20px; padding: 20px;}";
    style = style + ".tablerow1{ width: 100%;display: inline-block;}";
    style = style + ".tablerow{ width: 33%;display: inline-block;float: right;}";
    style = style + ".tablerow img{ margin-top: 20px;}";
    style = style + "thead th {border: none;padding: 25px 0px; color: white; background : #0c8575;  }";
    style = style + "tr:nth-child(even) { background-color: #dee2e6;}";
    style = style + "td, td + td, th + th { padding: 10px 0; border-left: 10px solid white;border-right: 10px solid white; border-bottom: 10px solid white;}";
    style = style + ".text-right { border-top: none;}";
    style = style + ".img{ width: 25%;margin-top: -147px;margin-left: 33px;float:left}";
    // style = style + ".text-right{ display: inline-block;}";
    style = style + "</style>";
    // CREATE A WINDOW OBJECT.
    var win = window.open(' ', '', 'height=1000,width=1000');
    win.document.write('<html><head>');
    win.document.write('<title>primary_by_reg</title>');   // <title> FOR PDF HEADER.
    win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    // win.document.write(sTable2);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write('</body></html>');
    win.document.close(); 	// CLOSE THE CURRENT WINDOW.
    win.print();    // PRINT THE CONTENTS.
}
$("#fixed-form-container .body").hide();
$('#btn-print').click(function () {
    if($("#fixed-form-container .body").is(":visible")){
        $("#fixed-form-container .body").hide();
        document.getElementById("btn-print").innerHTML = '<i class="fas fa-plus"></i> تصدير'
    }else{
        $("#fixed-form-container .body").show();
        document.getElementById("btn-print").innerHTML = '<i class="fas fa-minus"></i> تصدير'
    }
});

// document.querySelector("#raphael-paper-3 > g.raphael-group-4-parentgroup > g.raphael-group-20-legend > g > g > text:nth-child(1)")

//document.querySelector("#raphael-paper-3 > g.raphael-group-4-parentgroup > g.raphael-group-20-legend > g > g > rect:nth-child(3)")

//document.querySelector("#raphael-paper-3 > g.raphael-group-4-parentgroup > g.raphael-group-20-legend > g > g > rect:nth-child(3)")

// $('#raphael-paper-0 > g.raphael-group-5-parentgroup > g.raphael-group-13-legend > g > rect:nth-child(3)').click(function(){
//     alert('hidden this dataset');
// });

$("#raphael-paper-0 > g.raphael-group-5-parentgroup > g.raphael-group-13-legend > g > rect:nth-child(3)").click(function(){
    alert('hidden this dataset');
});
