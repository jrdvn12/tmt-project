// scanner.js

// Access the webcam and start scanning for barcodes
navigator.mediaDevices.getUserMedia({ video: true })
  .then(function(stream) {
    var video = document.createElement('video');
    document.body.appendChild(video);
    video.srcObject = stream;
    video.play();
    
    Quagga.init({
      inputStream : {
        name : "Live",
        type : "LiveStream",
        target: video,
        constraints: {
          facingMode: "environment" // Use the rear camera (if available) for mobile devices
        }
      },
      decoder : {
        readers : ["ean_reader"] // Specify barcode types to scan (EAN-13)
      }
    }, function(err) {
      if (err) {
        console.error(err);
        return;
      }
      Quagga.start();
      
      // Once barcode is detected, populate form field and submit form
      Quagga.onDetected(function(result) {
        var barcodeValue = result.codeResult.code;
        document.getElementById("barcodeInput").value = barcodeValue;
        document.getElementById("barcodeForm").submit();
      });
    });
  })
  .catch(function(err) {
    console.error('Error accessing webcam: ', err);
  });

  function manualSubmit() {
    document.getElementById("barcodeForm").submit();
  }