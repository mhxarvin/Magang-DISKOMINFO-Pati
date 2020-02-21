/*---LEFT BAR ACCORDION----*/
$(function () {
    $('#nav-accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
        //        cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });
});

var Script = function () {

    //    sidebar dropdown menu auto scrolling

    jQuery('#sidebar .sub-menu > a').click(function () {
        var o = ($(this).offset());
        diff = 250 - o.top;
        if (diff > 0)
            $("#sidebar").scrollTo("-=" + Math.abs(diff), 500);
        else
            $("#sidebar").scrollTo("+=" + Math.abs(diff), 500);
    });

    //    sidebar toggle

    $(function () {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.fa-bars').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-210px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '210px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

    // custom scrollbar
    $("#sidebar").niceScroll({ styler: "fb", cursorcolor: "#e8403f", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled: false, cursorborder: '' });

    $("html").niceScroll({ styler: "fb", cursorcolor: "#e8403f", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled: false, cursorborder: '', zindex: '1000' });

    // widget tools

    jQuery('.panel .tools .fa-chevron-down').click(function () {
        var el = jQuery(this).parents(".panel").children(".panel-body");
        if (jQuery(this).hasClass("fa-chevron-down")) {
            jQuery(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.panel .tools .fa-times').click(function () {
        jQuery(this).parents(".panel").parent().remove();
    });


    //    tool tips

    $('.tooltips').tooltip();

    //    popovers

    $('.popovers').popover();



    // custom bar chart

    if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }


}();

(function ($) {
    //appTable using datatable
    $.fn.tabel = function (options) {


        var defaults = {
            source: "", //data url
            xlsColumns: [], // array of excel exportable column numbers
            pdfColumns: [], // array of pdf exportable column numbers
            printColumns: [], // array of printable column numbers
            columns: [], //column title and options
            order: [[0, "asc"]], //default sort value
            hideTools: false, //show/hide tools section
            bFilter: true,
            displayLength: 10, //default rows per page
            dateRangeType: "", // type: daily, weekly, monthly, yearly. output params: start_date and end_date
            checkBoxes: [], // [{text: "Caption", name: "status", value: "in_progress", isChecked: true}] 
            radioButtons: [], // [{text: "Caption", name: "status", value: "in_progress", isChecked: true}] 
            filterDropdown: [], // [{id: 10, text:'Caption', isSelected:true}] 
            //filterParams: {datatable: true}, //will post this vales on source url
            filterParams: [{ name: "nocustom", value: true }],
            onDeleteSuccess: function () {
            },
            onUndoSuccess: function () {
            },
            onInitComplete: function () {
            },
            customLanguage: {
                printButtonToolTip: "Press escape when finished",
                today: "Today",
                yesterday: "Yesterday",
                tomorrow: "Tomorrow"
            }
        };

        var $instance = $(this);

        //check if this binding with a table or not
        if (!$instance.is("table")) {
            console.log("Element must have to be a table", this);
            return false;
        }

        var settings = $.extend({}, defaults, options);

        // reload
        if (settings.reload) {
            var table = $(this).dataTable();
            var instanceSettings = window.InstanceCollection[$(this).selector];
            if (!instanceSettings) {
                instanceSettings = settings;
            }
            table.fnReloadAjax(instanceSettings.filterParams);
            return false;
        }

        var datatableOptions = {
            sAjaxSource: settings.source,
            fnServerParams: function (aoData) {
                aoData.push.apply(aoData, settings.filterParams);
                // var sParam =aoData.concat(settings.filterParams );

            },
            // ajax: {
            //     url: settings.source,
            //     type: "POST",
            //     data: settings.filterParams
            // },
            sServerMethod: "POST",
            columns: settings.columns,
            bPaginate: true,
            bProcessing: true,
            bServerSide: true,
            bDestroy: true,
            bFilter: settings.bFilter,
            deferRender: true,
            iDisplayLength: settings.displayLength,
            bAutoWidth: false,
            order: settings.order,
            fnInitComplete: function () {
                settings.onInitComplete(this);
            },
            language: {
                lengthMenu: "_MENU_ per page",
                zeroRecords: "No record found.",
                search: "",
                searchPlaceholder: "Pencarian...",
                "oPaginate": {
                    "sPrevious": "<<",
                    "sNext": ">>"
                }

            }
        };

        if (!settings.hideTools) {
            datatableOptions.sDom = "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>";
        }

        var oTable = $instance.dataTable(datatableOptions),
            $instanceWrapper = $instance.closest(".dataTables_wrapper");

        window.InstanceCollection = window.InstanceCollection || {};
        window.InstanceCollection["#" + this.id] = settings;

        $.fn.dataTableExt.oApi.fnReloadAjax = function (oSettings, filterParams) {
            if (oSettings.oFeatures.bServerSide) {
                oSettings.aoServerParams = [];
                oSettings.aoServerParams.push({
                    "sName": "user",
                    "fn": function (aoData) {
                        for (var i = 0; i < filterParams.length; i++) {
                            aoData.push(filterParams[i]);
                        }
                    }
                });
                this.fnClearTable(oSettings);
                return;
            }

        };


    };
})(jQuery);