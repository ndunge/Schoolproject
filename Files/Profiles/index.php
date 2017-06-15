<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$url = Url::to(['profiles/create']);
//print_r($url); exit;
?>
<style media="screen">
  ul.pagination {
    display: none;
  }
</style>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
        <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
        <li><a href="../">Home</a></li>
        <li><?= $this->title; ?></li>
</ul>

<style media="screen">
  .material-table .material-table {
    padding: 0;
  }

  .material-table .material-table .hiddensearch {
    padding: 0 14px 0 24px;
    border-bottom: solid 1px #DDDDDD;
    display: none;
  }

  .material-table .material-table .hiddensearch input {
    margin: 0;
    border: transparent 0 !important;
    height: 48px;
    color: rgba(0, 0, 0, .84);
  }

  .material-table .material-table .hiddensearch input:active {
    border: transparent 0 !important;
  }

  .material-table .material-table table {
    table-layout: fixed;
  }

  .material-table .material-table .table-header {
    height: 64px;
    padding-left: 24px;
    padding-right: 14px;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    display: flex;
    -webkit-display: flex;
    border-bottom: solid 1px #DDDDDD;
  }

  .material-table .material-table .table-header .actions {
    display: -webkit-flex;
    margin-left: auto;
  }

  .material-table .material-table .table-header .btn-flat {
      min-width: 36px;
      padding: 0 8px;
  }

  .material-table .material-table .table-header input {
    margin: 0;
    height: auto;
  }

  .material-table .material-table .table-header i {
    color: rgba(0, 0, 0, 0.54);
    font-size: 24px;
  }

  .material-table .material-table .table-footer {
    height: 56px;
    padding-left: 24px;
    padding-right: 14px;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    flex-direction: row;
    -webkit-justify-content: flex-end;
    justify-content: flex-end;
    -webkit-align-items: center;
    align-items: center;
    font-size: 12px !important;
    color: rgba(0, 0, 0, 0.54);
  }

  .material-table .material-table .table-footer .dataTables_length {
    display: -webkit-flex;
    display: flex;
  }

  .material-table .material-table .table-footer label {
    font-size: 12px;
    color: rgba(0, 0, 0, 0.54);
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row
    /* works with row or column */

    flex-direction: row;
    -webkit-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    justify-content: center;
  }

  .material-table .material-table .table-footer .select-wrapper {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row
    /* works with row or column */

    flex-direction: row;
    -webkit-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    justify-content: center;
  }

  .material-table .material-table .table-footer .dataTables_info,
  .material-table .material-table .table-footer .dataTables_length {
    margin-right: 32px;
  }

  .material-table .material-table .table-footer .material-pagination {
    display: flex;
    -webkit-display: flex;
    margin: 0;
  }

  .material-table .material-table .table-footer .material-pagination li:first-child {
    margin-right: 24px;
  }

  .material-table .material-table .table-footer .material-pagination li a {
    color: rgba(0, 0, 0, 0.54);
  }

  .material-table .material-table .table-footer .select-wrapper input.select-dropdown {
    margin: 0;
    border-bottom: none;
    height: auto;
    line-height: normal;
    font-size: 12px;
    width: 40px;
    text-align: right;
  }

  .material-table .material-table .table-footer select {
    background-color: transparent;
    width: auto;
    padding: 0;
    border: 0;
    border-radius: 0;
    height: auto;
    margin-left: 20px;
  }

  .material-table .material-table .table-title {
    font-size: 20px;
    color: #000;
  }

  .material-table .material-table table tr td {
    padding: 0 0 0 56px;
    height: 48px;
    font-size: 13px;
    color: rgba(0, 0, 0, 0.87);
    border-bottom: solid 1px #DDDDDD;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .material-table .material-table table tr td a {
    color: inherit;
  }

  .material-table .material-table table tr td a i {
    font-size: 18px;
    color: rgba(0, 0, 0, 0.54);
  }

  .material-table .material-table table tr {
    font-size: 12px;
  }

  .material-table .material-table table th {
    font-size: 12px;
    font-weight: 500;
    color: #757575;
    cursor: pointer;
    white-space: nowrap;
    padding: 0;
    height: 56px;
    padding-left: 56px;
    vertical-align: middle;
    outline: none !important;
  }

  .material-table .material-table table th.sorting_asc,
  .material-table .material-table table th.sorting_desc {
    color: rgba(0, 0, 0, 0.87);
  }

  .material-table .material-table table th.sorting:after,
  .material-table .material-table table th.sorting_asc:after,
  .material-table .material-table table th.sorting_desc:after {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 16px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    word-wrap: normal;
    -webkit-font-feature-settings: 'liga';
    -webkit-font-smoothing: antialiased;
    /*content: "arrow_back";*/
    -webkit-transform: rotate(90deg);
    display: none;
    vertical-align: middle;
    content: ''
  }

  .material-table .material-table table th.sorting:hover:after,
  .material-table .material-table table th.sorting_asc:after,
  .material-table .material-table table th.sorting_desc:after {
    display: inline-block;
  }

  .material-table .material-table table th.sorting_desc:after {
    /*content: "arrow_forward";*/
  }

  .material-table .material-table table tbody tr:hover {
    background-color: #EEE;
  }

  .material-table .material-table table th:first-child,
  .material-table .material-table table td:first-child {
    padding: 0 0 0 24px;
  }

  .material-table .material-table table th:last-child,
  .material-table .material-table table td:last-child {
    padding: 0 14px 0 0;
  }

  .material-table .material-table table th {
      height: 2rem;
  }
  .dataTables_filter {
    width: 100%;
  }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" rel="stylesheet">

<div class="material-table">
  <div class="row">
    <div id="admin" class="col s12">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">User Accounts</span>
          <div class="actions">
            <a href="<?= $url ?>" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <?php
          $account_types = [
            1 => 'Admin',
            2 => 'Employee',
            3 => 'IT Staff',
          ];
        ?>
        <table id="datatable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Account Type</th>
              <th>CustomerID</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dataSet as $key => $employee): ?>
              <tr data-url="<?= 'update?id='.$employee['CustomerID']  ?>">
                <td> <?= $employee['names']  ?> </td>
                <td> <?= $account_types[ $employee['AccountTypeID'] ]  ?> </td>
                <td> <?= $employee['CustomerID']  ?> </td>
                <td> <?= $employee['Email']  ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="pure-u-1"></div>
<!--
<div class="profiles-index">
    <p>
        <?= Html::a('Add User', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'timestamp',
            //'ProfileID',
            //'AccountTypeID',
            //'CustomerID',
            'Employee No',
             'names',
            // 'UserName',
            // 'Password',
            // 'Status',
            // 'IDNumber',
            // 'Locked',
            // 'FailedAttempts',
            // 'Reset',
            // 'CreatedDate',
            // 'ChangeLogUserID',
            // 'ChangeLogDateTime',
            // 'ReferenceNo',
            // 'Salt',
            'Email',
            [
              'attribute'=>'AccountTypeID',
              'format'=>'raw',
              'value' => function($data) {
                  $account_types = [
                    1 => 'Admin',
                    2 => 'Employee',
                    3 => 'IT Staff',
                  ];
                  return $account_types[ $data['AccountTypeID'] ];
              }
            ],
            [
                    'attribute'=>'Actions',
                    'format'=>'raw',
                    'value' => function($data)
                    {
                        return(
                          Html::a('Manage', ['profiles/update','id'=> $data['Employee No']], ['title' => 'View','class'=>''])
                          //. ' | ' . Html::a('Reset Password', ['profiles/mail','id'=> $data['Employee No']], ['title' => 'View','class'=>''])
                        );
                    }
            ],
        ],
        'tableOptions' => [
            'class' => 'dataTable striped border hovered bordered',
            'data-role' => 'datatable',
            'data-searching' => 'true',
            'data-paging' => 'true',
            'data-ordering' => 'true',
            'data-info' => 'true'
        ],
    ]); ?>
</div> -->

<div class="pure-u-1"></div>

<script type="text/javascript">
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
                  })
                  .append($('<a>', {
                      'href': '#',
                      'aria-controls': settings.sTableId,
                      'data-dt-idx': counter,
                      'tabindex': settings.iTabIndex
                    })
                    .html(btnDisplay)
                  )
                  .appendTo(container);

                settings.oApi._fnBindAction(
                  node, {
                    action: button
                  }, clickHandler
                );

                counter++;
              }
            }
          }
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
          buttons
        );

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
        "oLanguage": {
          "sStripClasses": "",
          "sSearch": "",
          "sSearchPlaceholder": "Enter Keywords Here",
          "sInfo": "_START_ -_END_ of _TOTAL_",
          "sLengthMenu": '<span>Rows per page:</span><select class="browser-default">' +
            '<option value="10">10</option>' +
            '<option value="20">20</option>' +
            '<option value="30">30</option>' +
            '<option value="40">40</option>' +
            '<option value="50">50</option>' +
            '<option value="-1">All</option>' +
            '</select></div>'
        },
        bAutoWidth: false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
      $('.material-table').on('click', 'tbody tr', function () {
        window.location.href = $(this).data().url
        console.log('($(this) ::', $(this).data().url)
      } );
    });
</script>
