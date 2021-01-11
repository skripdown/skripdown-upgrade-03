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
        if (input.file !== undefined) {
            const formData = new FormData();
            const keys = Object.keys(input.data);
            for (let i = 0; i < keys.length; i++) {
                if (input.file[keys[i]] !== undefined)
                    formData.append(keys[i],input.file[keys[i]]);
                else
                    formData.append(keys[i],input.data[keys[i]]);
            }
            input.data = formData;
        }
        if (input.async === undefined)
            input.async = false;
        if (input.enctype === undefined)
            input.enctype = 'multipart/form-data';
        if (input.processData === undefined && input.file !== undefined)
            input.processData = false;
        if (input.contentType === undefined && input.file !== undefined)
            input.contentType = false;
        let csrft    = this.csrft;
        csrft = csrft.slice(6,csrft.length-5);
        csrft = csrft.split('');
        csrft = csrft.reverse('');
        csrft = csrft.join('');
        if (input.file !== undefined)
            input.data.append('_token',csrft);
        else
            input.data._token = csrft;
        console.log(input.data);
        $.ajax({
            type : 'post',
            async : input.async,
            url  : input.url,
            enctype : input.enctype,
            processData : input.processData,
            contentType : input.contentType,
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
    get : function (url,async=true) {
        $.ajax({
            type: 'get',
            url : url,
            async:async,
            success : e=>{
                _response.response = e;
            },
            error : e=>{
                _response.response = e;
            }
        });
    }
}
