
function formatCurrencyInput(event) {
    const input = event.target;
    let value = input.value.replace(/[^0-9]/g, '');
    let formattedValue = '';

    if (value) {
        let numberValue = parseFloat(value) / 100;
        formattedValue = numberValue.toFixed(2);
    }

    input.value = formattedValue;
}

function setupCurrencyInputs() {
    document.querySelectorAll('#currency-input').forEach(input => {
        input.removeEventListener('input', formatCurrencyInput);
        input.addEventListener('input', formatCurrencyInput);
    });
}

setupCurrencyInputs();

document.getElementById('addvarmncntnr').addEventListener('click', function () {



    const optnsvar = document.getElementById('mnvartnsfrprdct');

    // Create a new div element
    const newIndex = optnsvar.querySelectorAll('#ctgry1').length;

    // Create a new div element
    const newDiv = document.createElement('div');
    newDiv.id = 'ctgry1';
    newDiv.innerHTML = `
        <div id="tpbrctgrym">
            <div id="clrbgcntnr">
                <div id="colorttlmn">COLOR &nbsp; <div id="color-display"></div></div>
                <div id="colormninpt">
                    <input type="text" name="variations[${newIndex}][color]" class="color-input">
                </div>
            </div>
            <div id="szclrbgcntnr">
                <div id="colorttlmn">SIZE</div>
                <div id="colormninpt">
                    <div id="contanervarsszs">
                        <div class="size-option" data-size="XS">XS</div>
                        <div class="size-option" data-size="S">S</div>
                        <div class="size-option" data-size="M">M</div>
                        <div class="size-option" data-size="L">L</div>
                        <div class="size-option" data-size="XL">XL</div>
                        <div class="size-option" data-size="2XL">2XL</div>
                    </div>
                    
                    <input type="hidden" name="variations[${newIndex}][xs]" value="0">
                    <input type="hidden" name="variations[${newIndex}][s]" value="0">
                    <input type="hidden" name="variations[${newIndex}][m]" value="0">
                    <input type="hidden" name="variations[${newIndex}][l]" value="0">
                    <input type="hidden" name="variations[${newIndex}][xl]" value="0">
                    <input type="hidden" name="variations[${newIndex}][2xl]" value="0">
                </div>
            </div>
        </div>
        <div id="tpbrctgrym">
            <div id="clrbgcntnr">
                <div id="colorttlmn">QUANTITY</div>
                <div id="colormninpt">
                    <input type="number" name="variations[${newIndex}][quantity]">
                </div>
            </div>
            <div id="clrbgcntnr">
                <div id="colorttlmn">PRICE($)</div>
                <div id="colormninpt">
                    <input type="text" name="variations[${newIndex}][price]" id="currency-input" placeholder="Enter amount">
                </div>
            </div>
        </div>
    `;

    optnsvar.appendChild(newDiv);
    setupCurrencyInputs();
});


function updateSizeAvailability(container) {
    const sizeOptions = ['XS', 'S', 'M', 'L', 'XL', '2XL'];
    sizeOptions.forEach(size => {
        const sizeElement = container.querySelector(`.size-option[data-size="${size}"]`);
        const hiddenInput = container.querySelector(`input[name*="[${size.toLowerCase()}]"]`);
        if (sizeElement && hiddenInput) {
            hiddenInput.value = sizeElement.classList.contains('active') ? 1 : 0;
            console.log(`${size}: ${hiddenInput.value}`);
        }
    });
}

document.getElementById('mnvartnsfrprdct').addEventListener('click', function (event) {
    if (event.target.classList.contains('size-option')) {
        event.target.classList.toggle('active');

        // Update size availability for the closest container
        const container = event.target.closest('#szclrbgcntnr');
        if (container) {
            updateSizeAvailability(container);
        }
    }
});


document.addEventListener('input', function (event) {
    if (event.target.classList.contains('color-input')) {
        const colorInput = event.target;
        const colorDisplay = colorInput.parentElement.previousElementSibling.querySelector('#color-display');

        colorDisplay.style.backgroundColor = colorInput.value;
    }
});

const colorInput = document.getElementById('color-input');
const colorDisplay = document.getElementById('color-display');

function updateColor() {
    const color = colorInput.value;
    colorDisplay.style.backgroundColor = color;
}



ml.addEventListener('click', () => {
    document.getElementById('ml').classList.add('selectclass')
    document.getElementById('unsx').classList.remove('selectclass')
    document.getElementById('fml').classList.remove('selectclass')
    category.value = 'male'
})

unsx.addEventListener('click', () => {
    document.getElementById('ml').classList.remove('selectclass')
    document.getElementById('unsx').classList.add('selectclass')
    document.getElementById('fml').classList.remove('selectclass')
    category.value = 'unisex'
})

fml.addEventListener('click', () => {
    document.getElementById('ml').classList.remove('selectclass')
    document.getElementById('unsx').classList.remove('selectclass')
    document.getElementById('fml').classList.add('selectclass')
    category.value = 'female'
})

document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('category').value === 'unisex') {
        document.getElementById('unsx').classList.add('selectclass')
    }


    document.querySelectorAll('#currency-input').forEach(input => {
        input.addEventListener('input', function () {
            let value = this.value.replace(/[^0-9]/g, '');
            let formattedValue = '';

            if (value) {
                let numberValue = parseFloat(value) / 100;
                formattedValue = numberValue.toFixed(2);
            }

            this.value = formattedValue;
        });
    });
});
const markdownInput = document.getElementById('dynamic-textarea');
const preview = document.getElementById('preview');

function updatePreview() {
    const markdownText = markdownInput.value;
    preview.innerHTML = marked.marked(markdownText);
}

prwbtnmndesc.addEventListener('click', () => {
    updatePreview();
    document.getElementById('btntxtareamnbgcntnr').style.display = 'none'
    document.getElementById('mrdwnprwvr').style.display = 'flex'

})

edtbtnmndesc.addEventListener('click', () => {
    document.getElementById('btntxtareamnbgcntnr').style.display = 'flex'
    document.getElementById('mrdwnprwvr').style.display = 'none'

})



document.addEventListener('DOMContentLoaded', function () {
    const textarea = document.getElementById('dynamic-textarea');
    const controls = document.querySelectorAll('#topcntrlsmn div');

    controls.forEach(control => {
        control.addEventListener('click', function () {
            const formatType = this.getAttribute('data-format');
            applyFormatting(formatType);
        });
    });

    function applyFormatting(formatType) {
        const startPos = textarea.selectionStart;
        const endPos = textarea.selectionEnd;
        const text = textarea.value;

        if (startPos === endPos) {
            return; // No text selected
        }

        let selectedText = text.substring(startPos, endPos);
        let beforeText = text.substring(0, startPos);
        let afterText = text.substring(endPos);

        switch (formatType) {
            case 'bold':
                selectedText = `**${selectedText}**`;
                break;
            case 'italic':
                selectedText = `_${selectedText}_`;
                break;
            case 'underline':
                selectedText = `<u>${selectedText}</u>`;
                break;
            case 'strike':
                selectedText = `<s>${selectedText}</s>`;
                break;
        }

        textarea.value = beforeText + selectedText + afterText;
        textarea.setSelectionRange(startPos, startPos + selectedText.length);
        textarea.focus();
    }
});
const textarea = document.getElementById('dynamic-textarea');

textarea.addEventListener('input', function () {
    this.style.height = 'auto';
    if (this.scrollHeight <= 500) {
        this.style.height = this.scrollHeight + 'px';
    } else {
        this.style.height = '500px';
    }
});



function triggerFileInput(inputId) {
    document.getElementById(inputId).click();
}

function displayImage(input, divId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(divId).style.backgroundImage = "url('" + e.target.result + "')";
            document.getElementById(divId).style.backgroundSize = "contain";
            document.getElementById(divId).style.backgroundRepeat = 'no-repeat'
            document.getElementById(divId).style.backgroundPosition = "center";
            document.getElementById(divId).style.borderRadius = "7px";
            document.getElementById(divId).style.border = "2px solid #ccc";
            document.getElementById(divId).innerText = ''
            document.getElementById(divId).innerHTML = ''
        }
        reader.readAsDataURL(input.files[0]);
    }
}




function gotohome() {
    dshbrdprflmnpnl.style.display = 'flex'
    mnproductcntnr.style.display = 'none'
    mnproductlstcntnr.style.display = 'none'

    hpmecntnrmn.style.backgroundColor = 'rgb(226,226,226)'
    prodcntnrmn.style.backgroundColor = 'transparent'
    prodlstcntnrmn.style.backgroundColor = 'transparent'
}
function gotoproducts() {

    dshbrdprflmnpnl.style.display = 'none'
    mnproductcntnr.style.display = 'flex'
    mnproductlstcntnr.style.display = 'none'

    hpmecntnrmn.style.backgroundColor = 'transparent'
    prodcntnrmn.style.backgroundColor = 'rgb(226,226,226)'
    prodlstcntnrmn.style.backgroundColor = 'transparent'
}
function gotoproductslist() {
    dshbrdprflmnpnl.style.display = 'none'
    mnproductcntnr.style.display = 'none'
    mnproductlstcntnr.style.display = 'flex'

    hpmecntnrmn.style.backgroundColor = 'transparent'
    prodcntnrmn.style.backgroundColor = 'transparent'
    prodlstcntnrmn.style.backgroundColor = 'rgb(226,226,226)'
}
hpmecntnrmn.addEventListener('click', () => {
    gotohome()
})
prodcntnrmn.addEventListener('click', () => {
    gotoproducts()
})
prodlstcntnrmn.addEventListener('click', () => {
    gotoproductslist()
})


function getQueryParams() {
    const queryParams = new URLSearchParams(window.location.search);
    return queryParams;
}

window.onload = () => {
    const params = getQueryParams();
    if (params.get('tab') === "home") {
        gotohome()
    } else if (params.get('tab') === "products") {
        gotoproducts()
    } else if (params.get('tab') === "product_list") {
        gotoproductslist()
    } else {
        gotohome()
    }
}