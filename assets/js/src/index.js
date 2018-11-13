'use strict';

Array.from(document.getElementsByClassName('copy-to-clipboard')).forEach(element => {
  element.addEventListener("click", (e) => {
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
  })
})

function send(action) {
  var formData = null,
  xhr = new XMLHttpRequest();

  switch (action) {
    case 'add':
      formData = new FormData(document.getElementById('add-form'));
      break;
  }

  var promise = new Promise((resolve, reject) => {
    xhr.open('POST', `//${window.location.hostname}/URL_Shortener/API/${action}`);
    xhr.send(formData);

    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
  })

  promise.then(response => { 
    if (response) { 
      alert(response); 
    }
    var elements = document.querySelectorAll('input[name=link]');
    var [element] = elements;
    element.value = null;
  })

  promise.catch(status => alert(status));
  
  return false;
}