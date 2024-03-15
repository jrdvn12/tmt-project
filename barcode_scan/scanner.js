// Access the webcam stream
navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
        const video = document.getElementById('video');
        video.srcObject = stream;
        video.play();
    })
    .catch(function(err) {
        console.error('Error accessing the webcam: ', err);
    });

// Configure QuaggaJS
Quagga.init({
    inputStream : {
        name : "Live",
        type : "LiveStream",
        target: document.getElementById('video')
    },
    decoder: {
        readers : ["ean_reader"]
    }
}, function(err) {
    if (err) {
        console.error('Error initializing Quagga: ', err);
        return;
    }
    Quagga.start();
});

// Process barcode detection
Quagga.onDetected(function(result) {
    const barcode = result.codeResult.code;
    const barcodeResultElement = document.getElementById('barcode-result');
    barcodeResultElement.innerHTML = 'Scanned EAN-13 Barcode: ' + barcode;

    // Send barcode data to PHP for further processing
    fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'barcode=' + encodeURIComponent(barcode)
    })
    .then(response => response.text())
    .then(data => {
        console.log('Server response:', data);
        // Display server response on the page
        const serverResponseElement = document.getElementById('server-response');
        serverResponseElement.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});
