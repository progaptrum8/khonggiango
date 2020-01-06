/*
 * Xử lý chung cho chức năng báo cáo
 * @author: MauBV
 * @date:   2017/07/10
 */
var baoCaoElement = {
    checked: "checked",
    hidden: "hidden",
    disabled: "disabled",
    datepickerFirst: "#datepickerFirst",
    datepickerEnd: "#datepickerEnd",
    datepickerFirstOne: "#datepickerFirstOne",
    datepickerEndOne: "#datepickerEndOne",
    btnDatepickerFirst: ".datepickerFirst",
    btnDatepickerEnd: ".datepickerEnd",
    btnDatepickerFirstOne: ".datepickerFirstOne",
    btnDatepickerEndOne: ".datepickerEndOne",
    monthArea: ".monthArea",
    monthRadios: "input[name='monthRadios']",
    quarterRadios: "input[name='quarterRadios']",
    yearRadios: "input[name='yearRadios']",
    dataTable: "#dataTable",
    inputDate: "#inputDate",
    reportdateClass: ".reportdate",
    createdDateName: "input[name='createdDate']",
    insertDateError: ".insertDateError",
    
    exportButton:"#exportButton",
    printButton:"#printButton",
    showButton:"#showButton",
    isExcel:"#isExcel",
    isPrint:"#isPrint"    
};
var baoCaoEvent = {
    init: function () {
        this.datepickerClick();
        this.classDatepickerClick();
        this.radioInit();
        this.radioSelectmonth();
        this.radioSelectQuarter();
        this.radioSelectyear();
        this.inputDateClick();
        this.inputDateChange();
        
        this.showReport();
        this.exportExcelReport();
        this.printReport();
    },
    datepickerClick: function () {
        $(baoCaoElement.datepickerFirst).datepicker({
            ignoreReadonly: true,
            dateFormat: 'dd/mm/yy'
        });
        $(baoCaoElement.datepickerEnd).datepicker({
            ignoreReadonly: true,
            dateFormat: 'dd/mm/yy'
        });
        $(baoCaoElement.datepickerFirstOne).datepicker({
            ignoreReadonly: true,
            dateFormat: 'dd/mm/yy'
        });
        $(baoCaoElement.datepickerEndOne).datepicker({
            ignoreReadonly: true,
            dateFormat: 'dd/mm/yy'
        });
    },
    classDatepickerClick: function () {
        $(baoCaoElement.btnDatepickerFirst).on('click', function () {
            $(baoCaoElement.datepickerFirst).focus();
        });
        $(baoCaoElement.btnDatepickerEnd).on('click', function () {
            $(baoCaoElement.datepickerEnd).focus();
        });
        $(baoCaoElement.btnDatepickerFirstOne).on('click', function () {
            $(baoCaoElement.datepickerFirstOne).focus();
        });
        $(baoCaoElement.btnDatepickerEndOne).on('click', function () {
            $(baoCaoElement.datepickerEndOne).focus();
        });
    },
    radioInit: function () {
        var date = new Date(), month = date.getMonth();
        var $radioCurrrentMonth = $(baoCaoElement.monthArea).find('input[value=' + (parseInt(month) + 1) + ']');
        $radioCurrrentMonth.prop(baoCaoElement.checked, true);
        $(baoCaoElement.datepickerFirst).val(getFirstDate($radioCurrrentMonth.val()));
        $(baoCaoElement.datepickerEnd).val(getLastDate($radioCurrrentMonth.val()));
        $(baoCaoElement.quarterRadios).attr(baoCaoElement.checked, false);
        $(baoCaoElement.yearRadios).attr(baoCaoElement.checked, false);
    },
    radioSelectmonth: function () {
        $(baoCaoElement.monthRadios).on('change', function () {
            $(baoCaoElement.quarterRadios).prop(baoCaoElement.checked, false);
            $(baoCaoElement.yearRadios).prop(baoCaoElement.checked, false);
            $(baoCaoElement.datepickerFirst).val(getFirstDate($(this).val()));
            $(baoCaoElement.datepickerEnd).val(getLastDate($(this).val()));
        });
    },
    radioSelectQuarter: function () {
        $(baoCaoElement.quarterRadios).on('change', function () {
            var valueRadio = $(this).val();
            $(baoCaoElement.monthRadios).prop(baoCaoElement.checked, false);
            $(baoCaoElement.yearRadios).prop(baoCaoElement.checked, false);
            if (valueRadio == 1) {
                $(baoCaoElement.datepickerFirst).val(getFirstDate(1));
                $(baoCaoElement.datepickerEnd).val(getLastDate(3));
            } else if (valueRadio == 2) {
                $(baoCaoElement.datepickerFirst).val(getFirstDate(4));
                $(baoCaoElement.datepickerEnd).val(getLastDate(6));
            } else if (valueRadio == 3) {
                $(baoCaoElement.datepickerFirst).val(getFirstDate(7));
                $(baoCaoElement.datepickerEnd).val(getLastDate(9));
            } else {
                $(baoCaoElement.datepickerFirst).val(getFirstDate(10));
                $(baoCaoElement.datepickerEnd).val(getLastDate(12));
            }
        });
    },
    radioSelectyear: function () {
        $(baoCaoElement.yearRadios).on('change', function () {
            $(baoCaoElement.monthRadios).prop(baoCaoElement.checked, false);
            $(baoCaoElement.quarterRadios).prop(baoCaoElement.checked, false);
            $(baoCaoElement.datepickerFirst).val(getFirstDate(1));
            $(baoCaoElement.datepickerEnd).val(getLastDate(12));
        });
    },
    inputDateClick: function () {
        $(baoCaoElement.inputDate).datepicker({dateFormat: 'dd/mm/yy'});
        $(baoCaoElement.reportdateClass).on('click', function () {
            $(baoCaoElement.inputDate).focus();
        });
    },
    inputDateChange: function () {
        $(baoCaoElement.inputDate).on('change', function () {
            var createDate = $(this).val() !== "" ? formatDatetime($(this).val()) : "";
            $(baoCaoElement.createdDateName).val(createDate);
        });
    },
    
    showReport:function(){
        $(baoCaoElement.showButton).on("click",function(){
            $(baoCaoElement.isExcel).val('0');
            $(baoCaoElement.isPrint).val('0');
            document.formBaoCao.target = 'reportview';
            document.formBaoCao.submit();
            return false;
        });
    },
    exportExcelReport:function(){
        $(baoCaoElement.exportButton).on("click",function(){
            $(baoCaoElement.isExcel).val('1');
            $(baoCaoElement.isPrint).val('0');
            document.formBaoCao.target = '_blank';
            document.formBaoCao.submit();
            return false;
        });
    },
    printReport:function(){
        $(baoCaoElement.printButton).on("click",function(){
            $(baoCaoElement.isExcel).val('0');
            $(baoCaoElement.isPrint).val('1');
            document.formBaoCao.target = '_blank';
            document.formBaoCao.submit();
            return false;
        });
    }
};
function getFirstDate(monthParam) {
    var date = new Date(), y = date.getFullYear();

    return formatShortDate(new Date(y, parseInt(monthParam) - 1, 1));
}
function getLastDate(monthParam) {
    var date = new Date(), y = date.getFullYear();

    return formatShortDate(new Date(y, (parseInt(monthParam) - 1) + 1, 0));
}
$(document).ready(function () {
    "use strict";
    baoCaoEvent.init();
});