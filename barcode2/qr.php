<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root{
    font-size: 62.5%;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-size-adjust: none;
    -webkit-text-size-adjust: none;
}
button:hover{
    cursor: pointer;
}

body{
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #EAE6E5;
}
.heading{
    margin: 3rem 0 5rem 0;
}
.title, .sub-title{
    font-size: 4rem;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    color: #12130F;
}
.sub-title{
    font-size: 1.5rem;
    color: #8F8073;
}

.user-input{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.user-input label{
    text-align: center;
    font-size: 1.5rem;
    font-family: 'Poppins', sans-serif;
}
.user-input input{
    width: 80%;
    max-width: 35rem;
    font-family: 'Poppins', sans-serif;
    outline: none;
    border: none;
    border-radius: 0.5rem;
    background-color: #9b8774ad;
    text-align: center;
    padding: 0.7rem 1rem;
    margin: 1rem 1rem 2rem 1rem;
}
.button{
    outline: none;
    border: none;
    border-radius: 0.5rem;
    padding: 0.7rem 1rem;
    margin-bottom: 3rem;
    background-color: #5b92799d;
    color: #12130F;
    font-family: 'Poppins', sans-serif;
}

.qr-code button{
    display: flex;
    justify-content: center;
    background-color: #8F8073;
    font-family: 'Poppins', sans-serif;
    color: #EAE6E5;
    border: none;
    outline: none;
    width: 100%; 
    height: 100%; 
    margin-top: 1rem;
}
.qr-code button a{
    width: 100%;
    height: 100%;
    text-decoration: none;
    color: #EAE6E5;
}
    </style>
</head>
<body>
    
<section class="heading">
    <div class="title">QRcodes</div>
    <div class="sub-title">Generate QRCode for anything!</div>
</section>
<section class="user-input">
    <label for="input_text">Type something...</label>
    <input type="text" name="input_text" id="input_text" autocomplete="off">
    <button class="button" type="submit">Generate QR Code</button>
</section>
<div class="qr-code" style="display: none;">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<!-- <script src="./js/app.js"></script> -->
<script>
    let btn = document.querySelector(".button");
    btn.addEventListener("click", () => {
        let user_input = document.querySelector("#input_text");
        if(user_input.value != "") {
            if(document.querySelector(".qr-code").childElementCount == 0){
                generate(user_input);
            } else{
                document.querySelector(".qr-code").innerHTML = "";
                generate(user_input);
            }
        } else {
            document.querySelector(".qr-code").style = "display: none";
            console.log("not valid input");
        }
    })
    function generate(user_input){

        document.querySelector(".qr-code").style = "";

        var qrcode = new QRCode(document.querySelector(".qr-code"), {
            text: `${user_input.value}`,
            width: 180, //128
            height: 180,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        console.log(qrcode);

        let download = document.createElement("button");
        document.querySelector(".qr-code").appendChild(download);

        let download_link = document.createElement("a");
        download_link.setAttribute("download", "qr_code_linq.png");
        download_link.innerText = "Download";

        download.appendChild(download_link);

        if(document.querySelector(".qr-code img").getAttribute("src") == null){
            setTimeout(() => {
                download_link.setAttribute("href", `${document.querySelector("canvas").toDataURL()}`);
            }, 300);
        } else {
            setTimeout(() => {
                download_link.setAttribute("href", `${document.querySelector(".qr-code img").getAttribute("src")}`);
            }, 300);
        }
    }
</script>
</body>
</html>