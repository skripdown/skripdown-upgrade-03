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
    post : function (input) {
        if (input.enctype === undefined)
            input.enctype = 'multipart/form-data';
        if (input.processData === undefined)
            input.processData = false;
        let csrft    = this.csrft;
        let response = undefined;
        csrft = csrft.slice(6,csrft.length-5);
        csrft = csrft.split('');
        csrft = csrft.reverse('');
        csrft = csrft.join('');
        console.log(csrft);
        input.data._token = csrft;
        $.ajax({
            type : 'post',
            url  : input.url,
            enctype : input.enctype,
            processData : input.processData,
            data : input.data,
            success : e=>{
                response = e;
                response._status = true;
            },
            error : e=>{
                response = e;
                response._status = false;
            }
        });
        return response;
    },
}
