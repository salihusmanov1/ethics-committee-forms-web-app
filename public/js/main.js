//Navigation
document.addEventListener("DOMContentLoaded", function () {
  
    const subBtn = document.querySelector(".sub-btn");
    const subCategory = document.querySelector(".subcategory");
    const icon = document.getElementById("icon");
    subCategory.style.display = "none";
    subBtn.addEventListener("click", function (event) {
        event.preventDefault();

        if (subCategory.style.display === "block") {
            subCategory.style.display = "none";
            icon.style.transform = "translateY(-100%)";
        } else {
            subCategory.style.display = "block";
            icon.style.transform = "translateY(-50%) rotate(-180deg)";
        }
    });

});




document.addEventListener("DOMContentLoaded", function () {
    const inputContainer5 = document.getElementById("inputContainer5");
    const yesRadio = document.getElementById("yesRadio");
    const radioButtons = document.querySelectorAll('input[name="flexRadioDefault1"]');


    radioButtons.forEach(function (radio) {
        radio.addEventListener("change", function () {
            if (!yesRadio.checked) {
                inputContainer5.innerHTML = "";
            }
            else {
                const newInput = document.createElement("input");
                newInput.setAttribute("type", "text");
                newInput.setAttribute("name", "if_required");
                newInput.classList.add("form-control");
                inputContainer5.appendChild(newInput);
            }

        });
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const inputContainer = document.getElementById("reporting-changes-form");
    const inputContainer2 = document.getElementById("extension-of-previous-study-form");
    const inputContainer3 = document.getElementById("new-or-revised-form");
    const rpchanges = document.getElementById("rpchanges");
    const neww = document.getElementById("new");
    const revised = document.getElementById("revised");
    const extension = document.getElementById("extension");
    const yesRadio = document.getElementById("diff_if_yes");
    const radioButtons = document.querySelectorAll('input[name="flexRadioDefault5"]');
    const radioButtons1 = document.querySelectorAll('input[name="flexRadioDefault7"]');



    radioButtons.forEach(function (radio) {
        radio.addEventListener("change", function () {
            if (!rpchanges.checked) {
                inputContainer.style.display = "none";
            }
            else {
                inputContainer.style.display = "block";
            }
            if(!extension.checked) {
                inputContainer2.style.display = "none";
            }
            else {
                inputContainer2.style.display = "block";
            }
            if(neww.checked || revised.checked) {
                inputContainer3.style.display = "block"; 
            }
            else {
                inputContainer3.style.display = "none";
            }
        });
        if (rpchanges.checked) {
            inputContainer.style.display = "block";
        }
        else {
            inputContainer.style.display = "none";
        }

        if(neww.checked || revised.checked) {
            inputContainer3.style.display = "block"; 
        }
        else {
            inputContainer3.style.display = "none";
        } 
        
        if(extension.checked) {
            inputContainer2.style.display = "block";
             if (yesRadio.checked) {
              inputContainer.style.display = "block";
                }
        }
        else {
            inputContainer2.style.display = "none";
        }
    });

    radioButtons1.forEach(function (radio) {
        radio.addEventListener("change", function () {
            if (!yesRadio.checked) {
                inputContainer.style.display = "none";
            }
            else {
                inputContainer.style.display = "block";
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const inputContainer = document.getElementById("inputContainer6");
    const inputContainer1 = document.getElementById("inputContainer7");
    const international = document.getElementById("international");
    const other = document.getElementById("other");
    const radioButtons = document.querySelectorAll('input[name="flexRadioDefault3"]');

    radioButtons.forEach(function (radio) {
        radio.addEventListener("change", function () {
            if (international.checked) {
                const newInput = document.createElement("input");
                newInput.setAttribute("type", "text");
                newInput.setAttribute("name", "specify_international");
                newInput.classList.add("form-control");
                inputContainer.appendChild(newInput);
                
            }
            else {
                inputContainer.innerHTML = "";
            }

            if (other.checked) {
                const newInput1 = document.createElement("input");
                newInput1.setAttribute("type", "text");
                newInput1.setAttribute("name", "specify_other");
                newInput1.classList.add("form-control");
                inputContainer1.appendChild(newInput1);
                
            }
            else {
                inputContainer1.innerHTML = "";
            }

            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const inputContainer = document.getElementById("inputContainer8");
        const otherRadio = document.getElementById("if_used_yes");
        const radioButtons = document.querySelectorAll('input[name="flexRadioDefault4"]');
    
        radioButtons.forEach(function (radio) {
            radio.addEventListener("change", function () {
                if (!otherRadio.checked) {
                    inputContainer.innerHTML = "";
                }
                else {
                    const newInput = document.createElement("input");
                    newInput.setAttribute("type", "text");
                    newInput.setAttribute("name", "if_approved_specify");
                    newInput.classList.add("form-control");
                    inputContainer.appendChild(newInput);
                }
                });
            });
        });
    


//Form 1 q10 

    



//Dashboard

