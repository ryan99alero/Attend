# JSZip 

[![GitHub Version](https://img.shields.io/github/release/gaomingcode/jszip.svg)](https://github.com/gaomingcode/jszip)
[![Packagist Downloads](https://img.shields.io/packagist/dm/gaomingcode/jszip)](https://github.com/gaomingcode/jszip)
[![Packagist License](https://img.shields.io/packagist/l/gaomingcode/jszip)](https://github.com/gaomingcode/jszip)

## Installation

### Composer

```
composer require gaomingcode/jszip
```
###

[![Selenium Test Status](https://saucelabs.com/browser-matrix/jszip.svg)](https://saucelabs.com/u/jszip)

A library for creating, reading and editing .zip files with JavaScript, with a
lovely and simple API.

See https://stuk.github.io/jszip for all the documentation.

```javascript
var zip = new JSZip();

zip.file("Hello.txt", "Hello World\n");

var img = zip.folder("images");
img.file("smile.gif", imgData, {base64: true});

zip.generateAsync({type:"blob"}).then(function(content) {
    // see FileSaver.js
    saveAs(content, "example.zip");
});

/*
Results in a zip containing
Hello.txt
images/
    smile.gif
*/
```
License
-------

JSZip is dual-licensed. You may use it under the MIT license *or* the GPLv3
license. See [LICENSE.markdown](LICENSE.markdown).
