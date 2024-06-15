function validate(){
    const card = document.getElementById("cardno").value;
    const result = document.getElementById("result");

    
    const visaRegex = /^4\d{12}(\d{3})?$/;
    const mastercardRegex = /^5[1-5]\d{14}$/;
    const amexRegex = /^3[47]\d{13}$/;

    if(visaRegex.test(card)){
        result.innerHTML = "Visa Hai";
    }
    else if(mastercardRegex.test(card)){
        result.innerHTML = "Master Hai";
    }
    else if(amexRegex.test(card)){
        result.innerHTML = "American Hai";
    }
    else{
        result.innerHTML = "Mtlb kuch bhi";
    }
}