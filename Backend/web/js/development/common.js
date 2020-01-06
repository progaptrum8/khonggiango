function reloadTab(id, link, clickTab, tabTargetId = 'autoShowHideDiv') {
    showTabDiv(id, link, clickTab, tabTargetId);
    $("#" + tabTargetId + id).data('curtab', clickTab);
}

function showHideTab(id, link, clickTab, tabTargetId = 'autoShowHideDiv') {
    if (document.getElementById(tabTargetId + id).hasChildNodes()) {
        if ($("#" + tabTargetId + id).data("curtab") == clickTab) {
            hideTabDiv(id, clickTab, tabTargetId);
        } else {
            showTabDiv(id, link, clickTab, tabTargetId);
        }
    } else {
        showTabDiv(id, link, clickTab, tabTargetId);
    }
    $("#" + tabTargetId + id).data('curtab', clickTab);
}

function hideTabDiv(id, clickTab, tabTargetId) {
    document.getElementById(tabTargetId + id).innerHTML = "";
    //$("#" + clickTab + id).css("textDecoration", "");
}

function showTabDiv(id, link, clickTab, tabTargetId) {
    hideTabDiv(id, clickTab, tabTargetId);
    //$("#" + clickTab + id).css("textDecoration", "underline");
    $("#" + tabTargetId + id).html('<img src="/images/loading_indicator.gif"><img src="/images/loading_indicator.gif"><img src="/images/loading_indicator.gif">');
    $.ajax({
        dataType: "html",
        url: link,
        success: function (data) {
            $("#" + tabTargetId + id).html("");
            $("#" + tabTargetId + id).html(data);
        }
    });
}

function exactDataAjax(data){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    return $.extend(data,{'_csrf' : csrfToken});
}

function formatShortDate(date) {
    var dd = date.getDate();
    var mm = date.getMonth() + 1;
    var yyyy = date.getFullYear();

    if (dd < 10)
        dd = "0" + dd;
    if (mm < 10)
        mm = "0" + mm;

    return dd + "/" + mm + "/" + yyyy;
}
function formatDatetime(stringDate) {
    var date = stringDate.split("/");
    date = new Date(date[2], date[1] - 1, date[0]);
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var date = date.getDate();
    if (month < 10)
        month = "0" + month;
    if (date < 10)
        date = "0" + date;

    return year + "-" + month + "-" + date + " 00:00:00";
}

function dateToDatetime(date) {
    date = date.getFullYear() + '-' +
            ('00' + (date.getMonth() + 1)).slice(-2) + '-' +
            ('00' + date.getDate()).slice(-2) + ' ' +
            ('00' + date.getHours()).slice(-2) + ':' +
            ('00' + date.getMinutes()).slice(-2) + ':' +
            ('00' + date.getSeconds()).slice(-2);

    return date;
}

function curency_format(number, decimals, dec_point, thousands_sep) {
    // *     example 1: number_format(1234.56);
    // *     returns 1: '1,235'
    // *     example 2: number_format(1234.56, 2, ',', ' ');
    // *     returns 2: '1 234,56'
    // *     example 3: number_format(1234.5678, 2, '.', '');
    // *     returns 3: '1234.57'
    // *     example 4: number_format(67, 2, ',', '.');
    // *     returns 4: '67,00'
    // *     example 5: number_format(1000);
    // *     returns 5: '1,000'
    // *     example 6: number_format(67.311, 2);
    // *     returns 6: '67.31'
    // *     example 7: number_format(1000.55, 1);
    // *     returns 7: '1,000.6'
    // *     example 8: number_format(67000, 5, ',', '.');
    // *     returns 8: '67.000,00000'
    // *     example 9: number_format(0.9, 0);
    // *     returns 9: '1'
    // *    example 10: number_format('1.20', 2);
    // *    returns 10: '1.20'
    // *    example 11: number_format('1.20', 4);
    // *    returns 11: '1.2000'
    // *    example 12: number_format('1.2000', 3);
    // *    returns 12: '1.200'
    var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            toFixedFix = function (n, prec) {
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                var k = Math.pow(10, prec);
                return Math.round(n * k) / k;
            },
            s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
function renderPDF(url,options) {
    var canvasContainer = document.getElementById('contentPDF');
    canvasContainer.innerHTML="";
    var options = options || { scale: 1 };
        
    function renderPage(page) {
        var viewport = page.getViewport(options.scale);
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var renderContext = {
          canvasContext: ctx,
          viewport: viewport
        };
        
        canvas.height = viewport.height;
        canvas.width = viewport.width;        
        canvasContainer.appendChild(canvas);
        
        page.render(renderContext);
    }
    
    function renderPages(pdfDoc) {
        for(var num = 1; num <= pdfDoc.numPages; num++)
            pdfDoc.getPage(num).then(renderPage);
    }
    PDFJS.disableWorker = true;
    PDFJS.getDocument(url).then(renderPages);
    $('#viewPDF').modal('show');
}
function rawurlencode (str) {
  str = (str + '');
  return encodeURIComponent(str)
    .replace(/!/g, '%21')
    .replace(/'/g, '%27')
    .replace(/\(/g, '%28')
    .replace(/\)/g, '%29')
    .replace(/\*/g, '%2A');
};
function viewerPDF(url){
    var canvasContainer = document.getElementById('contentPDF');
    canvasContainer.innerHTML="";
    var canvas = document.createElement('iframe');
    canvas.style.width="100%"; 
    canvas.style.height="550px";
    canvas.src = "/pdfjs/web/viewer.html?file="+rawurlencode(url);
    canvas.border=0;
    canvas.scrolling="no";
    canvas.frameborder="0";
    canvasContainer.appendChild(canvas);
    $('#viewPDF').modal('show');
}

function viewerInFormPDF(url){
    var canvasContainer = document.getElementById('contentInFormPDF');
    canvasContainer.innerHTML="";
    var canvas = document.createElement('iframe');
    canvas.style.width="100%"; 
    canvas.style.height="450px";
    canvas.src = "/pdfjs/web/viewer.html?file="+rawurlencode(url);
    canvas.border=0;
    canvas.scrolling="no";
    canvas.frameborder="0";
    canvasContainer.appendChild(canvas);
}
function noneViewerInFormPDF(){
    var canvasContainer = document.getElementById('contentInFormPDF');
    canvasContainer.innerHTML="<h3>Khung xem file PDF</h3>";
}
function base64Encode(str)
{
    if (!str || str == null || str == '')
    {
        return '';
    }

    return btoa(unescape(encodeURIComponent(str)));
}
function base64Decode(base64str)
{
    if (!base64str || base64str == null || base64str == '')
    {
        return '';
    }

    return decodeURIComponent(escape(window.atob(base64str)));
}
var common = {
    createObjectURL: function (file) {
        if (window.webkitURL) {
            return window.webkitURL.createObjectURL(file);
        }
        else if (window.URL && window.URL.createObjectURL) {
            return window.URL.createObjectURL(file);
        }
        else {
            return null;
        }
    },
    getOrientation: function(file, callback) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var view = new DataView(e.target.result);
            if (view.getUint16(0, false) != 0xFFD8)
            {
                return callback(-2);
            }
            var length = view.byteLength, offset = 2;
            while (offset < length) 
            {
                if (view.getUint16(offset+2, false) <= 8) return callback(-1);
                var marker = view.getUint16(offset, false);
                offset += 2;
                if (marker == 0xFFE1) 
                {
                    if (view.getUint32(offset += 2, false) != 0x45786966) 
                    {
                        return callback(-1);
                    }
    
                    var little = view.getUint16(offset += 6, false) == 0x4949;
                    offset += view.getUint32(offset + 4, little);
                    var tags = view.getUint16(offset, little);
                    offset += 2;
                    for (var i = 0; i < tags; i++)
                    {
                        if (view.getUint16(offset + (i * 12), little) == 0x0112)
                        {
                            return callback(view.getUint16(offset + (i * 12) + 8, little));
                        }
                    }
                }
                else if ((marker & 0xFF00) != 0xFF00)
                {
                    break;
                }
                else
                { 
                    offset += view.getUint16(offset, false);
                }
            }
            return callback(-1);
        };
        reader.readAsArrayBuffer(file);
    },
    getFileExtension: function (filename) {
        return filename.substr(filename.lastIndexOf('.') + 1);
    },
    resizeImage:function (file, image, orientation, callback) {
        // Resize image
        if (file) {
            // Get orientation of image file
            var img = document.createElement("img");
            img.src = image.src;

            img.onload = function () {
                var canvas = document.createElement("canvas");
                var width = img.width;
                var height = img.height;

                var MAX_WIDTH = 700;
                var MAX_HEIGHT = 700;

                var scaleValue = 1;
                if (width > MAX_WIDTH) 
                    scaleValue = MAX_WIDTH/width;
                else 
                {
                    if (height > MAX_HEIGHT)
                        scaleValue = MAX_HEIGHT/height;
                }

                canvas.width = width*scaleValue;
                canvas.height = height*scaleValue;
                
                // First - Resize original image base on canvas size
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                // Second - Rotate image
                width = canvas.width;
                height = canvas.height;

                if (4 < orientation && orientation < 9) {
                    canvas.width = height;
                    canvas.height = width;
                }

                // transform context before drawing image
                switch (orientation) {
                    case 1: ctx.transform(1, 0, 0, 1, 0, 0); break;
                    case 2: ctx.transform(-1, 0, 0, 1, width, 0); break;
                    case 3: ctx.transform(-1, 0, 0, -1, width, height); break;
                    case 4: ctx.transform(1, 0, 0, -1, 0, height); break;
                    case 5: ctx.transform(0, 1, 1, 0, 0, 0); break;
                    case 6: ctx.transform(0, 1, -1, 0, height, 0); break;
                    case 7: ctx.transform(0, -1, -1, 0, height, width); break;
                    case 8: ctx.transform(0, -1, 1, 0, 0, width); break;

                    default: break;
                }
                
                // Create new image.
                ctx.drawImage(img, 0, 0, width, height);
                ctx.restore();

                var dataUrl = canvas.toDataURL(file.type);
                var newFile = common.dataURItoBlob(dataUrl, file);

                if(newFile.size > file.size)
                {
                    if (newFile.size <= 1000000)
                        callback(newFile);
                    else
                        callback(file);
                }
                else
                {
                    if (file.size <= 1000000 && file.name.match(/\.(gif)$/i))
                        callback(file);
                    else
                        callback(newFile);
                }
            }
        }
    },
    dataURItoBlob: function (dataURI, file) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;

        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);

        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        ia.lastModified = file.lastModified;
        ia.lastModifiedDate = file.lastModifiedDate;
        ia.name = file.name;
        ia.webkitRelativePath = "";

        var blob = new Blob([ia], {type: mimeString});
        blob.lastModified = file.lastModified;
        blob.lastModifiedDate = file.lastModifiedDate;
        blob.name = file.name;
        blob.webkitRelativePath = "";

        return blob;
    },
}