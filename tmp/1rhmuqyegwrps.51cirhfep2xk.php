
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

<script>


  // pdf

  function createPDF() {

     // var sTable2 =  document.getElementById("chart-container").innerHTML;

      var sTable = document.getElementById('table_div').innerHTML;

      var style = "<style>";
        style = style +" @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');}";

      style = style + "h3 {margin: 10px auto; text-align: right; font-size:20px }";
      style = style + "p {margin: 6px auto; text-align: right; font-size:18px ;font-family: 'Cairo', sans-serif; }";
      style = style + "#p_span{ direction: rtl; color: black;}";
     style = style + ".p_span{ display: inline-block;    padding: 0px 5px; }";
      style = style + "table {width: 100%;font: 30px Calibri;direction:rtl;   }";

      style = style + ".right-bookmark { height: 78px;float: right;  display: inline-block;  background-color: #0c8575;  padding: 5px;color: #fff;position: relative;margin-left: 33px;width: 16px;border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;}";
      style = style + ".text-right {   padding-right: 45px; margin-top: 5px;border-top: 60px solid #0c8575;}";
      style = style + ".right-bookmark p {    color: #0c8575; position: relative; top: 45%;right: 10px;   font-size: 0px;font-weight: bolder; }";
      style = style + ".page-title2 { display:none}";
      style = style + "table {border: none; border-collapse: collapse; width: 90%; margin: auto; direction: rtl;";
      style = style + "padding: 2px 3px;text-align: center; margin-top:0px; }";
      // style = style + "td {border:1px solid red; }";
      style = style + "th {color: #6a6b6b;font-size: 20px; padding: 20px;}";
      style = style + ".tablerow1{ width: 100%;display: inline-block;}";
      style = style + ".tablerow{ width: 33%;display: inline-block;float: right;}";
      style = style + ".tablerow img{ margin-top: 20px;}";
      style = style + "thead th {border: none;padding: 25px 0px; color: white; background : #009788;  }";
      style = style + "tr:nth-child(even) { background-color: #f2f2f2;}";
      // style = style + "hr{border-top: 2px solid red;margin: 19px auto;width: 89%;}";
      style = style + "span { color: #0c8575;font-weight: bold; font-family: 'Cairo', sans-serif;}";
      style = style + "td, td + td, th + th {  font-family: 'Cairo', sans-serif; padding: 2px 0;  border-left: 10px solid white;border-right: 10px solid white; border-bottom: 10px solid white; font-size: 16px;}";

      style = style + "nav{ border-bottom: 1px solid #000;  margin-bottom: 14px ;}";
      style = style + ".img{  margin-top: -111px;float: left;}";
      style = style + ".row{ margin-bottom: 20px;}";
      style = style + ".hr{ display: none;}";
      style = style + ".page-title {text-align: right; margin: 0;  padding-top:3px}";
      style = style + ".page-title a {color: #0c8575 ; cursor: default; font-weight: bold; font-family: 'Cairo', sans-serif; font-size: 18px;}";

       style = style + ".sub-title {color: #797676;}";
      // style = style + ".text-right{ display: inline-block;}";
      style = style +" @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');}";
      style = style + "</style>";

      // CREATE A WINDOW OBJECT.
      var win = window.open(' ', '', 'height=1000,width=1000');

      win.document.write('<html><head>');
      win.document.write('<title>نماذج البحث والاسترجاع</title>');   // <title> FOR PDF HEADER.
      win.document.write('<link rel="preconnect" href="https://fonts.gstatic.com">');   // <title> FOR PDF HEADER.
      win.document.write('<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">');   // <title> FOR PDF HEADER.

      win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
      win.document.write('</head>');
      win.document.write('<body>');
      // win.document.write(sTable2);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
      win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.

      win.document.write('</body></html>');

     win.document.close();
     win.focus();
     win.print();
     win.close();   //دي اللي عاملة مشكلة
     win.print();    // PRINT THE CONTENTS.
  }

      // excel


      function exportTableToExcel(tableID, filename = 'chart'){
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tableID);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

      // Specify file name
      filename = filename?filename+'.xls':'excel_data.xls';

      // Create download link element
      downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if(navigator.msSaveOrOpenBlob){
          var blob = new Blob(['\ufeff', tableHTML], {
              type: dataType
          });
          navigator.msSaveOrOpenBlob( blob, filename);
      }else{
          // Create a link to the file
          downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

          // Setting the file name
          downloadLink.download = filename;

          //triggering the function
          downloadLink.click();
      }
      }

  </script>
