(async () => {
    const stream = await navigator.mediaDevices.getUserMedia({
      video: {
        facingMode: {
          ideal: "environment"
        }
      },
      audio: false
    });
    const videoEl = document.querySelector("#stream");
    videoEl.srcObject = stream;
    await videoEl.play();
    
    // const barcodeDetector = new BarcodeDetector({formats: ['qr_code']});
  var barcodeDetector = new BarcodeDetector({formats: ['code_39', 'codabar', 'ean_13']});

    window.setInterval(async () => {
      const barcodes = await barcodeDetector.detect(videoEl);
      if (barcodes.length <= 0) return;
      alert(barcodes.map(barcode => barcode.rawValue));
    }, 1000)

    })();


(async () => {
    const stream = await navigator.mediaDevices.getUserMedia({
      video: {
        facingMode: {
          ideal: "environment"
        }
      },
      audio: false
    });
    const videoEl = document.querySelector("#stream");
    videoEl.srcObject = stream;
    await videoEl.play();
    
    // const barcodeDetector = new BarcodeDetector({formats: ['qr_code']});
  var barcodeDetector = new BarcodeDetector({formats: ['code_39', 'codabar', 'ean_13']});

  //   // check supported types
barcodeDetector.getSupportedFormats()
.then(supportedFormats => {
  supportedFormats.forEach(format => console.log(format));
});

        BarcodeDetector.detect(videoEl)
    .then(barcodes => {
      barcodes.forEach(barcode => console.log(barcode.rawData));
    })
    .catch(err => {
      console.log(err);
    })

    })();


// --------------------------------------------------------------------------

//     const stream =  navigator.mediaDevices.getUserMedia({
//         video: {
//           facingMode: {
//             ideal: "environment"
//           }
//         },
//         audio: false
//       });
//     const videoEl = document.querySelector("#stream");
//     videoEl.srcObject = stream;
//     videoEl.play();
//   // create new detector
//   var barcodeDetector = new BarcodeDetector({formats: ['code_39', 'codabar', 'ean_13']});

//   // check supported types
// barcodeDetector.getSupportedFormats()
// .then(supportedFormats => {
//   supportedFormats.forEach(format => console.log(format));
// });

//     barcodeDetector.detect(videoEl)
//     .then(barcodes => {
//       barcodes.forEach(barcode => console.log(barcode.rawData));
//     })
//     .catch(err => {
//       console.log(err);
//     })