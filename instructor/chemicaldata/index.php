 <?php
 error_reporting(0);
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: ../");
}
if (isset($_POST["variable"])){
  $filename = 'chemicalData.json';
$somecontent = $_POST["variable"];

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'w')) {
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        exit;
    }

    fclose($handle);

} else {
  }
}

 ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" type="image/png" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="mask-icon" type="" href="" color="#111">
    <title>Material Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../css/chemicaldata.css">
    <!-- ../../css/ -->
    <script>
        window.console = window.console || function(t) {};
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>

<body translate="no">
    <div class="row">
        <div id="admin" class="col s12">
            <div class="card material-table">
                <div class="table-header">
                    <span class="table-title">Welcome, <?php echo $_SESSION['user_id'] ?></span>
                    <div class="actions">
                      <button id="convert-table" onclick = "onSave()" class = "save" style = "border:none; border-radius: 5px;">Save</button>
                        <a href="#add_users" onclick = "newChem()" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                    </div>
                </div>
                <div id="datatable_wrapper" class="dataTables_wrapper no-footer">

                    <table id="datatable" class="dataTable no-footer" role="grid" aria-describedby="datatable_info">
                        <thead>
                            <tr role="row">
                                <th id = "Chemical Name" class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Chemical Name</th>
                                <th id = "Type or Use of Chemical" class="sorting"  aria-controls="datatabl" rowspan="1" colspan="1" aria-label="">Type or Use of Chemical</th>
                                <th id = "Location of Chemical" class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Location of Chemical</th>
                                <th id = "Qty" class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Amount</th>
                                <th id = "Ex/Un" class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Expired or Unwanted? (Yes or No)</th>
                            </tr>
                        </thead>
                          <tbody>
                            <?php
                            $strJsonFileContents = file_get_contents("chemicalData.json");
                            $array = json_decode($strJsonFileContents, true);
                            foreach($array as $item){
                              echo "<tr role='row' class='even' name = '".implode($item)."'>";
                              echo "<td class = 'sorting_1' contenteditable name = '".$item["Chemical Name"]."'>".$item["Chemical Name"]."</td>";
                              echo "<td contenteditable name = '".$item["Type or Use of Chemical"]."'>".$item["Type or Use of Chemical"]."</td>";
                              echo "<td contenteditable name = '".$item["Location of Chemical"]."'>".$item["Location of Chemical"]."</td>";
                              echo "<td contenteditable name = '".$item["Amount"]."'>".$item["Amount"]."</td>";
                              if($item["Expired or Unwanted? (Yes or No)"] == "Y" || $item["Expired or Unwanted? (Yes or No)"] == "Yes" || $item["Expired or Unwanted? (Yes or No)"] == "y"){
                                echo "<td contenteditable name = '".$item["Expired or Unwanted? (Yes or No)"]."'>Yes</td>";
                              }elseif($item["Expired or Unwanted? (Yes or No)"] == "N" || $item["Expired or Unwanted? (Yes or No)"] == "No" || $item["Expired or Unwanted? (Yes or No)"] == "n") {
                                echo "<td contenteditable name = '".$item["Expired or Unwanted? (Yes or No)"]."'>No</td>";
                              }else{
                                echo "<td contenteditable name = '".$item["Expired or Unwanted? (Yes or No)"]."'>Unknown</td>";
                              }
                              echo "</tr>";
                            }
                             ?>
                           </tbody>
                      </form>
                    </table>
                </div>

            </div>
            <!-- <div class="card material-table" style = "max-width: 70%; align: center; margin-left:auto;margin-right:auto;">
              <table>
                <div class="table-header">
                    <span class="table-title">Change Log</span>
                </div>
                <div id="datatable_wrapper" class="dataTables_wrapper no-footer">


                </div>

              </table>
          </div> -->
        </div>
    </div>


</body>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-9bf952ccbbd13c245169a0a1190323a27ce073a3d304b8c0fdf421ab22794a58.js?n=1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js?n=1"></script>
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js?n=1"></script>
<script id="rendered-js">
    (function(window, document, undefined) {

        var factory = function($, DataTable) {
            "use strict";

            $('.search-toggle').click(function() {
                if ($('.hiddensearch').css('display') == 'none')
                    $('.hiddensearch').slideDown();
                else

                    $('.hiddensearch').slideUp();
            });

            /* Set the defaults for DataTables initialisation */
            $.extend(true, DataTable.defaults, {
                dom: "<'hiddensearch'f'>" +
                    "tr" +
                    "<'table-footer'lip'>",
                renderer: 'material'
            });

            /* Default class modification */
            $.extend(DataTable.ext.classes, {
                sWrapper: "dataTables_wrapper",
                sFilterInput: "form-control input-sm",
                sLengthSelect: "form-control input-sm"
            });

            /* Bootstrap paging button renderer */
            DataTable.ext.renderer.pageButton.material = function(settings, host, idx, buttons, page, pages) {
                var api = new DataTable.Api(settings);
                var classes = settings.oClasses;
                var lang = settings.oLanguage.oPaginate;
                var btnDisplay, btnClass, counter = 0;

                var attach = function(container, buttons) {
                    var i, ien, node, button;
                    var clickHandler = function(e) {
                        e.preventDefault();
                        if (!$(e.currentTarget).hasClass('disabled')) {
                            api.page(e.data.action).draw(false);
                        }
                    };

                    for (i = 0, ien = buttons.length; i < ien; i++) {
                        if (window.CP.shouldStopExecution(0)) break;
                        button = buttons[i];

                        if ($.isArray(button)) {
                            attach(container, button);
                        } else {
                            btnDisplay = '';
                            btnClass = '';

                            switch (button) {

                                case 'first':
                                    btnDisplay = lang.sFirst;
                                    btnClass = button + (page > 0 ?
                                        '' : ' disabled');
                                    break;

                                case 'previous':
                                    btnDisplay = '<i class="material-icons">chevron_left</i>';
                                    btnClass = button + (page > 0 ?
                                        '' : ' disabled');
                                    break;

                                case 'next':
                                    btnDisplay = '<i class="material-icons">chevron_right</i>';
                                    btnClass = button + (page < pages - 1 ?
                                        '' : ' disabled');
                                    break;

                                case 'last':
                                    btnDisplay = lang.sLast;
                                    btnClass = button + (page < pages - 1 ?
                                        '' : ' disabled');
                                    break;
                            }

                            if (btnDisplay) {
                                node = $('<li>', {
                                    'class': classes.sPageButton + ' ' + btnClass,
                                    'id': idx === 0 && typeof button === 'string' ?
                                        settings.sTableId + '_' + button : null
                                }).

                                append($('<a>', {
                                        'href': '#',
                                        'aria-controls': settings.sTableId,
                                        'data-dt-idx': counter,
                                        'tabindex': settings.iTabIndex
                                    }).

                                    html(btnDisplay)).

                                appendTo(container);

                                settings.oApi._fnBindAction(
                                    node, {
                                        action: button
                                    },
                                    clickHandler);

                                counter++;
                            }
                        }
                    }
                    window.CP.exitedLoop(0);
                };

                // IE9 throws an 'unknown error' if document.activeElement is used
                // inside an iframe or frame.
                var activeEl;

                try {
                    // Because this approach is destroying and recreating the paging
                    // elements, focus is lost on the select button which is bad for
                    // accessibility. So we want to restore focus once the draw has
                    // completed
                    activeEl = $(document.activeElement).data('dt-idx');
                } catch (e) {}

                attach(
                    $(host).empty().html('<ul class="material-pagination"/>').children('ul'),
                    buttons);

                if (activeEl) {
                    $(host).find('[data-dt-idx=' + activeEl + ']').focus();
                }
            };

            /*
             * TableTools Bootstrap compatibility
             * Required TableTools 2.1+
             */
            if (DataTable.TableTools) {
                // Set the classes that TableTools uses to something suitable for Bootstrap
                $.extend(true, DataTable.TableTools.classes, {
                    "container": "DTTT btn-group",
                    "buttons": {
                        "normal": "btn btn-default",
                        "disabled": "disabled"
                    },

                    "collection": {
                        "container": "DTTT_dropdown dropdown-menu",
                        "buttons": {
                            "normal": "",
                            "disabled": "disabled"
                        }
                    },

                    "print": {
                        "info": "DTTT_print_info"
                    },

                    "select": {
                        "row": "active"
                    }
                });

                // Have the collection use a material compatible drop down
                $.extend(true, DataTable.TableTools.DEFAULTS.oTags, {
                    "collection": {
                        "container": "ul",
                        "button": "li",
                        "liner": "a"
                    }
                });

            }

        }; // /factory

        // Define as an AMD module if possible
        if (typeof define === 'function' && define.amd) {
            define(['jquery', 'datatables'], factory);
        } else if (typeof exports === 'object') {
            // Node/CommonJS
            factory(require('jquery'), require('datatables'));
        } else if (jQuery) {
            // Otherwise simply initialise as normal, stopping multiple evaluation
            factory(jQuery, jQuery.fn.dataTable);
        }

    })(window, document);

    $(document).ready(function() {
        $('#datatable').dataTable({
            "ajax": '',
            "oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Enter any keyword here to filter...",
                "sInfo": "_START_ -_END_ of _TOTAL_",
                "sLengthMenu": '<span>Rows per page:</span><select class="browser-default">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1" id = "all" selected = true>All</option>' +
                    '</select></div>'
            },

            bAutoWidth: false
        });

    });

    //# sourceURL=pen.js
</script>
<script>
function newChem(){
  var tbody = document.querySelector("tbody");
  var newTr = document.createElement("tr"); //role='row' class='even'
  newTr.setAttribute("role","row");
  newTr.setAttribute("class","even");
  for(var i = 0; i < 5; i++){
    var td = document.createElement("td");
    td.setAttribute("contenteditable","true");
    newTr.appendChild(td);
  }
  tbody.prepend(newTr);

}
function isEmpty(myObject) {
    for(var key in myObject) {
        if (myObject.hasOwnProperty(key)) {
            return false;
        }
    }

    return true;
}
function onSave(){
    document.getElementById("all").selected = true;
    $(function(){ /* DOM ready */
      $("#all").change();
  });
  $(function(){ /* DOM ready */
      $("select").change();
  });

  var $table = $("table")
      rows = [],
      header = [];

  $table.find("thead th").each(function () {
      header.push($(this).html());
  });

  $table.find("tbody tr").each(function () {
      if($.trim($(this).html())) {
      var row = {};

      $(this).find("td").each(function (i) {
        if($(this).html() != ""){
          var key = header[i],
              value = $(this).html();

          row[key] = value;
      }});
      if(JSON.stringify(row) != "{}"){
      rows.push(row);
    }

  }});
  // alert(JSON.stringify(rows));
  for(var o in rows){
    if(isEmpty(o)){
      rows = rows.splice(rows.indexOf(o),1);
    }
  }
  var myval = JSON.stringify(rows,null,2); // generated by PHP, null,2 pretty prints the data
  $.ajax({
    type: 'POST',
    url: 'index.php',
    data: {'variable': myval},
  });
  setTimeout(function(){location.reload();},1000);

}








</script>
</html>
