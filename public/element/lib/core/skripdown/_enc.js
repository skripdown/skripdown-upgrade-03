window._passmatch = {
    for: function (input) {
        let el1,el2,label;
        if (typeof input.source === 'string')
            el1 = document.getElementById(input.source);
        else
            el1 = input.source;
        if (typeof input.target === 'string')
            el2 = document.getElementById(input.target);
        else
            el2 = input.target;
        if (typeof input.label === 'string')
            label = document.getElementById(input.label);
        else
            label = input.label;

        el1.addEventListener("keyup", function () {
            if (el1.value !== '') {
                const temp  = _passmatch.validity(el1.value);
                let classes = el1.getAttribute('class');
                let lbclass = label.getAttribute('class');
                classes     = classes.replace(' border-danger', '');
                classes     = classes.replace(' mt-4', '');
                lbclass     = lbclass.replace(' text-danger','');
                lbclass     = lbclass.replace(' mt-4','');
                lbclass     = lbclass.replace(' d-none','');
                lbclass     = lbclass.replace('d-none','');
                if (temp[0]) {
                    classes    += ' mt-4';
                    lbclass    += ' d-none';
                }
                else {
                    classes    += ' border-danger';
                    lbclass    += ' mt-4 text-danger';
                    label.innerHTML = temp[1];
                }
                el1.setAttribute('class',classes);
                label.setAttribute('class',lbclass);
            }
            else {
                let classes = el1.getAttribute('class');
                classes     = classes.replace(' border-danger', '');
                classes     = classes.replace(' mt-4', '');
                classes    += ' mt-4';
                el1.setAttribute('class',classes);
                label.setAttribute('class',' d-none');
            }
        });
        el2.addEventListener("keyup", function () {
            const classes = el2.getAttribute('class');
            if (el2.value !== '') {
                if (el2.value === el1.value) {
                    el2.setAttribute('class', classes.replace(' border-danger', ''));
                }
                else {
                    const tmp = classes.replace(' border-danger', '');
                    el2.setAttribute('class', tmp+' border-danger');
                }
            }
            else {
                el2.setAttribute('class', classes.replace(' border-danger', ''));
            }
        })
    },
    validity : function (string) {
        const upper  = /([A-Z])/m;
        const number = /([0-9])/m;
        const symbol = /([^\w\s])/m
        if (string.length < 8) {
            return [false, 'kata sandi kurang dari 8 karakter'];
        }
        if (upper.exec(string) == null) {
            return [false, 'kata sandi tidak memiliki minimal satu huruf kapital'];
        }
        if (number.exec(string) == null) {
            return [false, 'kata sandi harus memiliki minimal satu angka'];
        }
        if (symbol.exec(string) == null) {
            return [false, 'kata sandi harus memiliki minimal satu simbol'];
        }
        return [true];
    }
}

window._mailmatch = {
    for : function (input) {
        let el;
        if (typeof input === 'string')
            el = document.getElementById(input);
        else
            el = input;
        el.addEventListener("keyup", function () {
           let classes = el.getAttribute('class');
           classes     = classes.replace(' border-danger','');
           classes     = classes.replace(' mt-4','');
           const re    = /^[\w]+@[\w]+(\.[\w]+)+$/m;
           if (re.exec(el.value) == null) {
               classes = classes + ' border-danger';
           }
           classes = classes + ' mt-4';
           el.setAttribute('class',classes);
        });
    }
}

window._ctclipboard = {
    for : function (input,target=undefined) {
        if (typeof input === 'string')
            input = document.getElementById(input);
        if (target !== undefined) {
            if (typeof target === 'string')
                target = document.getElementById(target);
        }
        else
            target = input;
        input.addEventListener("click", function () {
            target.select();
            target.setSelectionRange(0,999999);
            document.execCommand('copy');
        });
    }
}

window._form = {
    for : function (input) {
        if (typeof input.submit === 'string')
            input.submit = document.getElementById(input.submit);
        if (typeof input.alias === undefined)
            input.alias = {};
        if (typeof input.optional === undefined)
            input.optional = {};
        if (typeof input.pass !== undefined && typeof input.pass === 'string') input.pass = document.getElementById(input.pass)
        if (typeof input.verify !== undefined && typeof input.verify === 'string') input.verify = document.getElementById(input.verify)
        const elements  = input.elements;
        const submit    = input.submit;
        const aliases   = input.alias;
        const optionals = input.optional;
        const fun       = input.func;
        const pass      = input.pass;
        const verify    = input.verify;
        submit.addEventListener('click',function () {
            let bool;
            if (pass !== undefined) {
                if (verify !== undefined)
                    bool = !_form.check(elements, aliases, optionals)[0] && pass.value !== '' && pass.value === verify.value;
                else
                    bool = !_form.check(elements, aliases, optionals)[0] && pass.value !== '';
            }
            else
                bool = !_form.check(elements, aliases, optionals)[0];
            if (bool)
                fun(elements);
        });
        for (let i = 0; i < elements.length; i++) {
            let alias   = aliases[elements[i]];
            if (typeof elements[i] === 'string')
                elements[i] = document.getElementById(elements[i]);
            if (alias !== undefined) {
                if (typeof alias === 'string')
                    alias = document.getElementById(alias);
            }
            elements[i].addEventListener('click', function () {
                let classes;
                if (alias === undefined) {
                    classes = elements[i].getAttribute('class');
                    elements[i].setAttribute('class',
                        classes.replace(' border-danger','').
                        replace(' text-danger',' text-muted')
                    );
                }
                else {
                    classes = alias.getAttribute('class');
                    alias.setAttribute('class',
                        classes.replace(' border-danger','').
                        replace(' text-danger',' text-muted')
                    );
                }
            });
        }
    },
    check : function (forms, aliases= undefined, optionals = undefined) {
        let hasError = false;
        for (let i = 0; i < forms.length; i++) {
            let alias  = document.getElementById(aliases[forms[i].getAttribute('id')]);
            let option = document.getElementById(optionals[forms[i].getAttribute('id')]);
            if (alias == null)
                alias  = undefined;
            if (option == null)
                option = undefined;
            if (typeof forms[i] === 'string')
                forms[i] = document.getElementById(forms[i]);
            if (forms[i].value === '') {
                if (option !== undefined) {
                    let classes;
                    if (alias === undefined) {
                        classes     = forms[i].getAttribute('class');
                        classes     = classes.replace(' border-danger','');
                        classes    += ' border-danger';
                        classes    += ' text-danger';
                        forms[i].setAttribute('class', classes);
                    }
                    else {
                        classes     = alias.getAttribute('class');
                        classes     = classes.replace(' border-danger','');
                        classes    += ' border-danger';
                        classes    += ' text-danger';
                        alias.setAttribute('class', classes);
                    }
                    hasError = true;
                }
            }
        }
        return [hasError];
    }
}
