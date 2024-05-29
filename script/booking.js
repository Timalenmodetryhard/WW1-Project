// Common function that will open a widget popup
function openPopup() {
    var pageURL = document.location.href;
    var strIframe = document.getElementById("schedule-tour-modal").querySelectorAll("iframe");
    var strIframeUrl = strIframe[0].src;
    var arrIframeUrl = strIframeUrl.split('scheduletourwidget');
    let arrPropertyUrl = strIframeUrl.split('/');
    var SourceId = '';
    var results = new RegExp('[\?&]' + 'sourceid' + '=([^&#]*)').exec(pageURL);
    if (results != null) {
        SourceId = decodeURI(results[1]) || 0;
    }
    var trackerExist = new RegExp('[\?&]' + 'tracker' + '=([^&#]*)').exec(strIframeUrl);
    if (trackerExist == null) {
        strIframeUrl = strIframe[0].src + '?tracker=yes';
    }
    if ('' != SourceId) {
        strIframeUrl = arrIframeUrl[0] + 'scheduletourwidget' + '/?tracker=yes&sourceId=' + SourceId;
    }
    strIframe[0].src = strIframeUrl;
    // Instructs the Googlebot to not index the web page's including the links present on the webpage.
    strIframe[0].setAttribute("rel", "nofollow");

    strIframe[0].style.display = "none";
    strIframe[0].onload = function () {
        strIframe[0].style.display = "block";
    }
    strIframe[0].style.background = "#FFFFFF";
    modal.style.display = "block";
    sessionStorage.setItem('widget_opening_timestamp', Date.now());
    gtagEvent('Widget Opening');
}


// Get the modal
var modal = document.getElementById('schedule-tour-modal');
var strIframe = document.getElementById("schedule-tour-modal").querySelectorAll("iframe");
var strIframeUrl = strIframe[0].src;
var arrIframeUrl = strIframeUrl.split('scheduletourwidget');
let arrPropertyUrl = strIframeUrl.split('/');
// Get the button that opens the modal
var btnByClass = document.querySelectorAll('.cls-popup-button');

var btnById = document.getElementById('schedule-tour-popup-button');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("schedule_popup_close")[0];

var uaId ='';
let strBaseURL = arrPropertyUrl[0] + '//' + arrPropertyUrl[2];
let accountName = arrPropertyUrl[3];
let propertyName = arrPropertyUrl[4];
var xhr = new XMLHttpRequest();

xhr.open("GET", strBaseURL + "/scheduler/getGAUaId/" + accountName + '/' + propertyName, true);
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
        if (200 === xhr.status) {
            response = JSON.parse(xhr.responseText);
            if (response.uaId) {
                uaId = response.uaId;
            } else {
                console.log('uaId is absent.');
            }
        }
    }
}
xhr.send();

// When the user clicks the button, open the modal
if (btnByClass) {
    btnByClass.forEach(item => {
        item.addEventListener('click', event => {
            openPopup();
        })
    });
}

// When the user clicks the button, open the modal
if (btnById) {
    btnById.onclick = function () {
        openPopup();
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
    gtagEvent('Widget Closing');
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        gtagEvent('Widget Closing');
    }
}

function gtagEvent(str_action){
    let imported = document.createElement('script');
    imported.async = true;
    imported.src = 'https://www.googletagmanager.com/gtag/js?id=' + uaId;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(imported, s);
    let event_name = str_action.toLowerCase().replace(/ /g,"_");
    window.dataLayer = window.dataLayer || [];
    function gtag(){
        dataLayer.push(arguments);
    }
    let widget_event_object = {
        'widget_name': 'Access Scheduler',
        'action':str_action,
        'transport_type':'beacon',
        'debug_mode':true
    };
    if(str_action == 'Widget Closing'){
       let widget_closing_timestamp = Date.now();
       widget_event_object.widget_closing_timestamp = widget_closing_timestamp;
       let widget_session_time = widget_closing_timestamp - sessionStorage.getItem('widget_opening_timestamp');
       widget_event_object.widget_session_time = Math.floor(widget_session_time/1000) + ' seconds';
    } else {
        widget_event_object.widget_opening_timestamp = sessionStorage.getItem('widget_opening_timestamp');
    }
    gtag('js', new Date());
    gtag('config', uaId, {'transport_type': 'beacon'});
    gtag('event', event_name, widget_event_object);
}
