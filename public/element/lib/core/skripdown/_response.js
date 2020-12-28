//@ NAME   : _response LIB
//@ HANDLE : transfering server response.
//@ AUTHOR : Malko.

//NOTE : token encrypt and decrypt
//       +5 random char begin +6 random char end
//       reverse
//       -5 random char begin -6 random char end
//       reverse

window._response = {
    csrft : undefined,
    init : function (token) {
        this.csrft = token;
    },
    response : undefined,
    post : function (input) {
        if (input.async === undefined)
            input.async = true;
        if (input.enctype === undefined)
            input.enctype = 'multipart/form-data';
        if (input.processData === undefined)
            input.processData = false;
        let csrft    = this.csrft;
        csrft = csrft.slice(6,csrft.length-5);
        csrft = csrft.split('');
        csrft = csrft.reverse('');
        csrft = csrft.join('');
        input.data._token = csrft;
        $.ajax({
            type : 'post',
            async : input.async,
            url  : input.url,
            enctype : input.enctype,
            data : input.data,
            success : e=>{
                _response.response = e;
                _response.response._status = true;
            },
            error : e=>{
                _response.response = e;
                _response.response._status = false;
            }
        });
    },
}
