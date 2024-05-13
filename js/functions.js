const url = new URL( location.href );

function setCookie(name, value, expiry) {
    let d = new Date();
    d.setTime(d.getTime() + (expiry*86400000));
    document.cookie = name + "=" + value + ";" + "expires=" + d.toUTCString() + ";path=/";
}

function getCookie(name) {
    let cookie = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return cookie ? cookie[2] : null;
}

function eatCookie(name) {
    setCookie(name, "", -1);
}

function setLoadingOnSubmit(form){
    form.addEventListener('submit', function(e){
        submit = e.target.querySelector(".submit")

        submit.disabled = true
        submit.querySelector('.label').style.display = 'none'
        submit.querySelector('.spinner').style.display = 'inherit'
    })
}

function setSliderForm(sliderContainer){
    const slider = sliderContainer.querySelector(".slider");
    const output = sliderContainer.querySelector(".output");
    const progreso = sliderContainer.querySelector(".progreso");

    output.innerHTML = slider.value;

    const setSliderFormValues = () => {
        const max = slider.max;
        const min = slider.min;
        const sliderWidth = slider.offsetWidth;
        const thumbPosition = slider.value;
        const thumbPositionPixels = (thumbPosition-min) / (max - min) * sliderWidth;

        output.innerHTML = new Intl.NumberFormat("es").format(slider.value);
        progreso.style.width = thumbPositionPixels + "px";

        /* cambio de steps según el valor actual */
        // if( slider.value >= 5000 )slider.step = 500
        // else if( slider.value < 100 ) slider.step = 1
        // else slider.step = 100
        slider.step = 100
    }

    setSliderFormValues()
    slider.addEventListener("input", setSliderFormValues);
}

function initAskCreditForm(form){
    /* inicializar sliders */
    for( let sliderContainer of form.querySelectorAll('.slider-contenedor') )
        setSliderForm(sliderContainer)

    /* hacer visible contenedor matricula */
    for( let conditionalContainer of form.querySelectorAll('.conditional-container') ){

        const conditional = conditionalContainer.querySelector(".conditional")
        const fillIf      = conditionalContainer.querySelector(".fill-if")

        conditional.querySelector("[type='checkbox']").addEventListener('click', function(checkboxEvent){
            fillIf.style.display = this.checked ? 'flex' : 'none';

            fillIf.querySelectorAll("input:not([type='checkbox']), select").forEach(function(el){
                el.required = checkboxEvent.target.checked
            })
        })
    }

    /* form.querySelector("[name='vehiculo-propio']")?.addEventListener('click', function() {
        form.querySelector(".contenedor-matricula").style.display = this.checked ? 'flex' : 'none';

        if(form['matricula-de-vehiculo'] && form['dni-nie']){
            form['matricula-de-vehiculo'].required = this.checked? true : false;
            form['dni-nie'].required = this.checked? true : false;
        }
    }); */

    form['telefono']?.addEventListener('input', function(e){
        e.target.value = e.target.value.replace(/[^0-9]/g, '')
        window.$(e.target).inputmask( e.target.dataset.mask )
    })

    form['matricula-de-vehiculo']?.addEventListener('input', function(e){
        e.target.value = e.target.value.replace(/[^0-9a-zA-Z]/g, '')
    })

    form['dni-nie']?.addEventListener('input', function(e){
        e.target.value = e.target.value.replace(/[^0-9a-zA-Z]/g, '')
    })

    setLoadingOnSubmit(form)
}

function initDebtsForm(form){
    /* inicializar sliders */
    for( let sliderContainer of form.querySelectorAll('.slider-contenedor') )
        setSliderForm(sliderContainer)

    form['telefono']?.addEventListener('input', function(e){
        e.target.value = e.target.value.replace(/[^0-9]/g, '')
        window.$(e.target).inputmask( e.target.dataset.mask )
    })

    const debtAmountInput = document.querySelector('input[name="importe-total-de-la-deuda-rango"]')
    const ranges          = JSON.parse(debtAmountInput.dataset.rangos)

    document.querySelector('.slider').addEventListener('change', function(e){
        const debtSlider      = e.target
        debtAmountInput.value = "";

        ranges.forEach(range => {
            if( range.min <= debtSlider.value && range.max >= debtSlider.value )
                debtAmountInput.value = range.descripcion
        })
    })

    var changeEvent = new Event('change');
    document.querySelector('.slider').dispatchEvent(changeEvent);

    setLoadingOnSubmit(form)
}

(function(w,$){

    if( url.searchParams.has('servy_click') )
        setCookie('servy_click', url.searchParams.get('servy_click') )

    if( url.searchParams.has('utm_source') )
        setCookie('utm_source', url.searchParams.get('utm_source') )

    "function" == typeof define && define.amd ? define(function() {
        return getCookie
    }) : "object" == typeof module && module.exports ? module.exports = getCookie : w.getCookie = getCookie

     "function" == typeof define && define.amd ? define(function() {
        return setCookie
    }) : "object" == typeof module && module.exports ? module.exports = setCookie : w.setCookie = setCookie

    "function" == typeof define && define.amd ? define(function() {
        return eatCookie
    }) : "object" == typeof module && module.exports ? module.exports = eatCookie : w.eatCookie = eatCookie

    "function" == typeof define && define.amd ? define(function() {
        return initAskCreditForm
    }) : "object" == typeof module && module.exports ? module.exports = initAskCreditForm : w.initAskCreditForm = initAskCreditForm

    "function" == typeof define && define.amd ? define(function() {
        return initDebtsForm
    }) : "object" == typeof module && module.exports ? module.exports = initDebtsForm : w.initDebtsForm = initDebtsForm

    $.fn.startTimer = function() {
        let interval
        let secondsLeft = $(this).data('timer-from')

        interval = setInterval(() => {
            $(this).html(`${secondsLeft}`)
            if( secondsLeft > 0 ) secondsLeft--
            if( secondsLeft == 0 ) clearInterval(interval)
        }, 1000);

       return this;
    };
})(window, window.jQuery)
