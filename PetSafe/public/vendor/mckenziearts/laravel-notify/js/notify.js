/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/notify.js ***!
  \********************************/
var notification = document.querySelector('div.notify');

if (notification) {
  setTimeout(function () {
    notification.remove();
  }, notify.timeout); // 5 secs
}
/******/ })()
;