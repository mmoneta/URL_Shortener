'use strict';

var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();

Array.from(document.getElementsByClassName('copy-to-clipboard')).forEach(function (element) {
  element.addEventListener("click", function (e) {
    var textarea = document.createElement('textarea');
    textarea.textContent = e.target.getAttribute('data-url');
    document.body.appendChild(textarea);

    var selection = document.getSelection();
    var range = document.createRange();
    range.selectNode(textarea);
    selection.removeAllRanges();
    selection.addRange(range);

    console.log('copy success', document.execCommand('copy'));
    selection.removeAllRanges();

    document.body.removeChild(textarea);
  });
});

function send(action) {
  var formData = null,
      xhr = new XMLHttpRequest();

  switch (action) {
    case 'add':
      formData = new FormData(document.getElementById('add-form'));
      break;
  }

  var promise = new Promise(function (resolve, reject) {
    xhr.open('POST', '//' + window.location.hostname + '/URL_Shortener/API/' + action);
    xhr.send(formData);

    xhr.onload = function () {
      return resolve(xhr.responseText);
    };
    xhr.onerror = function () {
      return reject(xhr.statusText);
    };
  });

  promise.then(function (response) {
    if (response) {
      alert(response);
    }
    var elements = document.querySelectorAll('input[name=link]');

    var _elements = _slicedToArray(elements, 1),
        element = _elements[0];

    element.value = null;
  });

  promise.catch(function (status) {
    return alert(status);
  });

  return false;
}