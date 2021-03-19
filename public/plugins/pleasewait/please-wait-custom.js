window.loading_screen = window.pleaseWait({
//{{--logo: "{{asset('/image/spinner.svg')}}",--}}
logo: "/image/spinner.svg",
    backgroundColor: 'rgba(255, 255, 255, 0.5)',
});

window.addEventListener("load", function(event) {
    window.loading_screen.finish();
});

var showPleaseWait = function() {
    window.pleaseWait({
        logo: "/image/spinner.svg",
        backgroundColor: 'rgba(255, 255, 255, 0.5)',
    });
}